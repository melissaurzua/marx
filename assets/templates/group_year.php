<!-- Groups Overwiev -->

<div id="year-overview" class="row groups">

	<div class="small-12 columns group-header">
		<?=$this->getData()->group->name;?> <?=$this->getData()->year;?>
	</div>

	<div class="row month-overview">
		<? foreach($this->getData()->months as $month): ?>

			<div class="small-4 columns month month-<?=$month->type;?>">

				<a href="<?=$this->uri('group', $this->data->group->id, array('month'=> $month->month));?>" class="month-wrapper" style="display:block; height:100px; width:50px; position: relative;">
					<?php foreach($month->members as $i => $member) : ?>
						<div class=" <?=$member->type;?> group group-<?= $i+1; ?>" style="height:<?=$member->percentage*100;?>%">
						</div>
					<?php endforeach; ?>
				</a>
				<h3><?=$month->title;?></h3>
			</div>
		<?php endforeach; ?>
	</div>

	<?//$this->getPart("nav");?>

</div>

<?// var_dump($this->data) ?>