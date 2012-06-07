<?php
class AdvertisersController extends CheckingAppController {

	var $name = 'Advertisers';

	function index() {
		$this->Advertiser->recursive = 0;
		$this->set('advertisers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid advertiser', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('advertiser', $this->Advertiser->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Advertiser->create();
			if ($this->Advertiser->save($this->data)) {
				$this->Session->setFlash(__('The advertiser has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advertiser could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid advertiser', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Advertiser->save($this->data)) {
				$this->Session->setFlash(__('The advertiser has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advertiser could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Advertiser->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for advertiser', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Advertiser->delete($id)) {
			$this->Session->setFlash(__('Advertiser deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Advertiser was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Advertiser->recursive = 0;
		$this->set('advertisers', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid advertiser', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('advertiser', $this->Advertiser->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Advertiser->create();
			if ($this->Advertiser->save($this->data)) {
				$this->Session->setFlash(__('The advertiser has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advertiser could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid advertiser', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Advertiser->save($this->data)) {
				$this->Session->setFlash(__('The advertiser has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advertiser could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Advertiser->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for advertiser', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Advertiser->delete($id)) {
			$this->Session->setFlash(__('Advertiser deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Advertiser was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>