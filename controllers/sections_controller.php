<?php
class SectionsController extends ClippingAppController {

	var $name = 'Sections';
	/*function admin_index() {
		$this->Section->recursive = 0;
        $createdBies = $this->Section->CreatedBy->find('list');
		$modifiedBies = $this->Section->ModifiedBy->find('list');
        $this->set(compact('createdBies', 'modifiedBies'));
		$this->set('sections', $this->paginate());
	}*/
    
    function admin_index( $publisher = null ) {
        $this->Section->recursive = 0;
        $conditions = empty($publisher) ? array() : array('Section.publisher_id'=>$publisher);
        if ( $this->RequestHandler->isAjax() ) {
            $this->layout = 'ajax';
            $sections = $this->Section->find('all',array('conditions'=>$conditions,'order' => array('Section.name ASC')));
            $this->set(compact('sections'));
            $this->render('ajax_admin_index');
        } else {
            $createdBies = $this->Section->CreatedBy->find('list');
            $modifiedBies = $this->Section->ModifiedBy->find('list');
            $this->set(compact('createdBies', 'modifiedBies'));
            $this->set('sections', $this->paginate($conditions));
        }
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Section->create();
			if ($this->Section->save($this->data)) {
				$this->Session->setFlash(__('The section has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The section could not be saved. Please, try again.', true));
			}
		}
		$publishers = $this->Section->Publisher->find('list');
		$this->set(compact('publishers'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid section', true));
			$this->redirect(array('action' => 'index'));
		}
		/*if (!empty($this->data)) {
			if ($this->Section->save($this->data)) {
				$this->Session->setFlash(__('The section has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The section could not be saved. Please, try again.', true));
			}
		}*/
		if (!empty($this->data)) {
			echo "<pre>";
			//print_r($this->data);//exit;
			if ($this->data['Mode']['copy']) {
				unset($this->data['Section']['id']);
				$this->Section->create();
			}
			//print_r($this->data);exit;
			if ($this->Section->save($this->data)) {
				if ($this->data['Mode']['copy']) {
					$id = $this->Section->getInsertID();
				}
				$this->Session->setFlash(__('The section has been saved', true));
				$this->redirect(array('action' => 'index'/*, $id*/));
			} else {
				$this->Session->setFlash(__('The clipp could not be saved. Please, try again.', true));
			}
		}
		$copy = false;
		if (!empty($this->params['named'])) {
			if (isset($this->params['named']['copy'])) {
				$copy = true;
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Section->read(null, $id);
		}
		$publishers = $this->Section->Publisher->find('list');
		$this->set(compact('publishers','copy'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for section', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Section->delete($id)) {
			$this->Session->setFlash(__('Section deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Section was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
