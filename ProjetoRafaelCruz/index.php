<?php
/**
 * Front controller (ponto de entrada único do sistema).
 * Todas as páginas passam por aqui: index.php?controller=...&action=...
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// A sessão é iniciada aqui para que o cabeçalho saiba se há usuário logado
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Funções auxiliares usadas nas views (e(), preco())
require_once __DIR__ . '/app/helpers.php';

// Captura os parâmetros da URL. A página inicial agora é a vitrine (home)
$controllerParam = $_GET['controller'] ?? 'home';
$actionParam     = $_GET['action']     ?? 'index';

// Só aceita letras no nome do controller (evita caminhos como ../)
if (!preg_match('/^[a-zA-Z]+$/', $controllerParam)) {
    die("Erro: controlador inválido.");
}

// Força a primeira letra para maiúscula (ex: usuario -> Usuario)
$controllerBase = ucfirst(strtolower($controllerParam));

// Monta o nome da classe e o caminho do arquivo
$controllerName = $controllerBase . 'Controller';
$controllerFile = __DIR__ . '/app/controllers/' . $controllerName . '.php';

// Verifica se o arquivo físico realmente existe na pasta
if (file_exists($controllerFile)) {

    // Inclui o arquivo explicitamente para o PHP conhecer a classe
    require_once $controllerFile;

    // Verifica se a classe agora existe na memória do PHP
    if (class_exists($controllerName)) {
        $controllerInstance = new $controllerName();

        // Métodos mágicos (__construct etc.) não podem ser chamados pela URL
        $acaoValida = strpos($actionParam, '__') !== 0
            && is_callable([$controllerInstance, $actionParam]);

        if ($acaoValida) {
            $controllerInstance->$actionParam();
        } else {
            die("Erro: A ação '" . htmlspecialchars($actionParam) . "' não existe no controlador {$controllerName}.");
        }
    } else {
        die("Erro: O arquivo existe, mas a classe dentro dele precisa se chamar exatamente: <strong>{$controllerName}</strong>");
    }
} else {
    die("Erro: O arquivo do controlador não foi encontrado em: " . htmlspecialchars($controllerFile));
}
