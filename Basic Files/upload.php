<?php

if(isset($_POST['submit'])) {
//    echo "<pre>";
//
//    print_r($_FILES['file_upload']);
//
//    echo "<pre>";

    $upload_errors = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload max file size",
        UPLOAD_ERR_FORM_SIZE => "THe uploaded file exceeds the Max File Size",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE =>  "No File was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
    );

    $temp_name = $_FILES['file_upload']['tmp_name'];
    $the_file = $_FILES['file_upload']['name'];
    $directory = "uploads";

    if(move_uploaded_file($temp_name, $directory . "/" . $the_file)) {
        $the_message =  "File Uploaded Successfully!";
    } else {
        $the_error = $_FILES['file_upload']['error'];
        $the_message = $upload_errors[$the_error];
    }


}


?>
 <!DOCTYPE html>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <form action="upload.php" enctype="multipart/form-data" method="post">
        <h2>
            <?php
                if(!empty($upload_errors)) {
                    echo $the_message;
                }
            ?>
        </h2>
        <input type="file" name="file_upload">

        <input type="submit" name="submit">
    </form>

</body>
</html>
