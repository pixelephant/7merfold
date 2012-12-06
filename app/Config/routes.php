<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'home', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */

	Router::connect('/cegeknek', array('controller' => 'home', 'action' => 'static_page'));
	Router::connect('/szolgaltatasok', array('controller' => 'home', 'action' => 'static_page'));

	Router::connect('/menu/get_menu', array('controller' => 'home', 'action' => 'get_menu'));
	Router::connect('/region/get_trips/:region_id/:category_id', array('controller' => 'home', 'action' => 'get_trips'));
	Router::connect('/visa_info/:country_id', array('controller' => 'trips', 'action' => 'visa_info'));
	Router::connect('/country_info/:country_id', array('controller' => 'trips', 'action' => 'country_info'));

	Router::connect('/nyaralasok-uveghegyen-innen', array('controller' => 'categories', 'action' => 'inner', '4'));
	Router::connect('/nyaralasok-uveghegyen-tul', array('controller' => 'categories', 'action' => 'inner', '3'));

	Router::connect('/nyaralasok-uveghegyen-innen/:country_id', array('controller' => 'categories', 'action' => 'show', 'nyaralasok-uveghegyen-innen'));
	Router::connect('/nyaralasok-uveghegyen-tul/:country_id', array('controller' => 'categories', 'action' => 'show', 'nyaralasok-uveghegyen-tul'));

	Router::connect('/utjaink/:trip_id', array('controller' => 'trips', 'action' => 'show'));
	Router::connect('/hirek/:news_id', array('controller' => 'news', 'action' => 'show'));

	Router::connect('/kereses', array('controller' => 'home', 'action' => 'search'));

	Router::connect('/list', array('controller' => 'trips', 'action' => 'index'));
	Router::connect('/round', array('controller' => 'trips', 'action' => 'show'));
	Router::connect('/ajanlat', array('controller' => 'home', 'action' => 'quote'));
	Router::connect('/ajanlat/email', array('controller' => 'home', 'action' => 'quote_email'));
	Router::connect('/static_page', array('controller' => 'home', 'action' => 'static_page'));

	Router::connect('/:category_slug', array('controller' => 'categories', 'action' => 'show'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
