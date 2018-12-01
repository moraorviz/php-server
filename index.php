<?php
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

require "vendor/autoload.php";

$app = new App();

$app->get("/php-api", function (Request $req, Response $res): Response {
    return $res->withJson([
        "message" => "Hello World!"
    ]);
});

$app->get(
    '/php-api/v1',
    function(Request $req, Response $res, array $args): Response {
        return $res->withJson([
        'message' => 'Aqui iria ' . 'la lista de entidades '
        ]);
    }
);

$app->post('/php-api/v1/book', function(Request $req, Response $res): Response {
    $body = $req->getParsedBody();
    return $res->withJson([
        'message' => 'creando book ' . $body['Title']
    ]);
});

$app->run();





