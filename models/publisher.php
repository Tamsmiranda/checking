<?php
class Publisher extends CheckingAppModel {
	var $name = 'Publisher';
	var $displayField = 'name';
	var $actsAs = array(
		'WhoDidIt',
		'MeioUpload.MeioUpload' => array(
			'logo' => array(
				'dir' => 'files{DS}publishers{DS}logos{DS}',
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
		'publisher_type_id' => array(
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
		'PublisherType' => array(
			'className' => 'PublisherType',
			'foreignKey' => 'publisher_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Clipp' => array(
			'className' => 'Clipp',
			'foreignKey' => 'publisher_id',
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


	var $hasAndBelongsToMany = array(
		'Section' => array(
			'className' => 'Section',
			'joinTable' => 'publishers_sections',
			'foreignKey' => 'publisher_id',
			'associationForeignKey' => 'section_id',
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