<?php

$note =  new Note();

$note->title = $_POST['title'];
$note->text = $_POST['text'];

if($_POST && $_POST['title'] && $_POST['text']){
    $result = $note->insert();
    if ($result){
        header('Location: ?action=view&id=' . $note->id);
        die;
    }
}

