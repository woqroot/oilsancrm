<?php


function isLogin()
{
	$ci =& get_instance();
	return $ci->session->userLogin == true;
}

function getContent()
{
	$bt = debug_backtrace();
	include dirname($bt[0]['file']) . "/content.php";
}

function uploads_url($var = "")
{
	return base_url("public/uploads/" . $var);
}

function uploads_dir($var = "")
{
	return realpath(".") . "/public/uploads/" . $var;
}

function assets_url($var = "")
{
	return base_url("public/assets/" . $var);
}

function public_url($var = "")
{
	return base_url("public/" . $var);
}

function getThemeClass()
{
	if (Auth::get("theme") == "dark") {
		return "moon";
	}
	return "sun";
}

if (!function_exists("getUser")) {
	function getUser($id, $columns = "*")
	{
		$ci =& get_instance();
		$ci->load->model("UserModel");

		return $ci->UserModel->first($id);
	}
}
function getAvatar($image, $imgClass = "rounded-circle", $spanClass = null)
{


	if (is_array($image)) {
		if (is_file(uploads_dir($image["image"]))) {
			return '<img class="' . $imgClass . '" alt="Logo" style="max-width:100%" src="' . uploads_url($image["image"]) . '">';
		}
		return '<div class="symbol-label fs-3 bg-light-primary text-primary"><span class="' . $spanClass . '">' . mb_substr($image["firstName"], 0, 1, 'UTF-8') . mb_substr($image["lastName"], 0, 1, 'UTF-8') . '</span></div>';
	}
	if (is_file(uploads_dir($image))) {
		return '<img class="' . $imgClass . '" alt="Logo" style="max-width:100%" src="' . uploads_url($image) . '">';
	}
	return '<div class="symbol-label fs-3 bg-light-primary text-primary"><span class="' . $spanClass . '">NP</span></div>';


}

function showRole(array $role = [])
{
	if ($role) {
		return '<span class="badge badge-' . $role["colorClass"] . '">' . $role["title"] . '</span>';
	}
}

function showDate($YmdHis)
{
	return date("d/m/Y H:i:s", strtotime($YmdHis));
}

function convertDateTime($dateTime)
{


	$regEx = '/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/';
	if (preg_match($regEx, $dateTime)) {
		return date("d/m/Y H:i:s", strtotime($dateTime));
	}
	return date("Y-m-d H:i:s", strtotime($dateTime));
}

function getMissionStatuses($id = null)
{
	return [
		[
			'statusId' => 1,
			'title' => 'İşlem Bekliyor',
			'className' => 'info'
		],
		[
			'statusId' => 2,
			'title' => 'Tamamlandı',
			'className' => 'success'
		],

	];
}
function clearDateTime($date)
{
	return str_replace(["T", "+03:00"], [" ", ""], $date);
}

function convertDate($date)
{

	if ($date) {

		$regEx = '/(\d{4})-(\d{2})-(\d{2})/';
		if (preg_match($regEx, $date)) {
			return date("d/m/Y", strtotime($date));
		}
		return date("Y-m-d", strtotime($date));
	}
	return null;
}

function phoneMask($string)
{
	if (!is_string($string)) return "";
	if (strlen($string) == 15) {
		return "9" . str_replace(["(", ")", " ", "-", "_", "?"], "", $string);
	} elseif (strlen($string) == 12) {
		return $string[1] . "(" . $string[2] . $string[3] . $string[4] . ") " . $string[5] . $string[6] . $string[7] . " " . $string[8] . $string[9] . $string[10] . $string[11];
	} else {
		return "";
	}
}

function private_str($str, $start, $end)
{
	$after = mb_substr($str, 0, $start, 'utf8');
	$repeat = str_repeat('*', $end);
	$before = mb_substr($str, ($start + $end), strlen($str), 'utf8');
	return $after . $repeat . $before;
}

function isOnline($lastSeenAt, $draw = false)
{
	$isOnlineTimeOut = 10 * 60;
	if (time() - strtotime($lastSeenAt) < $isOnlineTimeOut) {
		if ($draw) {
			return '<div data-bs-toggle="tooltip" title="Çevrimiçi" data-bs-placement="bottom" class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>';
		}
		return true;
	}
	if ($draw) {
		return '<div data-bs-toggle="tooltip" title="Çevrimdışı" data-bs-placement="bottom" class="bg-danger position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>';
	}
	return false;
}

