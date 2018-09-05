<?php
session_start();
require('../connection/connection.php');
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
                        <li><a href="#">我的訂單</a>
                        </li>
                        <li>Order # 1735</li>
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

                <div class="col-md-9" id="customer-order">
                    <div class="box">



                    <?php 
                    $query2 = $db->query("SELECT * FROM customer_orders WHERE customer_orders_id=".$_GET['customer_orders_id']);
                    $data = $query2->fetchAll(PDO::FETCH_ASSOC);
                    ?>



                    <?php foreach($data as $customer_orders){ ?>

                    <h1>訂單 <?php echo $customer_orders['order_no']?></h1>

                        <p class="lead">訂單 <?php echo $customer_orders['order_no']?> 於 <strong><?php echo $customer_orders['order_date']?></strong> 成立，
                        目前狀態為<strong>
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
                          }?>
                        </strong>.</p>
                        <p class="text-muted">有任何問題請 <a href="contact.php">聯絡我們</a>, 我們將盡快回覆您.</p>
                    <?php } ?>        
                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">產品名稱</th>
                                        <th>數量</th>
                                        <th>單價</th>
                                        <th>小計</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = $db->query("SELECT * FROM order_details WHERE customer_orders_id=".$_GET['customer_orders_id']);
                                    $data = $query->fetchAll(PDO::FETCH_ASSOC);

                                foreach($data as $order_details){ 
                                $total_price=0;
                                ?>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                <img src="../images/detailsquare.jpg" alt="White Blouse Armani">
                                            </a>
                                        </td>
                                        <td><a href="#"><?php echo $order_details['name'] ?></a>
                                        </td>
                                        <td><?php echo $order_details['quantity'] ?></td>
                                        <td><?php echo $order_details['price'] ?></td>
                                        <td><?php $subtotal = $order_details['price'] *$order_details['quantity']; echo $subtotal; ?></td>
                                    </tr>
                                    <?php $total_price += $subtotal; } ?>             
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-right">訂單總計</th>
                                        <th>$<?php echo $total_price ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">運費</th>
                                        <th>$
                                        <?php 
                                        $query = $db->query("SELECT * FROM customer_orders WHERE customer_orders_id=".$_GET['customer_orders_id']);
                                        $data = $query->fetch(PDO::FETCH_ASSOC);
                                        if($data['delivery']=='宅配'){
                                            $shipping=100;
                                            echo $shipping;
                                        }else if($data['delivery']=='超商取貨'){
                                            $shipping=80;
                                            echo $shipping;
                                        }else if($data['delivery']=='貨到付款'){
                                            $shipping=100;
                                            echo $shipping;
                                        }
                                        ?>
                                        </th>
                                    </tr>
                                   
                                    <tr>
                                        <th colspan="5" class="text-right">合計</th>
                                        <th>$<?php echo $total_price + $shipping ?></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->
                        <?php 
                             $query = $db->query("SELECT * FROM customer_orders WHERE customer_orders_id=".$_GET['customer_orders_id']);
                             $data = $query->fetch(PDO::FETCH_ASSOC);
                        ?>

                         <div class="row addresses">
                            <div class="col-md-12">
                                <h2>收件者資訊</h2>
                                <p><?php echo $data['name']; ?>
                                    <br><?php echo $data['mobile']; ?>
                                    <br><?php echo $data['zipcode']; ?>
                                    <br><?php echo $data['county']; ?>
                                    <br><?php echo $data['district']; ?>
                                    <br><?php echo $data['address']; ?></p>
                            </div>
                            
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
