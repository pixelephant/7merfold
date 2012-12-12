<?php

App::uses('AppController', 'Controller');

class SightsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Sights';
	public $helpers = array('Html', 'Form');
}