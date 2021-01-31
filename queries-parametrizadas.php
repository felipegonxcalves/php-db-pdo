<?php

$conexao = new PDO('mysql:host=127.0.0.1;dbname=gie_test_desenv', 'root', 'jxn9sid4');

// EXECUTANDO QUERIES PARAMETRIZADAS

$id = 3;
$query = $conexao->prepare("SELECT * FROM users WHERE id = ?");

$query->bindValue(1, $id, PDO::PARAM_INT); // índice do parâmetro, valor, tipo de dado
$query->execute(); // Executa a query com os parâmetros que definimos
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $linha) {
    echo "<pre>";
    var_dump($linha);
    echo "</pre>";
}


// PARÂMETROS NOMEADOS ETIPOS DE BIND

$termoBusca = "";

$query2 = $conexao->prepare("SELECT * FROM users WHERE name LIKE :termobusca");

$query2->bindParam(':termobusca', $termoBusca); // POR padrão a tipagem é PDO::PARAM_STR

$termoBusca = '%jose%';

$query2->execute();
$usuariosFiltradoPorNome = $query2->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuariosFiltradoPorNome as $usuario) {
    echo "<pre>";
    var_dump($usuario);
    echo "</pre>";
}

