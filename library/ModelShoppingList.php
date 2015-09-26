<?php

class ModelShoppingList extends Model {
	public function __construct(Db $db, $name){
		parent::__construct($db, 'shopping_list');
	}


}