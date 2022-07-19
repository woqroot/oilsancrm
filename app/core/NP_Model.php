<?php


class NP_Model extends CI_Model
{

	protected $tableName;
	protected $primaryKey;

	public function __construct()
	{
		parent::__construct();

	}

	/**
	 * @param mixed $tableName
	 */
	public function setTableName($tableName): void
	{
		$this->tableName = $tableName;
		$this->primaryKey = $this->tableName . "Id";
	}

	/**
	 * @param array $where
	 * @param $order_by
	 * @param $deletedAt
	 * @return mixed
	 */
	public function all(array $where = [], $order_by = null, $deletedAt = true)
	{

		if (!$order_by) {
			$order_by = $this->primaryKey . " DESC";
		}
		if ($deletedAt) {
			$where["deletedAt"] = NULL;
		}
		return $this->db
			->select("*")
			->from($this->tableName)
			->where($where)
			->order_by($order_by)
			->get()
			->result_array();

	}

	/**
	 * @param $where
	 * @param $deletedAt
	 * @return mixed
	 */
	public function first($where, $deletedAt = true)
	{
		if (!is_array($where)) {
			$where = [$this->primaryKey => $where];
		}
		if ($deletedAt) {
			$where["deletedAt"] = null;
		}

		return $this->db->select("*")
			->from($this->tableName)
			->where($where)
			->get()
			->row_array();
	}

	/**
	 * @param $id
	 * @param bool $deletedAt
	 * @return mixed
	 */
	public function findById($id, bool $deletedAt = true)
	{
		$where = [
			$this->primaryKey => $id
		];
		if ($deletedAt) {
			$where["deletedAt"] = null;
		}

		return $this->db->select("*")
			->from($this->tableName)
			->where($where)
			->get()
			->row_array();
	}

	public function last($where = [])
	{
		$where["deletedAt"] = null;

		return $this->db->select("*")
			->from($this->tableName)
			->order_by($this->primaryKey, "DESC")
			->where($where)
			->get()
			->row_array();
	}

	/**
	 * @param $where
	 * @param $deletedAt
	 * @return mixed
	 */
	public function count($where = [], $deletedAt = true)
	{
		if ($deletedAt) {
			$where["deletedAt"] = null;
		}
		return $this->db->select($this->primaryKey)
			->from($this->tableName)
			->where($where)
			->get()
			->num_rows();
	}

	/**
	 * @param $data
	 * @return mixed
	 */
	public function insert($data)
	{
		if ($this->db->insert($this->tableName, $data)) {
			return $this->findById($this->lastID());
		}
		return false;
	}

	/**
	 * @param $data
	 * @param $where
	 * @return mixed
	 */
	public function update($data, $where)
	{
		if (!is_array($where)) {
			$where = [$this->primaryKey => $where];
		}
		$data["updatedAt"] = date("Y-m-d H:i:s");
		return $this->db->where($where)->update($this->tableName, $data);
	}

	/**
	 * @param $where
	 * @return mixed
	 */
	public function delete($where)
	{
		return $this->update(["deletedAt" => date("Y-m-d H:i:s")], $where);
	}

	/**
	 * @param $columnName
	 * @param $value
	 * @param bool $includeDeleteds
	 * @return bool
	 */
	public function isUnique($columnName, $value, bool $includeSoftDeletes = true): bool
	{

		$where = [
			$columnName => $value
		];
		if (!$includeSoftDeletes) {
			$where["deletedAt"] = null;
		}

		$result = $this->db->select($this->primaryKey)
			->from($this->tableName)
			->where($where)
			->get()
			->num_rows();
		return $result > 0;
	}

	public function lastID()
	{
		return $this->db->insert_id();
	}
}
