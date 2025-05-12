<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../models/musics.php';

// Crear aplicació Slim
$app = AppFactory::create();

// Inicialitzar la base de dades
$dbPath = __DIR__ . '/../bd/musicians.db';
try {
    $db = new SQLite3($dbPath, SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);
} catch (Exception $e) {
    die("Error en la connexió a la base de dades: " . $e->getMessage());
}

// Crear el model
$musicsModel = new Musics($db);

// Ruta principal "/"
$app->get('/', function (Request $request, Response $response) use ($musicsModel) {
    $musics = $musicsModel->getAllMusics();

    // Carregar la vista
    ob_start();
    include __DIR__ . '/../view/biografia.php';
    $html = ob_get_clean();

    $response->getBody()->write($html);
    return $response->withHeader('Content-Type', 'text/html');
});

// Executar l'aplicació
$app->run();
