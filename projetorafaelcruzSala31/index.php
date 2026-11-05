<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$controllerParam = $_GET['controller'] ?? 'login';
$actionParam     = $_GET['action']     ?? 'index';

$controllerBase = ucfrist(strtolower($controllerParam));

$controllerName = $controllerBase . 'Controller';
$controllerFile = __DIR__ . '/app/controllers/' .
$controllerName . '.php';

if (file_existis($controllerFile)) {
    require_once $controllerFile;

    if (class_exists($controllerName)) {
        $controllerInstance = new $controllerName();
        if (method_exists($controllerInstance, $actionParam)) {
            $controllerInstance->$actionParam();
        } else {
            die("Error: A ação '{actionParam}' não existe no controlador {controllerName}.");
        }
    } else {
        die("Error: O arquivo existe, mas a classe dentro dele precisa se chamar exatamente: <strong>{$controllerName}</strong>");
    }
} else {
    die("Error: O arquivo do controlador não foi encontrado em: {$controllerFile}");
}
