<h1><?=$this->number($this->getData()->value);?></h1>
<h1><?=$this->getData()->title;?></h1>

<!-- Groups Overwiev -->
<?php $groupHeight = 60/count($this->data->groups); ?>

<div id="groups-overview" class="row groups">
	<?php foreach($this->data->groups as $i => $group) : ?>
		<a href="javascript:void(0);" data-id="<?=$group->id;?>" >
			<div class="group group-<?= $i+1; ?>" style="height:<?= $groupHeight ?>%">
				<?=$group->name;?>
			</div>
		</a>
	<?php endforeach; ?>
</div>

<form method="post">
	<input type="hidden" name="value" value="<?=$this->getData()->value?>" >
	<input type="hidden" name="title" value="<?=$this->getData()->title?>" >
	<input type="hidden" name="id_group" value="" />
</form>