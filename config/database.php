<?php

     //config connecton
    /*
    $host = "localhost";
    $port = "5432";
    $dbname = "schoolar";
    $user = "postgres";
    $password = "unicesmag";
*/
    $host = "aws-0-us-east-1.pooler.supabase.com";
    $port = "6543";
    $dbname = "postgres";
    $user = "postgres.legssiopkwotxcizpxzr";
    $password = "unicesmag@@";
/*
    $host     = "DB_HOST";
    $port     = "DB_PORT";
    $dbname   = "DB_NAME";
    $user     = "DB_USER";
    $password = "DB_PASSWORD";
*/
    //Create connection 
    $conn = pg_connect("
        host = $host
        port = $port
        dbname = $dbname
        user = $user
        password = $password
    ");

    if(!$conn){
        //die("Connection error" . pg_last_error());
    }else{
        //echo "Success  connection";
    }

    //pg_close();
?>