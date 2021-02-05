<?php 

    /********Start of Helper Functions***********/



    //Function to trim values

    function clean($value){        //$username  = clean($_POST['username']);

        return trim($value);

    }



    //Function to sanitize strings

    function sanitize($raw_value){       //$username  = santize($_POST['username']);

        return filter_var($raw_value, FILTER_SANITIZE_STRING);

    }



    //Function to validate email
    function val_email($raw_email){         //$clean_email  = val_email($_POST['email']);

        return filter_var($raw_email, FILTER_VALIDATE_EMAIL);

    }



    //function to validate int

    function val_int($raw_int){      //$cl_age  = val_int($_POST['age']);

        return filter_var($raw_int, FILTER_VALIDATE_INT);

    }



    //Function to hash passwords

    function hash_pwd($raw_password){   //$hashed_password  = hash_pwd($_POST['password']);

        return md5($raw_password);

    }



    //Function to redirect

    function redirect($url){            //redirect(index.php);

        return header("Location: {$url}");

    }




    //Function to display session messages

    function set_msg($msg){                 //"Welcome to your account";

        if(empty($msg)){

            $msg = "";

        }else{

            $_SESSION['setmsg'] = $msg;

        }

    }


    function display_msg(){

        if(isset($_SESSION['setmsg'])){

            echo $_SESSION['setmsg'];

            unset($_SESSION['setmsg']);
        }


    }

    function process_registration(){
        if(isset($_POST['submit_registration'])) {
            $raw_name     = clean($_POST['name']);
            $raw_sex      = clean($_POST['sex']);
            $raw_email    = clean($_POST['email']);
            $raw_password = clean($_POST['password']);

            $cl_name      = sanitize($raw_name);
            $cl_sex       = sanitize($raw_sex);
            $cl_email     = val_email($raw_email);
            $cl_password  = sanitize($raw_password);

            // Hashed Password
            $hashed_password = hash_pwd($cl_password);

            //Check for correct Image
            $allowed_image = array('png', 'jpg', 'jpeg');

            $raw_image     = $_FILES['image']['name'];

            $image_ext      = pathinfo($raw_image, PATHINFO_EXTENSION);

            if(!in_array($image_ext, $allowed_image)){
                echo '<div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning!</strong> Sorry, the file type is not allowed. Please Try again
                    </div>';
            } else {

                //attach a random value(1000 to 100000) to the file
                $new_image      = rand(1000, 1000000) . "_" . $_FILES['image']['name'];

                //Temporary Folder
                $temp_folder    = $_FILES['image']['tmp_name'];

                //Change the Filename to Lowercase
                $new_image_name = strtolower($new_image);

                $cl_image       = str_replace('', '_', $new_image_name);

                $folder         = "uploaded_image/";

                require_once ('pdo.php');

                // Instantiating Database object
                $database = new Database();

                $database->query('SELECT * FROM users WHERE email = :email');

                $database->bind(':email', $cl_email, PDO::PARAM_STR);

                $get_user = $database->fetchSingle();

                if($get_user > 0){
                    redirect('login.php');

                    set_msg('<div class="alert alert-info text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Notice!</strong> You have already registered. Please Login;
                            </div>');

                }elseif(move_uploaded_file($temp_folder, $folder . $cl_image)){


                    $database->query('INSERT INTO users(id, fullname, sex, password, image, email) VALUES(NULL, :fullname, :sex,
                    :password, :image, :email) ');

                    $database->bind(':fullname', $cl_name, PDO::PARAM_STR);
                    $database->bind(':sex', $cl_sex, PDO::PARAM_STR);
                    $database->bind(':password', $hashed_password, PDO::PARAM_STR);
                    $database->bind(':image', $cl_image, PDO::PARAM_STR);
                    $database->bind(':email', $cl_email, PDO::PARAM_STR);

                    $run = $database->execute();

                    if($run){
                        redirect('login.php');

                        set_msg('<div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Registraction successful. Please Login;
                            </div>');

                    } else {
                        echo '<div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sorry!</strong> Registration not Successful! Please Try again
                        </div>';
                    }
                }
            }
        }
    }

    function login_user() {
        if(isset($_POST['submit_login'])){
            $raw_email    = clean($_POST['email']);
            $raw_password = clean($_POST['password']);

            $cl_email     = val_email($raw_email);
            $cl_password  = sanitize($raw_password);

            $hashed_password = hash_pwd($cl_password);

            require_once ('pdo.php');

            // Instantiating Database object
            $database = new Database();

            $database->query('SELECT * FROM users WHERE email = :email AND password = :password');

            $database->bind(':email', $cl_email, PDO::PARAM_STR);
            $database->bind(':password', $hashed_password, PDO::PARAM_STR);

            $get_user = $database->fetchSingle();

            if ($get_user > 0) {
                $image_name = $get_user['image'];

                $image_path = "<img src=uploaded_image/" . $image_name . " class='profile_image'>";

                redirect('user-account.php');
                $_SESSION['user_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    'fullname' => $get_user['fullname'],
                    'id'       => $get_user['id'],
                    'email'    => $get_user['email'],
                    'image'    => $image_path
                );

            } else {
                redirect('login.php');

                set_msg('<div class="alert alert-danger text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning</strong> This email or password is not found in our database. 
                            Please Login using correct credentials or register new credentials.
                            </div>');
            }
        }
    }



?>