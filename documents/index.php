<?php
$url = isset($_GET['url']) ? $_GET['url'] : 'home/index';

require_once('config/config.php');
require_once(ROOT . DS . 'core' . DS . 'bootstrap.php');
