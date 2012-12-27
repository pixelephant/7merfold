<?php

App::uses('AppController', 'Controller');

class ContentsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Contents';
	public $helpers = array('Html', 'Form');
	public $uses = array('Content');

	public function show(){
		$params = $this->request->params;
		$content = $this->Content->find('first', array('conditions' => array('Content.slug' => $params['pass'][0])));

		$breadcrumb = array($params['pass'][0] => $content['Content']['title']);
		$page_title = $content['Content']['title'];
		$page_keywords = $content['Content']['keywords'];

		$this->set('content', $content);
		$this->set('breadcrumb', $breadcrumb);
		$this->set('page_title', $page_title);
		$this->set('page_keywords', $page_keywords);

	}

	/* Admin */

	public function admin_index(){
		$this->paginate = array('limit' => 15);

		$contents = $this->paginate('Content');

		$this->set('name', 'Tartalom');
		$this->set('contents', $contents);
	}

	public function admin_new(){

		if(!empty($this->request->data['Content'])){
			if(isset($this->request->data['Content']['id'])){
				$this->Content->findById($this->request->data['Content']['id']);	
			}else{
				// $this->Content->create();
			}
			$c = $this->Content->save($this->request->data);
			$this->redirect('/admin/contents/edit/'.$c['Content']['id']);
		}
	}

	/* Szerkesztés */

	public function admin_edit(){
		$params = $this->request->params;

		$this->request->data = $this->Content->findById($params['pass'][0]);
	}

}

?>