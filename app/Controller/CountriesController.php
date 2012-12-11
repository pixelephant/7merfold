<?php

App::uses('AppController', 'Controller');

class CountriesController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Countries';
	public $helpers = array('Html', 'Form');
}