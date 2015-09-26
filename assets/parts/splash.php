<div class="splash">
  <div id="splash-svg"></div>
</div>

<div class="hide">
	<?php
		$path = BASE_PATH . 'assets/img/buttons/';
		foreach(glob($path  . '*') as $img){
			$name = str_replace($path, '', $img);
			echo '<img src="' . ROOT . 'assets/img/buttons/' . $name . '" >';
		}
	?>
</div>
