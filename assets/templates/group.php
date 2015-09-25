<!-- Groups Overwiev -->

<div id="group-overview" class="row groups">

  <div class="small-12 columns group-header">
    <?=$this->getData()->group->name;?>
		<? $this->getPart('transactions'); ?>
  </div>

  <div class="height-wrapper">
    <?php foreach($this->getData()->members as $i => $member) : ?>
      <div class="small-12 columns <?=$member->type;?> group group-<?= $i+1; ?>" style="height:<?=$member->percentage*100;?>%">
        <?php if($member->percentage>=0.05) : ?>
          <div class="member-text">
            <span class="member-name"><?=$member->name;?></span>
	 		      <span class="member-value"><?=$member->percentage;?></span>
          </div>
        <? endif ?>
      </div>
    <?php endforeach; ?>

    <div class="month-list">
      <?php foreach($this->getData()->days as $i => $day) : ?>
        <li class="<?=($day->active ? 'day active' : 'day');?>">
          <?=$day->name;?>
        </li>
      <?php endforeach; ?>
    </div>
  </div>

</div>

<?$this->getPart("nav");?>

<?// var_dump($this->data) ?>