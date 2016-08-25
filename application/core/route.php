<?php
class Route
{
	static function start()
	{
		// default controller and action
		$controller_name = 'Main';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// get controller name
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// get action name
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		// add prefix
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// load the file with model class (can not to exist)

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// load file with controller class
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			/*
			it would be better to make an exception here
                        but let's redirect to error page for simplification
			*/
			Route::ErrorPage404();
		}
		
		// create controller
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			$controller->$action();
		}
		else
		{
			Route::ErrorPage404();
		}
	
	}
	
	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}


