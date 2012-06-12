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

	var $actsAs = array(
		'MeioUpload.MeioUpload' => array(
			'file' => array(
				'dir' => 'files{DS}checks{DS}',
				'create_directory' => true,
				//'allowed_mime' => array('application/msword','application/excel','application/vnd.ms-excel','application/vnd.ms-powerpoint','application/zip','video/x-ms-wmv','video/x-flv',''),
				//'allowed_ext' => array('.jpg', '.jpeg', '.png','.gif','.doc','.docx','.wmv','.flv','.mp4','.avi','.xls','.xlsx','.ppt','.pptx','.wav','.zip'),
				'max_size' => '1024 mb',
				/*'thumbsizes' => array(
					'320x90' => array(
                        'width' => 320,
                        'height' => 90,
						'forceAspectRatio' => 'C',
                    )
				),*/
			)
		)
	);	
	
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