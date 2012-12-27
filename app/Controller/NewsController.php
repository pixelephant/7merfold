<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class NewsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'News';
	public $uses = array('News');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function show() {

		$params = $this->request->params;
		$news_slug = $params['news_slug'];
		$news = $this->News->find('first', array('conditions' => array('News.slug' => $news_slug)));

		$breadcrumb = array(('hirek/' . $news_slug) => $news['News']['title']);

		$this->set('news', $news);
		$this->set('breadcrumb', $breadcrumb);
		$this->set('page_title', $news['News']['page_title']);
		$this->set('page_keywords', $news['News']['keywords']);

		$this->render('show');
	}

	/* Admin */

	public function admin_index(){
		$this->paginate = array('limit' => 15);

		$news = $this->paginate('News');

		$this->set('name', 'Hírek');
		$this->set('news', $news);
	}

	public function admin_new(){

		if(!empty($this->request->data['News'])){
			if(isset($this->request->data['News']['id'])){
				$this->News->findById($this->request->data['News']['id']);
			}else{
				$this->News->create();
			}
			$c = $this->News->save($this->request->data);
			$this->redirect('/admin/news/edit/'.$c['News']['id']);
		}
	}

	/* Szerkesztés */

	public function admin_edit(){
		$params = $this->request->params;

		$this->request->data = $this->News->findById($params['pass'][0]);
		$this->set('news', $this->News->find('list'));
	}

}
