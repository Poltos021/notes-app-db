<?php


class Note
{
    public $id;
    public $title;
    public $text;

    static public function get($id) {
        $res = DB::get()->query('SELECT * FROM `notes` where id = ' . intval($id));
        $note = $res->fetch();

        if (!$note){
            return NULL;
        }

        $obj = new self();

        $obj->id = $note['id'];
        $obj->title = $note['title'];
        $obj->text = $note['text'];

        return $obj;

    }

    static public function getAll() {

        $notes = [];

        return $notes;
    }
}