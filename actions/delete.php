<?php
$note = Note::get($_GET['id']);
if($note){
    $note->delete();
}
header('Location: index.php');
die;