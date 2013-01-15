<?php

App::uses('AppController', 'Controller');

class ContentsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Contents';
	public $helpers = array('Html', 'Form');
	public $uses = array('Content', 'Trip', 'Country', 'Region');

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

		/* jav */
		// $trips = $this->Trip->find('all');
		// foreach($trips as $trip){
		// 	$this->Trip->read(null, $trip['Trip']['id']);
		// 	$this->Trip->set('slug', $this->slugify($trip['Trip']['name']));
		// 	$this->Trip->save();
		// }

		// $countries = $this->Country->find('all');
		// foreach($countries as $country){
		// 	$this->Country->read(null, $country['Country']['id']);
		// 	$this->Country->set('slug', $this->slugify($country['Country']['name']));
		// 	$this->Country->save();
		// }	  

		// $regions = $this->Region->find('all');
		// foreach($regions as $region){
		// 	$this->Region->read(null, $region['Region']['id']);
		// 	$this->Region->set('slug', $this->slugify($region['Region']['name']));
		// 	$this->Region->save();
		// }
		/* jav */

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

	static public function slugify($text){ 

		// lowercase
	  $text = strtolower($text);

	  // replace accent characters
		$accent = array("á","é","í","ó","ö","ő","ü","ű","ú");
		$non_accent = array("a","e","i","o","o","o","u","u","u");
		$text = str_replace($accent, $non_accent, $text);

	  // replace non letter or digits by -
	  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

	  // trim
	  $text = trim($text, '-');

	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);	  

	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);

	  if (empty($text))
	  {
	    return 'n-a';
	  }
	  return strtolower($text);
	}

}

?>