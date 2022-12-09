<?php

function getConnection()
{
    try {
        $conexao = new PDO('mysql:host=localhost;dbname=bolao-ifms;port=3306', "root", "123456");
        return $conexao;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

?>