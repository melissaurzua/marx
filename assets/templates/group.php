<!-- Groups Overwiev -->

<div id="group-overview" class="row groups">

  <div class="small-12 columns group-header">
    <?=$this->getData()->group->name;?>
  </div>

  <div class="height-wrapper">
    <?php foreach($this->getData()->members as $i => $member) : ?>
      <div class="small-12 columns <?=$member->type;?> group group-<?= $i+1; ?>" style="height:<?=$member->percentage*100;?>%">
        <div class="member-text">
          <?=$member->name;?>
	 		    <?=$member->percentage;?>
        </div>
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

  <?//$this->getPart("nav");?>

</div>

<?// var_dump($this->data) ?>