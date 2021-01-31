<?php

try {
    $serverName = 'localhost\SQLEXPRESS';
    $database = 'fetecno';

    $conexao = new PDO("sqlsrv:server=$serverName;Database = $database", 'sa', 'jxn9sid4');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Lançça as exception automaticamente

    $sql = 'CREATE TABLE alunos (id int primary key, nome varchar(100))';
    $conexao->query($sql);

    $sql = "INSERT INTO alunos (id, nome) values (1, 'Felipe Gonçalves')";
    $conexao->query($sql);

    $sql = "SELECT * FROM alunos";
    $resultado = $conexao->query($sql);
    $alunos = $resultado->fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>";
    var_dump($alunos);
    echo "</pre>";


} catch (\PDOException $e) {

}
