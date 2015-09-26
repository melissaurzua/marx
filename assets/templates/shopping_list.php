<div id="shopping-overview" class="row groups">
  <div class="small-12 columns group-header">
    Einkaufsliste
  </div>
  <div class="small-12 columns shopping-list">
		<? foreach($this->getData()->items as $item): ?>
			<div class="small-12 columns item ">
				<div class="small-10 columns item-title">
					<?=$item->article?>
				</div>
				<div class="small-2 columns item-title">
					<input type="checkbox" <?=($item->checked ? 'checked' : '');?>/>
				</div>
			</div>
		<? endforeach ?>
  </div>

</div>