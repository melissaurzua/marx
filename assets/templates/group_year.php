<!-- Groups Overwiev -->

<div id="year-overview" class="row groups">

	<div class="small-12 columns group-header">
		<?=$this->getData()->group->name;?> <?=$this->getData()->year;?>
	</div>
	<div class="small-12 columns">
		<div class="row month-overview">
			<? foreach($this->getData()->months as $month): ?>
				<div class="small-4 columns month month-<?=$month->type;?>">
					<a href="javascript:void(0);" data-target="1" data-uri="<?=$this->uri('group', $this->data->group->id, array('only_controller' => 1,'month'=> $month->month));?>" class="month-wrapper">
						<?php foreach($month->members as $i => $member) : ?>
							<div class=" <?=$member->type;?> group group-<?= $i+1; ?>" style="height:<?=$member->percentage*100;?>%">
							</div>
						<?php endforeach; ?>
					</a>
					<span class="month-text"><?=$month->title;?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<?//$this->getPart("nav");?>

</div>

<?// var_dump($this->data) ?>