function passwordEncrypt($password)
{
	return password_hash($password, PASSWORD_BCRYPT);
}

function generateUUID(): string
{

	$byt = openssl_random_pseudo_bytes(16);
	$byt[6] = chr(ord($byt[6]) & 0x0f | 0x40);
	$byt[8] = chr(ord($byt[8]) & 0x3f | 0x80);
	return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($byt), 4));
}

function upload_file($fileInputName, $directory = "other", $allowed_types = "*", $max_size = 4096)
{
	$ci =& get_instance();
	$config = array(
		'upload_path' => uploads_dir() . $directory . "/",
		'file_name' => generateUUID(),
		'allowed_types' => $allowed_types,
		'max_size' => $max_size,
	);
	$ci->load->library('upload', $config);

	if ($ci->upload->do_upload($fileInputName)) {
		return $directory . "/" . $ci->upload->data("file_name");
	}
	return false;
}

function timeAgo($timestamp)
{
	$datetime1 = new DateTime("now");
	$datetime2 = date_create($timestamp);
	$diff = date_diff($datetime1, $datetime2);
	$timemsg = '';
	if ($diff->y > 0) {
		$timemsg = $diff->y . ' yıl önce';

	} else if ($diff->m > 0) {
		$timemsg = $diff->m . ' ay önce';
	} else if ($diff->d > 0) {
		$timemsg = $diff->d . ' gün önce';
	} else if ($diff->h > 0) {
		$timemsg = $diff->h . ' saat önce';
	} else if ($diff->i > 0) {
		$timemsg = $diff->i . ' dakika önce';
	} else if ($diff->s > 0) {
		$timemsg = "Az önce";
	} else {
		$timemsg = "Şu anda aktif";
	}

	return $timemsg;
}

function isCan(...$slugs)
{
	return Auth::isCan(...$slugs);
}

function writeDisableByPerm(...$slugs)
{
	return "";
	return Auth::isCan(...$slugs) ? "" : "disabled";
}

function hideByPerm(...$slugs)
{

	return Auth::isCan(...$slugs) ? "" : "d-none";
}

function isCanOr(...$slugs)
{
	return Auth::isCanOr(...$slugs);
}

function isCanAnd(...$slugs)
{
	return Auth::isCanAnd(...$slugs);
}

function checkPermsOr(...$slugs)
{
	return Auth::checkPermsOr(...$slugs);
}

function checkPerms(...$slugs)
{
	return Auth::checkPerms(...$slugs);
}

function post($var)
{
	return $_POST[$var] ?? null;
}

function rounder($num)
{
	$decimals = number_format($num - floor($num), 2, ".", "");

	if ($decimals >= 0.99) {
		return ceil($num);
	} else if ($decimals <= 0.01) {
		return floor($num);
	}
	return $num;
}

function config($key)
{
	$ci =& get_instance();
	return $ci->ConfigModel->get($key);
}

function getCountries()
{
	$ci =& get_instance();
	$ci->load->model("CountryModel");
	return $ci->CountryModel->all([], "countryId ASC");
}

function showBalance($decimal, $currency = false)
{
	$return = "";
	$formatted = number_format($decimal, 2, ",", ".");

	$return .= $formatted;

	if ($currency) {
		$return .= " " . currency($currency);
	}
	return $return;
}

function currency($idOrName, $symbol = true)
{
	return Helper::currency($idOrName, $symbol);
}

function reLocalizeDate($date, $format = "Y-m-d")
{
	$arr = array_flip([
		'Mon' => 'Pts',
		'Tue' => 'Sal',
		'Wed' => 'Çar',
		'Thu' => 'Per',
		'Fri' => 'Cum',
		'Sat' => 'Cts',
		'Sun' => 'Paz',
		'Jan' => 'Oca',
		'Feb' => 'Şub',
		'Mar' => 'Mar',
		'Apr' => 'Nis',
		'Jun' => 'Haz',
		'Jul' => 'Tem',
		'Aug' => 'Ağu',
		'Sep' => 'Eyl',
		'Oct' => 'Eki',
		'Nov' => 'Kas',
		'Dec' => 'Ara',
	]);

	$arr["Agu"] = "Aug";

	return date($format, strtotime(str_replace(array_keys($arr), array_values($arr), $date)));

}

