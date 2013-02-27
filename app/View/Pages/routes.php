<?php
	//file:app/config/routes.php
	 Router::connect('/', array('controller' => 'users', 'action' => 'home'));
	/**
	 * ...and connect the rest of 'Pages' controller's urls.
	 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
?>