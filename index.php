<?php
require_once('database.php');

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

$app->post('/php-api/v1/book', function(Request $req, Response $res): Response {
    $body = $req->getParsedBody();
    return $res->withJson([
        'message' => 'persistiendo book ' . $body['Title']
    ]);
});

    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);
            
            echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }

$app->run();





