<?php

if(isset($_GET['id']))
{
    require 'conection.php';

    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $task = $stmt->fetch();
    include 'task.view.php';
    exit();
}
include 'error.php';