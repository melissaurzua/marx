<form method="post">
	<div class="pay-add row">
		<div class="small-12 columns group-header">
			Artikel hinzufügen
		</div>


		<div class="small-12 columns">
			<input class="field" type="text" name="value" placeholder="Name" required>
		</div>

		<div class="small-12 columns pay-nav">
			<div class="row navigation">
				<div class="small-6 columns">
					<a href="<?=$this->uri('group', $this->data->group->id,array('index' => 0))?>">
						<button class="button cancel" type="button" role="button" aria-label="Toggle Navigation"></button>
					</a>
				</div>
				<div class="small-6 columns">
					<input  class="button submit" type="submit" name="pay" id="pay" value="Erstellen" >
				</div>
			</div>
		</div>


	</div>
</form>