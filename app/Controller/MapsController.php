<?php

App::uses('AppController', 'Controller');

class MapsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Maps';
	public $helpers = array('Html', 'Form');
}