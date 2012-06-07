<?php
class PublishersController extends ClippingAppController {

	var $name = 'Publishers';

	function admin_index( $type = null ) {
        $this->Publisher->recursive = 0;
        $conditions = empty($type) ? array() : array('Publisher.publisher_type_id'=>$type);
        if ( $this->RequestHandler->isAjax() ) {
            $this->layout = 'ajax';
            $publishers = $this->Publisher->find('all',array('conditions'=>$conditions, 'order' => array('Publisher.name ASC')));
            $this->set(compact('publishers'));
            $this->render('ajax_admin_index');
        } else {
            $createdBies = $this->Publisher->CreatedBy->find('list');
            $modifiedBies = $this->Publisher->ModifiedBy->find('list');
            $this->set(compact('createdBies', 'modifiedBies'));
            $this->set('publishers', $this->paginate($conditions));
        }
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Publisher->create();
			if ($this->Publisher->save($this->data)) {
				$this->Session->setFlash(__('The publisher has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The publisher could not be saved. Please, try again.', true));
			}
		}
		$publisherTypes = $this->Publisher->PublisherType->find('list');
		$createdBies = $this->Publisher->CreatedBy->find('list');
		$modifiedBies = $this->Publisher->ModifiedBy->find('list');
		$sections = $this->Publisher->Section->find('list');
		$this->set(compact('publisherTypes', 'createdBies', 'modifiedBies', 'sections'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid publisher', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Publisher->save($this->data)) {
				$this->Session->setFlash(__('The publisher has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The publisher could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Publisher->read(null, $id);
		}
		$publisherTypes = $this->Publisher->PublisherType->find('list');
		$createdBies = $this->Publisher->CreatedBy->find('list');
		$modifiedBies = $this->Publisher->ModifiedBy->find('list');
		$sections = $this->Publisher->Section->find('list');
		$this->set(compact('publisherTypes', 'createdBies', 'modifiedBies', 'sections'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for publisher', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Publisher->delete($id)) {
			$this->Session->setFlash(__('Publisher deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Publisher was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>