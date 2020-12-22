<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>

            <?php

//                $user = new User();
//
//                $user->username = "ChiliKing";
//                $user->password = "bullfroginlove";
//                $user->first_name = "Kevin";
//                $user->last_name = "Malone";
//
//                $user->create();
//
//                $user = User::find_user_by_id(10);
//                $user->last_name = "Schrute";
//
//                $user->update();
//
//                $user = User::find_user_by_id(13);
//
//                $user->delete();
//
//                $user = User::find_user_by_id(10);
//                $user->last_name = "Martin";
//
//                $user->save();
//
//                $user = new User();
//
//                $user->username = "FrankandBeans";
//                $user->password = "1234";
//                $user->first_name = "Pam";
//                $user->last_name = "Halpert";
//
//                $user->save();


                echo "<h4><b>Finding All Users:</b></h4>";
                $users = User::find_all_users();
                foreach ($users as $user) {
                    echo "ID: " . $user->id . "<br>";
                    echo "Username: " . $user->username . "<br>";
                    echo "Password: " . $user->password . "<br>";
                    echo "Full Name: " . $user->first_name . " " . $user->last_name  . "<br>";
                    echo "<br>";

                }

                echo "<h4><b>Finding User by Id:</b></h4>";
                $found_user = User::find_user_by_id(1);
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