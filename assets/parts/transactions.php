<div id="transactions" class="row">

	<? foreach($this->getData()->transactionsByDay as $transactionsDay): ?>
		<div class="transaction-day small-12 columns">
			<div class="row">
				<? foreach($transactionsDay->transactions as $transaction): ?>
					<div class="small-2 columns transactions-day-day">
						<?=$transactionsDay->day;?>
					</div>
					<div class="small-7 columns transactions-day-info">
						<?=$transaction->name;?>, <?=$transaction->title;?>
					</div>
					<div class="small-3 columns transactions-day-value">
						<?=$this->number($transaction->value);?>
					</div>
				<? endforeach; ?>
			</div>
		</div>
	<? endforeach; ?>

</div>