<?php
class Router
{
    private array $routes;
    private PDO $pdo;

    public function __construct(array $routes, PDO $pdo)
    {
        $this->routes = $routes;
        $this->pdo = $pdo;
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = '/'.trim(parse_url($uri, PHP_URL_PATH), '/');

        foreach ($this->routes[$method] ?? [] as $route => $handler) {
            $params = $this->match($route, $path);
            if ($params !== null) {
                [$class, $action] = $handler;
                (new $class($this->pdo))->$action(...$params);
                return;
            }
        }

        http_response_code(404);
        echo 'Page not found';
        return;
    }

    private function match(string $route, string $path): ?array
    {
        $routeSegments = explode('/', trim($route, '/'));
        $pathSegments = explode('/', trim($path, '/'));

        if (count($routeSegments) !== count($pathSegments)) {
            return null;
        }

        $params = [];
        foreach ($routeSegments as $index => $routeSegment) {
            $pathSegment = $pathSegments[$index];
            if (preg_match('#^\{(\w+)\}$#', $routeSegment, $matches)) {
                $paramName = $matches[1];
                $params[$paramName] = $pathSegment;
            } 
            else if ($routeSegment !== $pathSegment) {
                return null;
            }
        }
        return $params;
    }
}

?>