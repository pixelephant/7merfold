<?php

App::uses('AppController', 'Controller');

class HotelsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Hotels';
	public $helpers = array('Html', 'Form');
}