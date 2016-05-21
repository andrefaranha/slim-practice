<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
spl_autoload_register(function ($classname) {
  require ("../classes/" . $classname . ".php");
});


$config['displayErrorDetails'] = true;
$config['db']['host'] = 'localhost';
$config['db']['user'] = 'root';
$config['db']['pass'] = 'admin';
$config['db']['dbname'] = 'slim_practice';


$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();

$container['view'] = new \Slim\Views\PhpRenderer("../templates/");

$container['db'] = function ($c) {
  $db = $c['settings']['db'];
  $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'], $db['user'], $db['pass']);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  return $pdo;
};

$app->get('/', function (Request $request, Response $response) {

  return $this->view->render($response, "index.phtml");
})->setName("home");

$app->get('/users', function (Request $request, Response $response) {
  $mapper = new UserMapper($this->db);
  $users = $mapper->getUsers();

  return $this->view->render($response, "users.phtml", ["users" => $users, "router" => $this->router]);
});

$app->get('/user/{username}', function (Request $request, Response $response, $args) {
  $username = $args['username'];
  $mapper = new UserMapper($this->db);
  $user = $mapper->getUserByUsername($username);
  $restaurants = $mapper->getUserRestaurants($username);

  return $this->view->render($response, "userdetail.phtml", ["user" => $user, "restaurants" => $restaurants, "router" => $this->router]);
})->setName("user-detail");

$app->get('/restaurants', function (Request $request, Response $response) {
  $mapper = new RestaurantMapper($this->db);
  $restaurants = $mapper->getRestaurants();

  return $this->view->render($response, "restaurants.phtml", ["restaurants" => $restaurants, "router" => $this->router]);
});

$app->get('/restaurant/{id}', function (Request $request, Response $response, $args) {
  $restaurent_id = (int) $args['id'];
  $mapper = new RestaurantMapper($this->db);
  $restaurant = $mapper->getRestaurantById($restaurent_id);
  $users = $mapper->getRestaurantUsers($restaurent_id);

  return $this->view->render($response, "restaurantdetails.phtml", ["restaurant" => $restaurant, "users" => $users, "router" => $this->router]);
})->setName("restaurant-detail");

$app->run();
