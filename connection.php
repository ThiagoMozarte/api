<?php

require_once 'config.php';
$pdo = new PDO("mysql:dbname=" . DATABASE['name'] . ";host=" . DATABASE['host'], DATABASE['user'], DATABASE['pass']);