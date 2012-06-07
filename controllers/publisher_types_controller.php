<?php
class PublisherTypesController extends ClippingAppController {

	var $name = 'PublisherTypes';

	function admin_index() {
		$this->PublisherType->recursive = 0;
		$this->set('publisherTypes', $this->paginate());
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->PublisherType->create();
			if ($this->PublisherType->save($this->data)) {
				$this->Session->setFlash(__('The publisher type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The publisher type could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid publisher type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PublisherType->save($this->data)) {
				$this->Session->setFlash(__('The publisher type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The publisher type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PublisherType->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for publisher type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PublisherType->delete($id)) {
			$this->Session->setFlash(__('Publisher type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Publisher type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>