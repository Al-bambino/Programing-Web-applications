<?php

$tasks = [
  0 =>  [ 'subject' => 'Desc', 'completed' => false],
  1 =>  [ 'subject' => 'Opis', 'completed' => true],
  2 =>  [ 'subject' => 'Ipsum', 'completed' => false],
  3 =>  [ 'subject' => 'LOREM', 'completed' => true],
];

//echo json_encode($tasks);

require 'views/tasks.view.php';