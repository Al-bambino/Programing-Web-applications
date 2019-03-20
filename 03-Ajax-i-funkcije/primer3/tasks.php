<?php

$tasks = [
  0 =>  [ 'description' => 'Desc', 'completed' => false],
  1 =>  [ 'description' => 'Opis', 'completed' => true],
  2 =>  [ 'description' => 'Ipsum', 'completed' => false],
  3 =>  [ 'description' => 'LOREM', 'completed' => true],
];

//echo json_encode($tasks);

require 'views/tasks.view.php';