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
 * Admin routes
 */
	Router::redirect('/admin', '/admin/trips/1');	
	// Router::connect('/admin', array('controller' => 'admins', 'action' => 'index', 'admin' => true));

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */

	Router::connect('/cegeknek', array('controller' => 'contents', 'action' => 'show', 'cegeknek'));
	Router::connect('/szolgaltatasok', array('controller' => 'contents', 'action' => 'show', 'szolgaltatasok'));
	Router::connect('/ajandekutalvany', array('controller' => 'contents', 'action' => 'show', 'ajandekutalvany'));
	Router::connect('/utazasi-feltetelek', array('controller' => 'contents', 'action' => 'show', 'utazasi-feltetelek'));
	Router::connect('/allasajanlatok', array('controller' => 'contents', 'action' => 'show', 'allasajanlatok'));
	Router::connect('/biztositas', array('controller' => 'contents', 'action' => 'show', 'biztositas'));

	Router::connect('/orszag/:country_slug', array('controller' => 'countries', 'action' => 'show'));
	Router::connect('/regio/:region_slug', array('controller' => 'regions', 'action' => 'show'));
	Router::connect('/kontinens/:continent_slug', array('controller' => 'continents', 'action' => 'show'));

	Router::connect('/menu/get_menu', array('controller' => 'home', 'action' => 'get_menu'));
	Router::connect('/menu/get_contacts', array('controller' => 'home', 'action' => 'get_contacts'));
	Router::connect('/menu/get_sub_menu/:category_slug', array('controller' => 'home', 'action' => 'get_sub_menu'));
	Router::connect('/region/get_trips/:region_id/:category_id', array('controller' => 'home', 'action' => 'get_trips'));
	Router::connect('/visa_info/:country_id', array('controller' => 'trips', 'action' => 'visa_info'));
	Router::connect('/country_info/:country_id', array('controller' => 'trips', 'action' => 'country_info'));
	Router::connect('/region_info/:region_id', array('controller' => 'trips', 'action' => 'region_info'));
	Router::connect('/regions/:country_id', array('controller' => 'home', 'action' => 'country_regions'));
	Router::connect('/countries/:continent_id', array('controller' => 'home', 'action' => 'continent_countries'));

	// Router::connect('/korutazasok', array('controller' => 'categories', 'action' => 'inner', '2'));
	Router::connect('/nyaralasok-uveghegyen-innen', array('controller' => 'categories', 'action' => 'inner', '4'));
	Router::connect('/nyaralasok-uveghegyen-tul', array('controller' => 'categories', 'action' => 'inner', '3'));
	Router::connect('/felfedezoutak', array('controller' => 'categories', 'action' => 'inner', '5'));

	// Router::connect('/korutazasok/:country_slug', array('controller' => 'categories', 'action' => 'show', 'korutazasok'));
	Router::connect('/nyaralasok-uveghegyen-innen/:country_slug', array('controller' => 'categories', 'action' => 'show', 'nyaralasok-uveghegyen-innen'));
	Router::connect('/nyaralasok-uveghegyen-tul/:country_slug', array('controller' => 'categories', 'action' => 'show', 'nyaralasok-uveghegyen-tul'));
	Router::connect('/felfedezoutak/:continent_slug', array('controller' => 'categories', 'action' => 'show', 'felfedezoutak'));

	Router::connect('/utjaink/:trip_slug', array('controller' => 'trips', 'action' => 'show'));
	Router::connect('/hirek/:news_slug', array('controller' => 'news', 'action' => 'show'));

	Router::connect('/kereses', array('controller' => 'home', 'action' => 'search'));

	Router::connect('/list', array('controller' => 'trips', 'action' => 'index'));
	Router::connect('/round', array('controller' => 'trips', 'action' => 'show'));
	Router::connect('/ajanlat', array('controller' => 'home', 'action' => 'quote'));
	Router::connect('/ajanlat/email', array('controller' => 'home', 'action' => 'quote_email'));
	Router::connect('/static_page', array('controller' => 'home', 'action' => 'static_page'));

	Router::connect('/:category_slug', array('controller' => 'categories', 'action' => 'show'));

	Router::redirect('*', '/');	
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
