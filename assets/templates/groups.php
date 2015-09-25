<!-- Groups Overwiev -->
<?php $groupHeight = 100/count($this->data->groups); ?>

<div id="groups-overview" class="row groups">
	<?php foreach($this->data->groups as $i => $group) : ?>
    <a href="<?=$this->uri('group', $group->id)?>">
		  <div class="small-12 medium-6 large-4 columns group group-<?= $i+1; ?>" style="height:<?= $groupHeight ?>%">
		  	<?=$group->name;?>
		  </div>
    </a>
	<?php endforeach; ?>
</div>