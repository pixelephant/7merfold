<?php

App::uses('AppController', 'Controller');

class RegionsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Regions';
	public $helpers = array('Html', 'Form');
}