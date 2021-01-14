<?php include("includes/header.php"); ?>
<?php
    require_once("admin/includes/init.php");



    if(empty($_GET['id'])) {
        redirect("index.php");
    }

    $photo = Photo::find_by_id($_GET['id']);


    if (isset($_POST['submit'])) {
        $author = trim($_POST['author']);
        $body = trim($_POST['body']);

        $new_comment = Comment::create_comment($photo->id, $author, $body);

        if($new_comment && $new_comment->save()) {

            redirect("photo.php?id={$photo->id}");
        } else {
            $message = "There was some problems saving";
        }
    } else {
        $author = "";
        $body = "";
    }

    $comments = Comment::find_comments($photo->id);
?>



<!DOCTYPE html>
<html lang="en">
<body>

    <!-- Navigation -->
    <?php require_once("includes/navigation.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Alex Taggart</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
<!--                --><?php //$photo = Photo::find_by_id($_GET['id']); ?>

                <img class="blog_image" src="admin/<?php echo $photo->picture_path(); ?>" alt="<?php echo $photo->filename; ?>">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->caption; ?></p>
                <p><?php echo $photo->description; ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="author">Author: </label>
                            <input type="text" name="author" class="form-control"</input>
                        </div>
                        <div class="form-group">
                            <label for="body">Comment: </label>
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>




                <!-- Posted Comments -->
                    <?php foreach ($comments as $comment): ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author; ?>
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        <?php echo $comment->body; ?>
                    </div>
                </div>

                <?php endforeach; ?>

                <!-- Comment -->
                    <!-- Nested Comment -->
                    <!-- End Nested Comment -->
            </div>

            <!-- Blog Sidebar Widgets Column -->
<!--            <div class="col-md-4">-->

                <!-- Blog Search Well -->
<!--                <div class="well">-->
<!--                    <h4>Blog Search</h4>-->
<!--                    <div class="input-group">-->
<!--                        <input type="text" class="form-control">-->
<!--                        <span class="input-group-btn">-->
<!--                            <button class="btn btn-default" type="button">-->
<!--                                <span class="glyphicon glyphicon-search"></span>-->
<!--                        </button>-->
<!--                        </span>-->
<!--                    </div>-->
                    <!-- /.input-group -->
<!--                </div>-->

                <!-- Blog Categories Well -->
<!--                <div class="well">-->
<!--                    <h4>Blog Categories</h4>-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-6">-->
<!--                            <ul class="list-unstyled">-->
<!--                                <li><a href="#">Category Name</a>-->
<!--                                </li>-->
<!--                                <li><a href="#">Category Name</a>-->
<!--                                </li>-->
<!--                                <li><a href="#">Category Name</a>-->
<!--                                </li>-->
<!--                                <li><a href="#">Category Name</a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                        <div class="col-lg-6">-->
<!--                            <ul class="list-unstyled">-->
<!--                                <li><a href="#">Category Name</a>-->
<!--                                </li>-->
<!--                                <li><a href="#">Category Name</a>-->
<!--                                </li>-->
<!--                                <li><a href="#">Category Name</a>-->
<!--                                </li>-->
<!--                                <li><a href="#">Category Name</a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
                    <!-- /.row -->
<!--                </div>-->

                <!-- Side Widget Well -->
<!--                <div class="well">-->
<!--                    <h4>Side Widget Well</h4>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!---->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-center">Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
