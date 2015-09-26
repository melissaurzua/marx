<!-- Groups Overwiev -->

<? if ($this->data->onlyController): ?>
	<? include BASE_PATH . 'assets/templates/group_inner.php'; ?>
<? else : ?>

	<div id="group-outer" data-id="<?=$this->getData()->group->id;?>">
		<div class="group-outer-scroller active-1">
			<div id="group-list" class="group-outer-container"  data-index="0"></div>
			<div id="group-overview" class="row groups group-outer-container" data-index="1">
				<? include BASE_PATH . 'assets/templates/group_inner.php'; ?>
			</div>
			<div id="group-year" data-index="2" class="group-outer-container"></div>

		</div>
	</div>

	<div class="pagination active-1">
		<span class="page0"></span>
		<span class="page1"></span>
		<span class="page2"></span>
	</div>

	<?$this->getPart("burger");?>
	<?$this->getPart("nav");?>

<? endif; ?>

