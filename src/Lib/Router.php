<?php

namespace Shubham\Worldcup\Lib;
class Router {
    private $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function get($path, $action) {
        $this->routes['GET'][$path] = $action;
    }

    public function post($path, $action) {
        $this->routes['POST'][$path] = $action;
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uriWithoutQuery = strtok($_SERVER['REQUEST_URI'], '?');
        $uri = '/' . trim($uriWithoutQuery, '/');

        foreach ($this->routes[$method] as $route => $action) {
            $routePattern = "#^" . preg_replace('/{([\w]+)}/', '([\w%()-]+)', $route) . "$#";
            if (preg_match($routePattern, $uri, $matches)) {
                array_shift($matches);  // remove the entire match from the beginning of the results
                $this->executeAction($action, $matches);
                return;
            }
        }

        // Handle not found
        echo "404 Not Found";
    }

    private function executeAction($action, array $params = []) {
        if (is_callable($action)) {
            // It's a callback function
            call_user_func_array($action, $params);
        } elseif (is_string($action)) {
            // It's a controller@method string
            list($controllerName, $methodName) = explode('@', $action);
            $controller = new $controllerName;
            call_user_func_array([$controller, $methodName], $params);
        }
    }
}