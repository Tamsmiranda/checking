<?php
class ChecksController extends CheckingAppController {

	var $name = 'Checks';

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
		$this->set('checks', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid check', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('check', $this->Check->read(null, $id));
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
		$customers = $this->Check->Customer->find('list');
		$publisherTypes = $this->Check->PublisherType->find('list');
		$publishers = $this->Check->Publisher->find('list');
		$sections = $this->Check->Section->find('list');
		$this->set(compact('customers', 'publisherTypes', 'publishers', 'sections'));
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
		$customers = $this->Check->Customer->find('list');
		$publisherTypes = $this->Check->PublisherType->find('list');
		$publishers = $this->Check->Publisher->find('list');
		$sections = $this->Check->Section->find('list');
		$this->set(compact('customers', 'publisherTypes', 'publishers', 'sections'));
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
}
?>