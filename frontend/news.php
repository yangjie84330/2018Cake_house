<?php
session_start();
require('../connection/connection.php');
$query = $db->query("SELECT * FROM news WHERE news_id=".$_GET['news_id']);
$data = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cake House 帶給你最天然健康的幸福滋味">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Cake House : 帶給你最天然健康的幸福滋味
    </title>

    <meta name="keywords" content="">

    <?php require_once('template/head_files.php');?>

</head>

<body>

<?php require_once('template/navbar.php'); ?>

    <div id="all">
    
        <div id="content">
            <div class="container">

                <div class="col-sm-12">
                    <?php foreach($data as $news){?>  
                    <ul class="breadcrumb">

                        <li><a href="index.php">首頁</a>
                        </li>
                        <li><a href="news_list.php">最新消息</a>
                        </li>
                        <li><?php echo $news['title'];?></li>
                    </ul>
                </div>

                <div class="col-sm-9" id="blog-post">

              
                    <div class="box">

                        <h1><?php echo $news['title'];?></h1>
                        <p class="author-date"><?php echo $news['published_date'];?></p>
                        <p><?php echo $news['content'];?></p>
                    <?php }?>
                    </div>    
                        <!-- /#post-content -->

                </div>
                    <!-- /.box -->
                
                <!-- /#blog-post -->

                <div class="col-md-3">
                    <!-- *** BLOG MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Blog</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="blog.php">About us</a>
                                </li>
                                <li class="active">
                                    <a href="blog.php">Fashion</a>
                                </li>
                                <li>
                                    <a href="blog.php">News and gossip</a>
                                </li>
                                <li>
                                    <a href="blog.php">Design</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** BLOG MENU END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="../images/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

 <?php require_once('template/footer.php'); ?>

</body>

</html>