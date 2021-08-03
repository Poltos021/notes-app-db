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

        $res = DB::get()->query('SELECT * FROM `notes`');
        $result=$res->fetchAll();

        $notes = [];

        for($i=0; $i<count($result); $i++){
            $obj=new self();

            $obj->id = $result[$i]['id'];
            $obj->title=$result[$i]['title'];
            $obj->text = $result[$i]['text'];

            $notes[$i]=$obj;
        }
        return $notes;

    }

    public function insert()
    {
        $sql = 'INSERT INTO `notes` (`title`, `text`) VALUES (?, ?)';
        $prepaired = DB::get()->prepare($sql);
        $result = $prepaired->execute([
            $this->title, 
            $this->text]);

        $this->id = DB::get()->lastInsertId();

        return $result;
    }

    public function delete(){
        $sql = 'DELETE FROM `notes` WHERE id = ' . $this->id;
        DB::get()->query($sql);
    }

    public function update(){
        $sql = 'UPDATE `notes` SET `title`=:title, `text`=:text WHERE `id`=:id';
        $prepared = DB::get()->prepare($sql);
        $prepared->execute([
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text
        ]);
    }

    public function save()
    {
        //не доработано
    }
}