<?php
    $routes = array(
		'httpstatus' => [
			'home' => '/',
			'login' => '/login/',
			'logout' => '/logout/',
			'add_url' => '/add_url/',
			'delete_url' => '/delete_url/{id}',
			'modify_url' => '/modify_url/{id}'
        ],
    );

    define('ROUTES', $routes);
