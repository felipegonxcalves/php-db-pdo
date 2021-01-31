<?php

try {
    $conexao = new PDO('mysql:host=127.0.0.1;dbname=gie_test_desenv', 'root', 'jxn9sid4');

//    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT); // É O ERROR MODE PADRÃO QUE VEM NO PDO
//    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // LANÇA A MENSAGEM DE WARNING NA TELA, RECOMENDADO EM AMBIENTE DE DESENVOLVIMENTO
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // VAI LANÇAR A EXCEPTION AUTOMATICAMENTE

    $resultado = $conexao->query('SELECT * FROM users');

//    $resultado = $conexao->query('SELECTTTTT * FROM users');
    // Caso a sintaxe da query esteja escrita errada, ele retornar false
    // com o ERRMODE DO PDO SENDO PDO::ERRMODE_EXCEPTION, NÃO PRECISA DESSE IF, POIS ELE LANÇA A EXCEPTION AUTOMATICAMENTE
//    if (!$resultado) {
//        $erro = $conexao->errorInfo();
//
//        throw new \PDOException($erro[2], $erro[1]);
//    }

    $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    var_dump($usuarios);
    echo "</pre>";

//    $usuarios->setFetchMode(PDO::FETCH_ASSOC);

//    $resultInsert = $conexao->query("INSERT INTO alunos (id, nome) VALUES (4, 'Felipe')");

//    foreach ($usuarios as $usuario) {
//        echo "<pre>";
//        var_dump($usuario);
//        echo "</pre>";
//    }
//    var_dump($usuarios);
} catch (\PDOException $e) {
    echo "Mensagem: {$e->getMessage()}";
    echo "<br> Codigo: {$e->getCode()}";
}



