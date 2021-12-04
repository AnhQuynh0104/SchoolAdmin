<?php
require_once('config.php');
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
function execute($sql){
    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    mysqli_query($connection, $sql);

    mysqli_close($connection);
}

function executeResult($sql){
    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    $resultset = mysqli_query($connection, $sql);
    $list = [];
    while($row = mysqli_fetch_array($resultset, 1)){
        $list[] = $row;
    }

    mysqli_close($connection);
    return $list;
}