<?php

//Faz a permissão do acesso da API por servidores / locais externos
header('Access-Control-Allow-Origin: *');
//Libera os métodos os quais podem acessar a API
header('Access-Control-Allow-Methods: GET, POST,PUT,DELETE, OPTIONS');
//Define que o conteúdo retornado será um json.
header('Content-type: application/json');

const DATABASE = [
    'host' => 'localhost',
    'name' => 'api',
    'user' => 'root',
    'pass' => 'abc123'
];

$response = [
    'error' => '',
    'result' => [],
];