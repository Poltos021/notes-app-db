<?php

$id = $_GET['id'];

$note = Note::get($id);

if (!$note){
    header('Location: index.php');
    exit(); //die;
}