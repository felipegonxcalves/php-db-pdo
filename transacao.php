<?php

try {
    $conexao = new PDO('mysql:host=127.0.0.1;dbname=gie_test_desenv', 'root', 'jxn9sid4');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // VAI LANÇAR A EXCEPTION AUTOMATICAMENTE

    $conexao->beginTransaction();

    $conexao->query();
    $conexao->query();

    $conexao->commit();


} catch (\PDOException $e) {
    $conexao->rollBack();

    echo "Mensagem: {$e->getMessage()}";
    echo "<br> Codigo: {$e->getCode()}";
}



