<ul class="transactions">
	<? foreach($this->getData()->transactionsByDay as $transactionsDay): ?>
		<li>
			<ul class="transactions-day">
				<? foreach($transactionsDay->transactions as $transaction): ?>
					<li>
						<div class="transactions-day-label">
							<?=$transactionsDay->day?>
						</div>
						<div class="transactions-day-info">
							<?=$transaction->name;?>, <?=$transaction->title;?>
						</div>
						<div class="transactions-day-value">
							<?=$this->number($transaction->value);?>
						</div>
					</li>
				<? endforeach; ?>
			</ul>
		</li>
	<? endforeach; ?>
</ul>