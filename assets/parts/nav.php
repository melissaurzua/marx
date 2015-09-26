<div class="row navigation">

  <div class="small-6 columns">
    <button class="button burger" type="button" role="button" aria-label="Toggle Navigation"></button>
  </div>
	<a href="<?=$this->uri('pay');?>" class="hidden-pay">ZAHLEN</a>
  <div class="small-6 columns">
		<a class="add-button" href="<?=$this->uri((isset($this->getData()->addAction) ? $this->getData()->addAction : 'pay_add'));?>" >
    	<button class="button plus" type="button" role="button" aria-label=""></button>
		</a>
    <div class="clearfix"></div>
  </div>

  <a href="<?=$this->uri('pay');?>" class="hidden-pay">ZAHLEN</a>

</div>