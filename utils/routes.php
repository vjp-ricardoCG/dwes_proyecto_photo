<?php

require_once 'entities/Router.class.php';

$router->get('','controller/index.php');
$router->get('about','controller/about.php');
$router->get('blog','controller/blog.php');
$router->get('contact','controller/contact.php');
$router->get('galeria','controller/galeria.php');
$router->get('asociados','controller/asociados.php');
$router->get('post','controller/single_post.php');

 