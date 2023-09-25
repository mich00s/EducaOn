
<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

ob_start();

$route = new Router(url(), ":");

$route->namespace("Source\App");

$route->group(null);

$route->get("/", "Web:home");
$route->get("/sobre", "Web:about");

$route->get("/registro","Web:register");
$route->get("/login","Web:login");

$route->get("/localizacao","Web:location");
$route->get("/cursos","Web:course");
$route->get("/cursos/{category}","Web:course");
$route->get("/blog","Web:blog");
$route->get("/faq","Web:faq");
$route->get("/carrinho-compras","Web:chart");
$route->get("/servicos","Web:services");
$route->get("/contato","Web:contact");

$route->group("/app");
$route->get("/", "App:home");
$route->get("/perfil", "App:profile");
$route->group(null);

$route->group("/admin");
$route->get("/", "Adm:home");
$route->get("/professores", "Adm:teachers");
$route->group(null);

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();