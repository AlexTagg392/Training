<?php

    class Photo extends Db_object {

        protected static $db_table = "photos";
        protected static $db_table_fields = array('title', 'caption', 'description', 'filename', 'alternate_text', 'type', 'size');
        public $id;
        public $title;
        public $caption;
        public $description;
        public $filename;
        public $alternate_text;
        public $type;
        public $size;

        public $tmp_path;
        public $upload_directory = "images";
        public $errors = array();
        public $upload_errors_array = array(

            UPLOAD_ERR_OK => "There is no error",
            UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload max file size",
            UPLOAD_ERR_FORM_SIZE => "THe uploaded file exceeds the Max File Size",
            UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",
            UPLOAD_ERR_NO_FILE =>  "No File was uploaded",
            UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
            UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
            UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
        );

        public function set_file($file) {

            if(empty($file) || !$file || !is_array($file)) {
                $this->errors[] = "There was no file uploaded here";
                return false;

            } elseif ($file['error'] !=0) {
                $this->errors[] = $this->upload_errors_array[$file['error']];
                return false;

            } else {

                $this->filename = basename($file['name']);
                $this->tmp_path = $file['tmp_name'];
                $this->type = $file['type'];
                $this->size = $file['size'];

            }
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


        public function picture_path() {
            return $this->upload_directory . DS . $this->filename;
        }

        public function save() {

            if($this->id) {
                $this->update();

            } else {

                if(!empty($this->errors)) {
                    return false;
                }

                if(empty($this->filename) || empty($this->tmp_path)) {
                    $this->errors[] = "The file was not available";
                    return false;
                }

                $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

                if (file_exists($target_path)) {
                    $this->errors[] = "This file {$this->filename} already exists";
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
        }

        public function delete_photo() {

            if ($this->delete()) {
                $target_path = SITE_ROOT . DS . 'admin' . DS . $this->picture_path();
                return unlink($target_path);

            } else {
                return false;
            }
        }

        public function comments() {
            return Comment::find_comments($this->id);
        }

        public static function display_sidebar_data($photo_id) {

            $photo = Photo::find_by_id($photo_id);

            $output = "<a class='thumbnail' href='#'><img width='100' src='{$photo->picture_path()}' ></a> ";
            $output .= "<p>{$photo->filename}</p>";
            $output .= "<p>{$photo->type}</p>";
            $output .= "<p>{$photo->size}</p>";

            echo $output;
        } 












    }