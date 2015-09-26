<div class="small-12 columns group-header">
	<?=$this->getData()->group->name;?> <?=$this->getData()->monthTitle;?>
	<? $this->getPart('transactions'); ?>
</div>
<div class="height-wrapper <?=(isset($this->data->update) && $this->data->update ? 'update' : '')?>">
	<?php foreach($this->getData()->members as $i => $member) : ?>
		<div class="small-12 columns <?=$member->type;?> group group-<?= $i+1; ?> group-id-<?=$member->id;?>" style="height:<?=$member->percentage*100;?>%">
			<?php if($member->percentage>=0.05) : ?>
				<div class="member-text">
					<span class="member-name"><?=$member->name;?></span>
					<span class="member-value"><?=$member->total;?>.-</span>
				</div>
			<? endif ?>
		</div>
	<?php endforeach; ?>
	<? if (isset($this->data->update) && $this->data->update):?>
		<div class="month-list">
			<?php foreach($this->getData()->days as $i => $day) : ?>
				<li class="<?=($day->active ? 'day active' : 'day');?>">
					<?=$day->name;?>
				</li>
			<?php endforeach; ?>
		</div>
	<? endif; ?>
</div>