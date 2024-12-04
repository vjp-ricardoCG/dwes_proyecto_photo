<?php

require_once 'core/App.class.php';
require 'entities/Request.class.php';
require 'entities/Router.class.php';
require 'exceptions/NotFoundException.class.php';

$config = require_once 'app/config.php';
    App::bind('config',$config);

