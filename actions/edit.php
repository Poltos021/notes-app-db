<?php

$id = $_GET['id'];

$note = Note::get($id);

if (!$note){
    header('Location: index.php');
    exit(); //die;
}

if ($_POST && $_POST['title'] && $_POST['text']){

    $note->title = $_POST['title'];
    $note->text = $_POST['text'];

    $note->update();
    header('Location: ?action=view&id=' . $note->id);
    exit(); //die;
}