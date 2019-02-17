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
        'api' => [
			'api' => '/api/',
			'list' => '/api/list/',
			'add' => '/api/add/',
			'status' => '/api/status/{id}/',
			'delete' => '/api/delete/{id}/',
			'history' => '/api/history/{id}'
        ],
    );

    define('ROUTES', $routes);
