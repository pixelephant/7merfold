<?php

App::uses('AppController', 'Controller');

class ContactsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Contacts';
	public $helpers = array('Html', 'Form');
	public $uses = array('Contact');

	/* Admin */

	public function admin_index(){

		$contacts = $this->Contact->find('all');

		$this->set('name', 'Elérhetőségek');
		$this->set('contacts', $contacts);
	}

	public function admin_new(){

		if(!empty($this->request->data['Contact'])){
			if(isset($this->request->data['Contact']['id'])){
				$this->Contact->findById($this->request->data['Contact']['id']);	
			}else{
				// $this->Contact->create();
			}
			$c = $this->Contact->save($this->request->data);
			$this->redirect('/admin/contacts/edit/'.$c['Contact']['id']);
		}
	}

	/* Szerkesztés */

	public function admin_edit(){
		$params = $this->request->params;

		$this->request->data = $this->Contact->findById($params['pass'][0]);
	}

}

?>