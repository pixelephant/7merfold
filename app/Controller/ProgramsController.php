<?php

App::uses('AppController', 'Controller');

class ProgramsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Programs';
	public $helpers = array('Html', 'Form');
}