<div class="menu-item">
	<div class="menu-content pt-8 pb-2">
		<span class="menu-section text-muted text-uppercase fs-8 ls-1"><?= $item["heading"] ?></span>
	</div>
</div>
<?php

foreach (Auth::getSidebar() as $item) {
	if (isset($item["heading"])) {
		?>
		<div class="menu-item">
			<div class="menu-content pt-8 pb-2">
				<span class="menu-section text-muted text-uppercase fs-8 ls-1"><?= $item["heading"] ?></span>
			</div>
		</div>
		<?php
	}else{
		if ($item["childrens"]) {
			?>
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
					<i class="<?= $item["icon"] ?>"></i>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title"><?= $item["title"] ?></span>
										<span class="menu-arrow"></span>
									</span>
				<div class="menu-sub menu-sub-accordion menu-active-bg">
					<?php
					foreach ($item["childrens"] as $value) {
						if (!$value["childrens"]) {
							?>
							<div class="menu-item">
								<a class="menu-link" href="<?=$value["link"]?>">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title"><?= $value["title"] ?></span>
								</a>
							</div>
							<?php
						} else {
							?>
							<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title"><?= $value["title"] ?></span>
												<span class="menu-arrow"></span>
											</span>
								<div class="menu-sub menu-sub-accordion menu-active-bg">
									<?php
									foreach ($value["childrens"] as $thirdChild) {
										?>
										<div class="menu-item">
											<a class="menu-link"
											   href="<?=$thirdChild["link"]?>">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
												<span class="menu-title"><?=$thirdChild["title"]?></span>
											</a>
										</div>
										<?php
									}
									?>
								</div>
							</div>
							<?php
						}
						?>


						<?php
					}
					?>
				</div>
			</div>
			<?php
		} else {
			?>
			<div class="menu-item">
				<a class="menu-link" href="<?= $item["link"] ?>">
										<span class="menu-icon">
											<i class="<?= $item["icon"] ?>"></i>
										</span>
					<span class="menu-title"><?= $item["title"] ?></span>
				</a>
			</div>
			<?php
		}
	}

	?>

	<?php
}
?>