function localizeDate($format, $datetime = 'now')
{
	$z = date("$format", strtotime($datetime));
	$gun_dizi = array(
		'Monday' => 'Pazartesi',
		'Tuesday' => 'Salı',
		'Wednesday' => 'Çarşamba',
		'Thursday' => 'Perşembe',
		'Friday' => 'Cuma',
		'Saturday' => 'Cumartesi',
		'Sunday' => 'Pazar',
		'January' => 'Ocak',
		'February' => 'Şubat',
		'March' => 'Mart',
		'April' => 'Nisan',
		'May' => 'Mayıs',
		'June' => 'Haziran',
		'July' => 'Temmuz',
		'August' => 'Ağustos',
		'September' => 'Eylül',
		'October' => 'Ekim',
		'November' => 'Kasım',
		'December' => 'Aralık',
		'Mon' => 'Pts',
		'Tue' => 'Sal',
		'Wed' => 'Çar',
		'Thu' => 'Per',
		'Fri' => 'Cum',
		'Sat' => 'Cts',
		'Sun' => 'Paz',
		'Jan' => 'Oca',
		'Feb' => 'Şub',
		'Mar' => 'Mar',
		'Apr' => 'Nis',
		'Jun' => 'Haz',
		'Jul' => 'Tem',
		'Aug' => 'Ağu',
		'Sep' => 'Eyl',
		'Oct' => 'Eki',
		'Nov' => 'Kas',
		'Dec' => 'Ara',
	);
	foreach ($gun_dizi as $en => $tr) {
		$z = str_replace($en, $tr, $z);
	}
	if (strpos($z, 'Mayıs') !== false && strpos($format, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
	return $z;
}

function getCity($cityID)
{
	$ci =& get_instance();
	$find = $ci->CityModel->first($cityID);
	return $find ? $find["title"] : null;
}

function getDistrict($districtID)
{
	$ci =& get_instance();
	$find = $ci->DistrictModel->first($districtID);
	return $find ? $find["title"] : null;
}

function getCountry($countryID)
{
	$ci =& get_instance();
	$find = $ci->CountryModel->first($countryID);
	return $find ? $find["title"] : null;
}

function getAccount($accountID)
{
	$ci =& get_instance();
	$find = $ci->AccountModel->first($accountID);
	return $find ? $find : null;
}

function bankName($bankID)
{
	$ci =& get_instance();
	$find = $ci->BankModel->first($bankID);
	return $find ? $find["name"] : null;
}

function getBanks()
{
	$ci =& get_instance();
	return $ci->BankModel->all([], "name ASC");
}


function clearDecimal($decimal)
{
	return str_replace(",", ".", str_replace(".", "", $decimal));
}

function getVats()
{
	return [0];
}

function generateInvoiceNumber($id = 1): string
{
	return date("Y") . "00" . $id;
}

function includeVat($decimal, $vatPercent = 18)
{
	return $decimal + ($decimal * $vatPercent / 100);
}

function excludeVat($decimal, $vatPercent = 18)
{
	return $decimal / (100 + $vatPercent) * 100;
}

function commaToDot($value)
{
	return str_replace(",", ".", str_replace(".", "", $value));
}
function generateEmailBody($user, $message)
{

	return '  <div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto"
               style="border-collapse:collapse">
            <tbody>
            <tr>
                <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                    <!--begin:Email content-->
                    <div style="text-align:center; margin:0 15px 34px 15px">
                        <!--begin:Logo-->
                        <div style="margin-bottom: 10px">
                            <a href="<?= base_url() ?>" rel="noopener" target="_blank">
                                <img alt="Logo" src="'.public_url().'assets/media/logos/logo-dark.svg"
                                     style="height: 125px">
                            </a>
                        </div>
                        <!--end:Logo-->
                        <!--begin:Text-->
                        <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
                            <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Merhaba '.$user["firstName"].',
                                OilsanCRM\'den mesaj var!</p>
                            <p style="margin-bottom:2px; color:#7E8299">'.$message.'</p>
                        </div>
                        <!--end:Text-->
                        <!--begin:Action-->
                        <a href="'.base_url().'"
                           style="background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">
                            Giriş Yap
                        </a>
                        <!--begin:Action-->
                    </div>
                    <!--end:Email content-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>';

}
