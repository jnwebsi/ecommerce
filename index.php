<?php
session_start();
require_once("vendor/autoload.php");

use Slim\App;
use Jnwebsi\Page;
use Jnwebsi\PageAdmin;
use Jnwebsi\Model\User;

$app = new Slim\App();

// $app->config('debug', true);

$app->get('/', function() {

	$page = new Page();

	$page->setTpl("index");

}); // ROTA INDEX

$app->get('/admin', function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index");

}); // ROTA ADMIN

$app->get('/admin/login', function() {

	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);

	$page->setTpl("login");

}); // ROTA LOGIN

$app->post('/admin/login', function() {

	User::login($_POST["login"], $_POST["password"]);

	header("Location: /admin");
	exit;
});

$app->get('/admin/logout', function() {
	User::logout();
	header("Location: /admin/login");
	exit;
});

$app->run();