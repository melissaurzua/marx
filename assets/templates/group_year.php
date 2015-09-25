<!-- Groups Overwiev -->

<div id="year-overview" class="row groups">

	<div class="small-12 columns group-header">
		<?=$this->getData()->group->name;?> <?=$this->getData()->year;?>
	</div>

	<div class="month-overview">
		<? foreach($this->getData()->months as $month): ?>

			<div class="month month-<?=$month->type;?>">
				<div class="month-wrapper">
					<?php foreach($month->members as $i => $member) : ?>
						<?=$member->percentage;?>
						<div class="small-12 columns <?=$member->type;?> group group-<?= $i+1; ?>" style="height:<?=$member->percentage*100;?>%">
						</div>
					<?php endforeach; ?>
				</div>
				<h3><?=$month->title;?></h3>
			</div>
		<?php endforeach; ?>
	</div>

	<?//$this->getPart("nav");?>

</div>

<?// var_dump($this->data) ?>