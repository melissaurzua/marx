<h2>Zahlung erfassen</h2>
<form method="post">
	<input type="number" name="value" placeholder="Betrag" required>
	<input type="text" name="title" placeholder="Notiz" required>
	<ul>
	<? foreach($this->getData()->cycles as $cycle): ?>
		<li>
			<a href="javascript:void(0)"><?=$cycle->title;?></a>
		</li>
	<? endforeach ?>
	</ul>
	<input type="text" name="cycle">
	<input type="submit" name="pay">
</form>