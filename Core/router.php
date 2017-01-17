<?php 


class Router {

	protected $routes = [];
	protected $params = [];

	public function add($route, $params=[]) {
		// Escape forward slashes
		$route = preg_replace('/\//' , '\\/', $route);

		// Convert variables e.g. {controller}
		$route = preg_replace('/\{([a-z]+)\}/' , '(?P<\1>[a-z-]+)', $route);

		// Convert variables with custom regexp { like id: \d+}
		$route = preg_replace('/\{([a-z]+):([^\}]+)\}/' , '(?P<\1>\2)', $route);

		// Add start and end delimiters
		$route = '/^' . $route . '$/';
		$this->routes[$route] = $params;
	}

	public function getRoutes() {
		return $this->routes;
	}

	public function match($url, $in_params=[]) {
		foreach($this->routes as $route=>$value) {
			if ( preg_match($route, $url, $matches)) {
				$params = [];
				foreach($matches as $k => $match){
					if(is_string($k)) {
						$params[$k] = $match;
					}
				}
				$this->params = $params;
				return true;
			}
		}
		return false;
	}

	public function getParams() {
		return $this->params;
	}


	public function dispatch($url) {

		if ( $this->match($url)) {
			$controller = $this->params['controller'];
			$controller = $this->convertToStudlyCaps($controller);

			if( class_exists($controller)) {
				$controller_object = new $controller;
				$action = $this->action['action'];
				$action = $this->convertToCamelCase($action);
				if( is_callable([$controller_object , $action])) {
					$controller_object->$action();
				} else {
				echo "Method $action ( in controller $controller not found";
				} 
			} else {
				echo "Controller class $controller not found";
			}
		} else {
			echo "The URL $url does not match";
		}

	}

	protected function convertToStudlyCaps($string){
		return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
	}

	protected function convertToCamelCase($string){
		return lcfirst($this->convertToStudlyCaps($string));
	}

?>