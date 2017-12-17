<?php

require_once("vendor/autoload.php");

use Slim\App;
use Jnwebsi\Page;
use Jnwebsi\PageAdmin;

$app = new Slim\App();

$app->get('/', function () {

	$page = new Page();

	$page->setTpl("index");

}); // ROTA INDEX

$app->get('/admin', function () {

	$page = new PageAdmin();

	$page->setTpl("index");

}); // ROTA ADMIN

$app->run();