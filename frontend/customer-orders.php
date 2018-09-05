<?php 
session_start();
require('../connection/connection.php');
$query = $db->query("SELECT * FROM customer_orders WHERE members_id=".$_SESSION['member']['members_id']." ORDER BY order_date DESC");
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

    <?php require_once('template/head_files.php'); ?>



</head>

<body>
<?php require_once('template/navbar.php'); ?>

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="../index.php">首頁</a>
                        </li>
                        <li>我的訂單</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">會員專區</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="customer-orders.php"><i class="fa fa-list"></i> 我的訂單</a>
                                </li>
                                <li>
                                    <a href="customer-wishlist.php"><i class="fa fa-heart"></i> 願望清單</a>
                                </li>
                                <li>
                                    <a href="customer-account.php"><i class="fa fa-user"></i> 我的資料</a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out"></i> 登出</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>我的訂單</h1>

                        <p class="lead">以下是您的訂單</p>
                        <p class="text-muted">若有任何問題請至 <a href="contact.php">聯絡我們</a>填寫表單.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>訂單編號</th>
                                        <th>訂購日期</th>
                                        <th>總金額</th>
                                        <th>訂單狀態</th>
                                        <th>訂單明細</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data as $customer_orders){ ?>
                                    <tr>
                                        <th><?php echo $customer_orders['order_no']; ?></th>
                                        <td><?php echo $customer_orders['order_date']; ?></td>
                                        <td><?php echo $customer_orders['total_price']; ?></td>
                                        <td>

                                        <?php
                                        switch ($customer_orders['status']) {
                                            case "0":
                                                echo '<span class="label label-info">待付款</span>';
                                                break;
                                            case "1":
                                                echo '<span class="label label-success">貨物已送達</span>';
                                                break;
                                            case "2":
                                                echo '<span class="label label-success">貨物已送達</span>';
                                                break;
                                            case "3":
                                                echo '<span class="label label-warning">出貨中</span>';
                                                break;
                                            case "99":
                                                echo '<span class="label label-danger">取消訂單</span>';
                                                break;
                                            }
                                            ?>
                                            <!-- <span class="label label-info">待付款</span>
                                            <span class="label label-success">貨物已送達</span>
                                            <span class="label label-danger">取消訂單</span>
                                            <span class="label label-warning">出貨中</span>
                                            <span class="label label-warning">運送中</span> -->
                                        </td>
                                        <td><a href="customer-order.php?customer_orders_id=<?php echo $customer_orders['customer_orders_id']; ?>" class="btn btn-primary btn-sm">觀看詳細</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php require_once('template/footer.php'); ?>



</body>

</html>
