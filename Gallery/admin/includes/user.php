<?php

class User extends Db_object {
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $upload_directory = "images";
    public $image_placeholder = "http://www.jennybeaumont.com/wp-content/uploads/2015/03/placeholder.gif";


    public function set_file($file) {

        if(empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;

        } elseif ($file['error'] !=0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;

        } else {

            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];

        }
    }

    public function image_path() {
        return $this->upload_directory . DS . $this->user_image;
    }


    public function save_user_image() {


            if(!empty($this->errors)) {
                return false;
            }

            if(empty($this->user_image) || empty($this->tmp_path)) {
                $this->errors[] = "The file was not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

            if (file_exists($target_path)) {
                $this->errors[] = "This file {$this->user_image} already exists";
                return false;
            }

            if(move_uploaded_file($this->tmp_path, $target_path)) {
                if($this->create()) {
                    unset($this->tmp_path);
                    return true;
                }
            } else {

                $this->errors[] = "The directory does not have permissions ";
                return false;

            }

        }


    public function image_path_and_placeholder() {
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
    }


    public static function verify_user($username, $password)
    {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_by_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

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

    public function properties() {

        $properties = array();
        foreach (self::$db_table_fields as $db_field) {
            if(property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
    }

    public function create() {
        global $database;

        $properties = $this->clean_properties();

        $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";

        if($database->query($sql)) {
            $this->id = $database->insert_id();
            return true;

        } else {
            return false;
        }

    }

    public function update() {
        global $database;

        $properties = $this->clean_properties();

        $properties_pairs = array();

        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id= " . $database->escape_string($this->id);


        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1);
    }

    public function delete() {
        global $database;

        $sql = "DELETE FROM " . static::$db_table . " WHERE id= " . $database->escape_string($this->id) . " LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1);
    }

    public function ajax_save_user_image($user_image, $user_id) {
        global $database;
        $user_image = $database->escape_string($user_image);
        $user_id = $database->escape_string($user_id);

        $this->user_image = $user_image;
        $this->id = $user_id;

        $sql = "UPDATE " . self::$db_table . " SET user_image = '{$this->user_image}' ";
        $sql .= " WHERE id = {$this->id} ";
        $update_image = $database->query($sql);

        echo $this->image_path_and_placeholder();


    }



}