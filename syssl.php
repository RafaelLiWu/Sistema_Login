<?php

$req = filter_input(INPUT_GET, "req", FILTER_SANITIZE_NUMBER_INT);
try {
    require_once "ControlData.php";
    $conect = new Controler();

    switch ($req) {
        case 1:
            $email = filter_input(INPUT_POST, "Email", FILTER_SANITIZE_STRING);
            $senha = filter_input(INPUT_POST, "Senha", FILTER_SANITIZE_STRING);
            $query = "SELECT * FROM usuarios WHERE Email = :email AND Senha = :senha";
            $bind = array(
                "email" => $email,
                "senha" => md5($senha)
            );

            $result = $conect->_selectData($query, $bind, $req);
            if(is_array($result)){
                echo 1;
            } else {
                echo -1;
            }
            break;
        case 2:
            $nome = filter_input(INPUT_POST, "Nome", FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, "Email", FILTER_SANITIZE_STRING);
            $senha = filter_input(INPUT_POST, "Senha", FILTER_SANITIZE_STRING);
            $query = "INSERT INTO usuarios (Nome, Email, Senha) VALUES (:nome, :email, :senha) ";
            $bind = array(
                "nome" => $nome,
                "email" => $email,
                "senha" => md5($senha)
            );

            $result = $conect->_selectData($query, $bind, $req);
            if(!is_array($result)){
                echo 2;
            } else {
                echo -2;
            };
            break;
        default:
            echo "Erro ";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}


