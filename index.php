<?php
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

require "vendor/autoload.php";

$app = new App();
$app->get("/", function (Request $req, Response $res): Response {
    return $res->withJson([
        "message" => "Hello World!"
    ]);
});
$app->get(
    '/users/{username}',
    function(Request $req, Response $res, array $args): Response {
        return $res->withJson([
        'message' => 'Hello ' . $args['username']
        ]);
    }
);
$app->run();





