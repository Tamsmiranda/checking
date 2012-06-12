<?php
class ChecksController extends CheckingAppController {

	var $name = 'Checks';
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
		$this->loadModel('Advertiser');
		$advertisers = $this->Advertiser->find('list');
		$campaigns = $this->Check->Campaign->find('list');
		$customers = $this->Check->Customer->find('list');
		$publisherTypes = $this->Check->PublisherType->find('list');
		$publishers = $this->Check->Publisher->find('list');
		$sections = $this->Check->Section->find('list');
		$checks = $this->paginate();
		$this->set(compact('checks', 'customers', 'publisherTypes', 'publishers', 'sections', 'campaigns', 'advertisers'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid check', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->loadModel('Advertiser');
		$this->autoRender = false;
		$this->layout = 'ajax';
		$this->Check->recursive = 0;
		$check = $this->Check->read(null, $id);
		$advertiser = $this->Advertiser->read(null, $check['Check']['advertiser_id']);
		$check = array_merge($check, $advertiser);
		$this->set('check',$check);
		$this->render('excel');
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
	
	function beforeFilter() {
		parent::beforeFilter();
		if(isset($this->Security) && $this->action == 'admin_add'){
			$this->Security->enabled = false; 
		}
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