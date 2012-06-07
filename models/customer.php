<?php
class Customer extends ClippingAppModel {
	var $name = 'Customer';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	var $actsAs = array(
		'MeioUpload.MeioUpload' => array(
			'picture' => array(
				'dir' => 'files{DS}customer{DS}',
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Clipp' => array(
			'className' => 'Clipp',
			'foreignKey' => 'customer_id',
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
		
	var $validate = array(
		/*'cnpj' => array(
			'cnpj' => array(
				'rule' => array('cnpj'),
				'message' => 'Invalid CNPJ',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
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
		'social_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'phone' => array(
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
	
	function cnpj(/*&$model, */$data, $apenasNumeros, $extra = null) {
		if ($extra) {
			return $this->_cnpj(current($data), $apenasNumeros);
		}
		return $this->_cnpj(current($data));
	}
	
	function _cnpj($data, $apenasNumeros = false) {
		// Testar o formato da string
		if ($apenasNumeros) {
		if (!ctype_digit($data) || strlen($data) != 14) {
			return false;
		}
		$numeros = $data;
		} else {
			if (!preg_match('/\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}/', $data)) {
				return false;
			}
			$numeros = substr($data, 0, 2) . substr($data, 3, 3) . substr($data, 7, 3) . substr($data, 11, 4) . substr($data, 16, 2);
		}
		// Testar o dígito verificador
		for ($pos = 12; $pos <= 13; $pos++) {
			$soma = 0;
			$mult = $pos - 7; // 5 ou 6
			for ($i = 0; $i < $pos; $i++) {
				$soma += $numeros{$i} * $mult--;
				if ($mult === 1) {
					$mult = 9;
				}
			}
			$div = $soma % 11;
			if ($div < 2) {
				$dvCorreto = 0;
			} else {
				$dvCorreto = 11 - $div;
			}
			if ($dvCorreto != $numeros{$pos}) {
				return false;
			}
		}
		return true;
	}

}
?>