<?php
session_start();
//if(isset($_POST['Payment']) &&　$_POST['Payment'] == "POST"){
$_SESSION['Receiver']['payment'] = $_POST['payment'];

//print_r($_SESSION['Receiver']);
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
                        <li><a href="#">首頁</a>
                        </li>
                        <li>結帳 - 訂單確認</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="post" action="order_success.php">
                            <h1>結帳 - 訂單確認</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="checkout1.php"><i class="fa fa-map-marker"></i><br>填寫收件者資料</a>
                                </li>
                                <li><a href="checkout2.php"><i class="fa fa-truck"></i><br>選擇取貨方式</a>
                                </li>
                                <li><a href="checkout3.php"><i class="fa fa-money"></i><br>選擇付款方式</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-eye"></i><br>訂單確認</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">產品</th>
                                                <th>數量</th>
                                                <th>單價</th>
                                                <th>折扣</th>
                                                <th>小計</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $subtotal = 0;
                                            $total_price = 0;
                                            $shipping = 100;
                                            for($i = 0; $i < count($_SESSION['Cart']); $i++){ ?>
                                            <tr>
                                                <td>
                                                    <a href="product.php?id=<?php echo$_SESSION['Cart'][$i]['products_id']; ?>">
                                                        <img src="../uploads/products/<?php echo$_SESSION['Cart'][$i]['picture']; ?>" alt="">
                                                    </a>
                                                </td>
                                                <td><a href="product.php?id=<?php echo$_SESSION['Cart'][$i]['products_id']; ?>"><?php echo$_SESSION['Cart'][$i]['name']; ?></a>
                                                </td>
                                                <td><?php echo$_SESSION['Cart'][$i]['quantity']; ?> 個</td>
                                                <td>$<?php echo$_SESSION['Cart'][$i]['price']; ?></td>
                                                <td>$0.00</td>
                                                <td>$<?php $subtotal = $_SESSION['Cart'][$i]['price'] * $_SESSION['Cart'][$i]['quantity']; echo $subtotal; ?></td>
                                            </tr>
                                            <?php $total_price += $subtotal; } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">總金額</th>
                                                <th>$NT<?php echo $total_price; ?></th>
                                            </tr>
                                            <tr>
                                                <th >備註</th>
                                                <td colspan="4">
                                                <textarea class="form-control" name="memo" id="memo" cols="30" rows="5"></textarea>
                                                <input type="hidden" name="order_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                                <input type="hidden" name="order_no" value="<?php echo "CA".date('YmdHis'); ?>">
                                                <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
                                                <input type="hidden" name="shipping" value="<?php echo $shipping; ?>">
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="checkout3.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>上一步</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">確定結帳<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">

                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>訂單總計</h3>
                        </div>
                        <p class="text-muted">購物滿1000免運費，只限台灣本島，離島需加上稅金與運費</p>

                        <div class="table-responsive">
                            <table class="table">
                            <tbody>    
                                    <tr>
                                        <td>總計</td>
                                        <th>$NT<?php echo $total_price; ?></th>
                                    </tr>
                                <?php if($total_price > 1000){ ?>
                                    <tr>
                                        <td>運費</td>
                                        <th>$NT<?php echo "$0" ?></th>
                                    </tr>
                                <?php }else{ ?>
                                    <tr>
                                        <td>運費</td>
                                        <th>$NT<?php echo $_SESSION['Receiver']['delivery']; ?></th>
                                    </tr>
                                <?php } ?>
                                <?php if($total_price >1000){ ?>   
                                    <tr class="total">
                                        <td>總金額</td>
                                        <th>$NT<?php echo $total_price?></th>
                                    </tr>
                                <?php }else{ ?>
                                    <tr class="total">
                                        <td>總金額</td>
                                        <th>$NT<?php echo $total_price + $_SESSION['Receiver']['delivery']; ?></th>
                                    </tr>
                                <?php } ?>   
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php require_once('template/footer.php'); ?>






</body>

</html>