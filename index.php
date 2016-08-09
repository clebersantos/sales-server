<?php

// if (PHP_SAPI == 'cli-server') {
//     // To help the built-in PHP dev server, check if the request was actually for
//     // something which should probably be served as a static file
//     $url  = parse_url($_SERVER['REQUEST_URI']);
//     $file = __DIR__ . $url['path'];
//     if (is_file($file)) {
//         return false;
//     }
// }
session_start();

require 'vendor/autoload.php';
require 'config.php';
require 'DB.php';



// require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
  $app = new \Slim\Slim(array(
 'debug' => false
 ));


// Instantiate the app
// $settings = require __DIR__ . '/../src/settings.php';
// $app = new \Slim\App($settings);

 // $app = new \Slim\App(array(
 // 'debug' => false
 // ));
// $app = new \Slim\App();


  // var_dump(  $app);
// Instantiate the app
// $settings = require __DIR__ . '/../src/settings.php';
// $app = new \Slim\App($settings);

// Set up dependencies
// require __DIR__ . '/../src/dependencies.php';

// Register middleware
// require __DIR__ . '/../src/middleware.php';

// Register routes
//require __DIR__ . '/../src/routes.php';


$app->contentType("application/json");

$app->error(function ( Exception $e = null ) use ($app) {

	echo '{"error":{"text:"' . $e->getMessage() .'}}'; 
	});

function formatJson($obj)
{
	echo json_encode($obj);
}

// // includes
include("customer.php");
include("employee.php");

$app->run();