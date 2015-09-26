<!-- Groups Overwiev -->
<?php $groupHeight = 100/count($this->data->groups); ?>

<div id="groups-overview" class="row groups">

  <div class="small-12 columns group-header">
    MEINE GRUPPEN
  </div>

  <div class="height-wrapper">
	 <?php foreach($this->data->groups as $i => $group) : ?>
      <a href="<?=$this->uri('group', $group->id)?>">
        <div class="small-12 medium-6 large-4 columns group group-<?= $i+1; ?>" style="height:<?= $groupHeight ?>%">
          <div class="group-text">
            <span class="group-name"><?=$group->name;?></span>
          </div>
        </div>
      </a>
	 <?php endforeach; ?>
  </div>

</div>

<?$this->getPart("burger");?>
<?$this->getPart("nav");?>

<? ($this->getData()->splash ? $this->getPart('splash') : '');?>
