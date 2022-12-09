<?php

function getConnection()
{
    try {
        $conexao = new PDO('mysql:host=localhost;dbname=bolao-ifms-db;port=3305', "root", "WhateverPassword");
        return $conexao;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

?>