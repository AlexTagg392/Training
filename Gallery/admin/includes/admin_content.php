<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>

            <?php

//
//                $photos = Photo::find_all();
//                foreach ($photos as $photo) {
//                    echo $photo->title . "<br>";
//                    echo $photo->description. "<br>";
//                }

//                $photo = new Photo();
//                $photo->title = "Photo #2";
//                $photo->description = "Blue blue blue";
//
//                $photo->create();


//                $user = new User();
//
//                $user->username = "KimmySchmidt";
//                $user->password = "1234";
//                $user->first_name = "Erin";
//                $user->last_name = "Hannon";
//
//                $user->create();
//
                $user = User::find_by_id(5);
                $user->username = "Bears_Beets_BattleStarGalactica";
                $user->password = "1234";
                $user->first_name = "Dwight K.";
                $user->last_name = "Schrute";

                $user->update();
//
//                $user = User::find_by_id(19);
//
//                $user->delete();
//
//                $user = User::find_by_id(10);
//                $user->last_name = "Martin";
//
//                $user->save();
//
//                $user = new User();
//
//                $user->username = "RuDoDoDodo";
//                $user->password = "1234";
//                $user->first_name = "Andy";
//                $user->last_name = "Bernard";
//
//                $user->save();

//                echo INCLUDES_PATH;

                echo "<h4><b>Finding All Photos: </b></h4>";
                $photos = Photo::find_all();
                foreach ($photos as $photo) {
                    echo "Photo ID: " . $photo->id . "<br>";
                    echo "Title: " . $photo->title . "<br>";
                    echo "Description: " . $photo->description . "<br>";
                    echo "File Name: " . $photo->filename . "<br>";
                    echo "Type: " . $photo->type . "<br>";
                    echo "Size:  " . $photo->size . " Bytes" . "<br>";
                    echo "<br>";
                }

                echo "<h4><b>Finding All Users:</b></h4>";
                $users = User::find_all();
                foreach ($users as $user) {
                    echo "ID: " . $user->id . "<br>";
                    echo "Username: " . $user->username . "<br>";
                    echo "Password: " . $user->password . "<br>";
                    echo "Full Name: " . $user->first_name . " " . $user->last_name  . "<br>";
                    echo "<br>";

                }

                echo "<h4><b>Finding User by Id:</b></h4>";
                $found_user = User::find_by_id(11);
                    echo "ID: " . $found_user->id . "<br>";
                    echo "Username: " . $found_user->username . "<br>";
                    echo "Password: " . $found_user->password . "<br>";
                    echo "Full Name: " . $found_user->first_name . " " . $found_user->last_name  . "<br>";
                    echo "<br>";

            ?>






            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->