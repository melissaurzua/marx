<form method="post">
	<div class="pay-add row">
		<div class="small-12 columns group-header">
			Zahlung erfassen
		</div>


		<div class="small-12 columns">
			<input class="field" type="text" name="value" placeholder="Betrag" required>
			<input class="field" type="text" name="title" placeholder="Notiz" required>
		</div>

		<div class="small-12 columns">
			<div class="cycles">
				<? foreach($this->getData()->cycles as $i => $cycle): ?>
					<div class="cycle-outer">
						<a data-id="<?=$cycle->key;?>"class="cycle-<?=$i;?> <?=($i == 0 ? 'selected' : '');?>" href="javascript:void(0)"><?=$cycle->title;?></a>
					</div>
				<? endforeach ?>
			</div>
			<input type="hidden" name="cycle" id="cycle" value="1">
		</div>

		<div class="small-12 columns pay-nav">
			<div class="row navigation">
			  <div class="small-6 columns">
					<a href="<?=$this->uri('group', $this->getData()->group->id)?>">
						<button class="button cancel" type="button" role="button" aria-label="Toggle Navigation"></button>
					</a>
			  </div>
			  <div class="small-6 columns">
					<input  class="button submit" type="submit" name="pay" id="pay" value="Zahlen" >
			  </div>
			</div>
		</div>


	</div>
</form>