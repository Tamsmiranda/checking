<?php
class Check extends CheckingAppModel {
	var $name = 'Check';
	var $displayField = 'title';
	var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PublisherType' => array(
			'className' => 'PublisherType',
			'foreignKey' => 'publisher_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Publisher' => array(
			'className' => 'Publisher',
			'foreignKey' => 'publisher_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Section' => array(
			'className' => 'Section',
			'foreignKey' => 'section_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Campaign' => array(
			'className' => 'Campaign',
			'foreignKey' => 'campaign_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function afterFind($results) {
		foreach ($results as $key => $val) {
			if (isset($val['Check']['params'])) {
				foreach (json_decode($val['Check']['params']) as $json) {
					$results[$key]['Json'][] = (array) $json;
				}
			}
		}
		return $results;
	}
}
?>