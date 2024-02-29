<?php

function connectDB()
{
    $servername = "localhost";
    $username = "srobinett_cafe";
    $password = "CSCI213!db";
    $dbname = "srobinett_cafe";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
