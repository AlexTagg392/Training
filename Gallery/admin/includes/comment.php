<?php

class Comment extends Db_object {
    protected static $db_table = "comments";
    protected static $db_table_fields = array('id', 'photo_id', 'author', 'body');
    public $id;
    public $photo_id;
    public $author;
    public $body;

    public static function find_all()
    {
        return static::find_by_query("SELECT * FROM " . static::$db_table . " ");
    }

    public static function find_by_id($id)
    {
        global $database;
        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
//

//
//    public function update() {
//        global $database;
//
//        $properties = $this->clean_properties();
//
//        $properties_pairs = array();
//
//        foreach ($properties as $key => $value) {
//            $properties_pairs[] = "{$key}='{$value}'";
//        }
//
//        $sql = "UPDATE " . static::$db_table . " SET ";
//        $sql .= implode(", ", $properties_pairs);
//        $sql .= " WHERE id= " . $database->escape_string($this->id);
//
//
//        $database->query($sql);
//
//        return (mysqli_affected_rows($database->connection) == 1);
//    }
//
//    public function delete() {
//        global $database;
//
//        $sql = "DELETE FROM " . static::$db_table . " WHERE id= " . $database->escape_string($this->id) . " LIMIT 1";
//
//        $database->query($sql);
//
//        return (mysqli_affected_rows($database->connection) == 1);
//    }
    public function properties() {

        $properties = array();
        foreach (self::$db_table_fields as $db_field) {
            if(property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
    }

    public static function create_comment($photo_id, $author="David Wallace", $body="") {

        if(!empty($photo_id) && !empty($author) && !empty($body)) {
            $comment = new Comment();

            $comment->photo_id = (int)$photo_id;
            $comment->author = $author;
            $comment->body = $body;

            return $comment;
        } else {
            return false;
        }
    }

    public static function find_comments($photo_id=0) {
        global $database;

        $sql = "SELECT * FROM " . self::$db_table;
        $sql .= " WHERE photo_id = ";
        $sql .= $database->escape_string($photo_id);
        $sql .= " ORDER BY photo_id ASC";

        return self::find_by_query($sql);
    }

} // End of Class