<?php
class Route
{
	static function start()
	{
		//$pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASSWORD);
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		$parameters=null;
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}
		//получаем параметры
		if ( !empty($routes[3]) )
		{
			$parameters = $routes[3];
		}
		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			SELF::ErrorPage404();
			return;
		
		}
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action($parameters);
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			SELF::ErrorPage404();
		}
	
	}
	
	static function ErrorPage404()
	{
		echo "<img src='/images/404.jpg' alt='Страница не найдена'>";
    }
}
