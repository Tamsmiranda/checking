<?php
class CustomersController extends ClippingAppController {

	var $name = 'Customers';

	function admin_index() {
		$this->Customer->recursive = 0;
		$this->set('customers', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid customer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('customer', $this->Customer->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->data['User']['name'] = $this->data['Customer']['name'];
			$this->Customer->create();
			if ($this->Customer->saveAll($this->data)) {
				$this->Session->setFlash(__('The customer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Customer->User->find('list');
		$roles = $this->Customer->User->Role->find('list');
		$this->set(compact('users','roles'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid customer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['User']['name'] = $this->data['Customer']['name'];
			if ($this->Customer->saveAll($this->data)) {
				$this->Session->setFlash(__('The customer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Customer->read(null, $id);
		}
		$users = $this->Customer->User->find('list');
		$roles = $this->Customer->User->Role->find('list');
		$this->set(compact('users','roles'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for customer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Customer->delete($id)) {
			$this->Session->setFlash(__('Customer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Customer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function set_logo() {
		return $this->Customer->find('first',array('conditions'=>array('Customer.user_id'=>$this->Session->read('Auth.User.id'))));
	}
}
?>