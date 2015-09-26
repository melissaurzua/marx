<div class="pay ">
	<div class="small-12 columns group-header">
		Zahlungsanfrage
	</div>

	<div class="height-wrapper">
		<div class="pay-intro">
			<div class="pay-value"><?=$this->number($this->getData()->value);?></div>
			<div class="pay-title"><?=$this->getData()->title;?></div>
		</div>

		<div id="groups-overview" class="row pay-groups">
			<?php foreach($this->data->groups as $i => $group) : ?>
				<a href="javascript:void(0);" data-id="<?=$group->id;?>" class="<?=($this->getData()->id_group == $group->id ? 'selected' : '');?>" >
					<div class="group group-<?= $i+1; ?>" >
						<?=$group->name;?>
					</div>
				</a>
			<?php endforeach; ?>
		</div>

		<form method="post">
			<input type="hidden" name="value" value="<?=$this->getData()->value?>" >
			<input type="hidden" name="title" value="<?=$this->getData()->title?>" >
			<input type="hidden" name="id_group" id="id_group" value="<?=$this->getData()->id_group?>" />

			<div class="row navigation">
				<div class="small-6 columns">
					<a href="<?=$this->uri('groups')?>">
						<button class="button cancel" type="button" role="button" aria-label="Toggle Navigation"></button>
					</a>
				</div>
				<div class="small-6 columns">
					<input  class="button submit" type="submit" name="pay" id="pay" value="Zahlen" <?=(is_null($this->getData()->id_group) ? 'disabled' : '');?>>
				</div>
			</div>
		</form>
	</div>
</div>
