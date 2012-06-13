<?php
class ChecksController extends CheckingAppController {

	var $name = 'Checks';
	var $components = array('Email');
	var $paginate = array(
		'limit' => 100,
	);

	function index() {
		$this->Check->recursive = 0;
		$this->set('checks', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid check', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('check', $this->Check->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Check->create();
			if ($this->Check->save($this->data)) {
				$this->Session->setFlash(__('The check has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The check could not be saved. Please, try again.', true));
			}
		}
		$customers = $this->Check->Customer->find('list');
		$publisherTypes = $this->Check->PublisherType->find('list');
		$publishers = $this->Check->Publisher->find('list');
		$sections = $this->Check->Section->find('list');
		$this->set(compact('customers', 'publisherTypes', 'publishers', 'sections'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid check', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Check->save($this->data)) {
				$this->Session->setFlash(__('The check has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The check could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Check->read(null, $id);
		}
		$customers = $this->Check->Customer->find('list');
		$publisherTypes = $this->Check->PublisherType->find('list');
		$publishers = $this->Check->Publisher->find('list');
		$sections = $this->Check->Section->find('list');
		$this->set(compact('customers', 'publisherTypes', 'publishers', 'sections'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for check', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Check->delete($id)) {
			$this->Session->setFlash(__('Check deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Check was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_index() {
		$this->Check->recursive = 0;
		$conditions = array();
		if (!empty($this->data)) {
			//debug($this->data);exit;
			$conditions[] = $this->data['Check']['advertiser_id'] ? array('Campaign.advertiser_id' => $this->data['Check']['advertiser_id']) : null;
			$conditions[] = $this->data['Check']['campaign_id'] ? array('Check.campaign_id' => $this->data['Check']['campaign_id']) : null;
			$conditions[] = $this->data['Check']['location'] ? array('Check.location' => $this->data['Check']['location']) : null;
			$conditions[] = $this->data['Check']['customer_id'] ? array('Check.customer_id' => $this->data['Check']['customer_id']) : null;
			$conditions[] = $this->data['Check']['publisher_type_id'] ? array('PublisherType.id' => $this->data['Check']['publisher_type_id']) : null;
			$conditions[] = $this->data['Check']['publisher_id'] ? array('Check.publisher_id' => $this->data['Check']['publisher_id']) : null;
			$conditions[] = $this->data['Check']['section_id'] ? array('Check.section_id' => $this->data['Check']['section_id']) : null;
		}
		$this->loadModel('Advertiser');
		$advertisers = $this->Advertiser->find('list');
		$campaigns = $this->Check->Campaign->find('list');
		$customers = $this->Check->Customer->find('list');
		$publisherTypes = $this->Check->PublisherType->find('list');
		$publishers = $this->Check->Publisher->find('list');
		$sections = $this->Check->Section->find('list');
		$checks = $this->paginate($conditions);
		$this->set(compact('checks', 'customers', 'publisherTypes', 'publishers', 'sections', 'campaigns', 'advertisers'));
	}

	function admin_view($id = null) {
		if (!$id && empty($_REQUEST)) {
			$this->Session->setFlash(__('Invalid check', true));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($_REQUEST)) {
			$checks = $_REQUEST['id'];
		} elseif (!$id) {
			$this->Session->setFlash(__('Select a Check to send', true));
			$this->redirect(array('action'=>'index'));
		} else {
			$checks = array($id);
		}
		
		$this->autoRender = false;
		
		$checks = $this->Check->find('all', array(
				'conditions' => array(
				'Check.id' => $checks,
			)
		));
		
		$this->loadModel('Advertiser');
		
		foreach ($checks as $key => $check) {
			$advertiser = $this->Advertiser->read(null, $check['Check']['advertiser_id']);
			$checks[$key] = array_merge($check, $advertiser);
		}
		
		$this->set(compact('checks'));
		if (!empty($this->params['named'])) {
			if (!empty($this->params['named']['filetype'])) {
				switch ($this->params['named']['filetype']) {
					case 'xls':
					default :
						$this->layout = 'ajax';
						$this->render('excel');
						break;
				}
			}
		} else {
			$this->layout = 'ajax';
			$this->render('excel');
		}
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Check->create();
			if ($this->Check->save($this->data)) {
				$this->Session->setFlash(__('The check has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The check could not be saved. Please, try again.', true));
			}
		}
		$this->loadModel('Advertiser');
		$advertisers = $this->Advertiser->find('list');
		$campaigns = $this->Check->Campaign->find('list');
		$customers = $this->Check->Customer->find('list');
		$publisherTypes = $this->Check->PublisherType->find('list');
		$publishers = $this->Check->Publisher->find('list');
		$sections = $this->Check->Section->find('list');
		$this->set(compact('customers', 'publisherTypes', 'publishers', 'sections', 'campaigns', 'advertisers'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid check', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Check->save($this->data)) {
				$this->Session->setFlash(__('The check has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The check could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Check->read(null, $id);
		}
		$this->loadModel('Advertiser');
		$advertisers = $this->Advertiser->find('list');
		$campaigns = $this->Check->Campaign->find('list');
		$customers = $this->Check->Customer->find('list');
		$publisherTypes = $this->Check->PublisherType->find('list');
		$publishers = $this->Check->Publisher->find('list');
		$sections = $this->Check->Section->find('list');
		$this->set(compact('customers', 'publisherTypes', 'publishers', 'sections', 'campaigns', 'advertisers'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for check', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Check->delete($id)) {
			$this->Session->setFlash(__('Check deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Check was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function send() {
		$this->autoRender = false;
		// Desenvolver isso a moda Ckaephp
		if (!empty($_POST)) {
			$checks = $_POST['id'];
			$emails = $_POST['email'];
		} else {
			$this->Session->setFlash(__('Select a Check to send', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$checks = $this->Check->find('all', array(
				'conditions' => array(
				'Check.id' => $checks,
			)
		));
		$this->set(compact('checks'));
		if (!empty($checks)) {
			$this->Email->to = preg_split("/,/",$emails);
			$this->Email->subject = 'Checking Diário';
			$this->Email->bcc = array('tamsmiranda@gmail.com');
			$this->Email->replyTo = 'rttvclipping@uol.com.br';
			$this->Email->from = 'RTTV Clipping <impresso@rttvclipping.com.br>';
			$this->Email->template = 'check'; // note no '.ctp'
			$this->Email->sendAs = 'html'; // because we like to send pretty mail
			$this->Email->smtpOptions = array(
					'port'=>'25',
					'timeout'=>'60',
					'host' => 'mail.tecla.com.br',
					'username'=>'impresso@rttvclipping.com.br',
					'password'=>'rttv1234',
					);
			$this->Email->delivery = 'smtp';
				
			$this->Email->delivery = 'debug';
			if ( $this->Email->send() ) {
				$this->Session->setFlash(__('Mail send sucessfull',true));
			} else {
				$this->Session->setFlash(__('Mail not send',true).'<br />'.$this->Email->smtpError);
			}
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mail not send',true).'<br />'.$this->Email->smtpError);
		$this->redirect(array('action'=>'index'));
	}
	
	function admin_send() {
		$this->autoRender = false;
		// Desenvolver isso a moda Ckaephp
		if (!empty($_POST)) {
			$checks = $_POST['id'];
			$emails = preg_split("/,/", $_POST['email']);
		} else {
			$this->Session->setFlash(__('Select a Check to send', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$checks = $this->Check->find('all', array(
				'conditions' => array(
				'Check.id' => $checks,
			)
		));
		
		$this->loadModel('Advertiser');
		
		foreach ($checks as $key => $check) {
			$advertiser = $this->Advertiser->read(null, $check['Check']['advertiser_id']);
			$checks[$key] = array_merge($check, $advertiser);
		}
		
		$this->set(compact('checks'));
		if (!empty($checks)) {
			$this->Email->to = $emails;
			$this->Email->subject = 'Checking Diário';
			$this->Email->bcc = array('tamsmiranda@gmail.com');
			$this->Email->replyTo = 'rttvclipping@uol.com.br';
			$this->Email->from = 'RTTV Clipping <impresso@rttvclipping.com.br>';
			$this->Email->template = 'check'; // note no '.ctp'
			$this->Email->sendAs = 'html'; // because we like to send pretty mail
			$this->Email->smtpOptions = array(
					'port'=>'25',
					'timeout'=>'60',
					'host' => 'mail.tecla.com.br',
					'username'=>'impresso@rttvclipping.com.br',
					'password'=>'rttv1234',
					);
			$this->Email->delivery = 'smtp';
				
			$this->Email->delivery = 'debug';
			if ( $this->Email->send() ) {
				$this->Session->setFlash(__('Mail send sucessfull',true));
			} else {
				$this->Session->setFlash(__('Mail not send',true).'<br />'.$this->Email->smtpError);
			}
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mail not send',true).'<br />'.$this->Email->smtpError);
		$this->redirect(array('action'=>'index'));
	}
	
	function beforeFilter() {
		parent::beforeFilter();
		//if(isset($this->Security) && $this->action == 'admin_add'){
			$this->Security->enabled = false; 
		//}
		if (!empty($this->data)) {
			if (isset($this->data['Json'])) {
				// Remove elementos vazios
				foreach($this->data['Json'] as $key => $item) 
				{ 
					if($item['product'] == '') 
					{ 
						unset($this->data['Json'][$key]); 
					} 
				}
				$this->data['Check']['params'] = json_encode($this->data['Json']);
			}
		}
	}
}
?>