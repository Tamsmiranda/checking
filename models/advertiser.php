<?php
class Advertiser extends CheckingAppModel {
	var $name = 'Advertiser';
	var $displayField = 'name';
	var $validate = array(
		'name' => array(
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
	
	var $actsAs = array(
		'MeioUpload.MeioUpload' => array(
			'logo' => array(
				'dir' => 'files{DS}advertisers{DS}logos{DS}',
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
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Campaign' => array(
			'className' => 'Campaign',
			'foreignKey' => 'advertiser_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>