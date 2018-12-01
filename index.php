<?php
require_once('database.php');

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

require "vendor/autoload.php";

$app = new App();

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});
    
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
        ->withHeader('Access-Control-Allow-Origin', 'http://mysite')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->get("/php-api", function (Request $req, Response $res): Response {
    
    return $res->withJson([
        "message" => "Hello World!"
    ]);
});

$app->get('/php-api/v1', function(Request $req, Response $res, array $args): Response {
       $db = new DB('127.0.0.1', 'mariophp', 'admin', 'test');
       $myArray = array();
       if ($result = $db->query("SHOW TABLES")) {
           while($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $myArray[] = $row;
           }
       }
       return $res->withJson([
           'message' => json_encode($myArray)
        ]);
    }
);

$app->get('/php-api/v1/book', function(Request $req, Response $res, array $args): Response {
    $db = new DB('127.0.0.1', 'mariophp', 'admin', 'test');
        $myArray = array();
        if ($result = $db->query("SELECT * FROM books")) {
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $myArray[] = $row;
            }
        }
        return $res->withJson([
            'message' => json_encode($myArray)
        ]);
    }
);

$app->post('/php-api/v1/book', function(Request $req, Response $res): Response {
    $body = $req->getParsedBody();
    return $res->withJson([
        'message' => 'persistiendo book ' . $body['Title']
    ]);
});

// Catch-all route to serve a 404 Not Found page if none of the routes match
// NOTE: make sure this route is defined last
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
    return $handler($req, $res);
});

$app->run();





