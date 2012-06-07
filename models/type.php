<?php
class Type extends ClippingAppModel {
	var $name = 'Type';
	var $displayField = 'title';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'Publisher' => array(
			'className' => 'Publisher',
			'joinTable' => 'publisher_types',
			'foreignKey' => 'type_id',
			'associationForeignKey' => 'publisher_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>