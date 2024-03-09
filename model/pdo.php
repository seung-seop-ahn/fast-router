<?php

    function pdoSqlConnect(){
        try {
            $DB_HOST = "127.0.0.1"; $DB_NAME = "fdsfsfa_DB";
            $DB_USER = "USER"; $DB_PW = "PASSWORD";
            $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PW);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;



        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }



    function test(){
        $pdo = pdoSqlConnect();
        $query = "SELECT * FROM NOTICE_TB;";

        $st = $pdo->prepare($query);
    //    $st->execute([$param,$param]);
        $st->execute();
        $st->setFetchMode(PDO::FETCH_ASSOC);
        $res = $st->fetchAll();

        $st=null;$pdo = null;

        return $res;

    }