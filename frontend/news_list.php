<?php
session_start();
require('../connection/connection.php');
$limit = 2;
if (isset($_GET["page"])) {
   $page  = $_GET["page"]; 
  } else {
     $page=1;
     };
$start_from = ($page-1) * $limit;
$query = $db->query("SELECT * FROM news ORDER BY published_date DESC LIMIT ".$start_from.",".$limit);
$data = $query->fetchAll(PDO::FETCH_ASSOC);
$totalrows = count($data);
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
                    <ul class="breadcrumb">

                        <li><a href="index.php">首頁</a>
                        </li>
                        <li>最新消息</li>
                    </ul>
                </div>

                <!-- *** LEFT COLUMN ***
		     _________________________________________________________ -->

                <div class="col-sm-9" id="blog-listing">
                <?php foreach($data as $news){?>
                    <div class="post">
                        <h2><a href="news.php?news_id=<?php echo $news['news_id'];?>"><?php echo $news['title'];?></a></h2>
                        
                        <hr>
                        <p class="date-comments">
                            <a href="post.php"><i class="fa fa-calendar-o"></i><?php echo $news['published_date'];?></a>
                        </p>

                        <p class="intro"><?php echo mb_strimwidth(strip_tags($news['content']),0,100,"...");?></p>
                        <p class="read-more"><a href="news.php?news_id=<?php echo $news['news_id'];?>" class="btn btn-primary">了解更多</a>
                        </p>
                    </div>
                 <?php }?>

      <?php  if($totalrows > 0){
            $sth = $db->query("SELECT * FROM news ORDER BY published_date ASC ");
            $data_count = count($sth ->fetchAll(PDO::FETCH_ASSOC));
            $total_pages = ceil($data_count / $limit); // 無條件進位
           ?>
      <div class="row">
        <div class="col-md-12">
        <ul class="pager">
    <?php if($page>1){ ?>
    <li class="page-item"><a class="page-link" href="news_list.php?page=<?php echo$page-1; ?>">«</a></li>
    <?php }else{ ?>
    <li class="page-item"><span class="page-link">«</span></li>
    <?php } ?>
    <?php for($i=1;$i<=$total_pages;$i++){ ?>
    <li class="page-item"><a class="page-link" href="news_list.php?page=<?php echo$i; ?>"><?php echo$i; ?></a></li>
    <?php } ?>
    <?php if($page<$total_pages){ ?>
    <li class="page-item"><a class="page-link" href="news_list.php?page=<?php echo$page+1; ?>">»</a></li>
    <?php }else{ ?>
    <li class="page-item"><span class="page-link">»</span></li>
    <?php } ?>
</ul>
        </div>
      </div>
      <?php } ?>
  </div>

                <!-- /.col-md-9 -->

                <!-- *** LEFT COLUMN END *** -->


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
                            <img src="../images/ad-banner.jpg" alt="sales 2014" class="img-responsive">
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