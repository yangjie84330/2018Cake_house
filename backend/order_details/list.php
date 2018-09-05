<?php
require_once('../function/login_check.php');
require('../../connection/connection.php');

$query = $db->query("SELECT * FROM order_details WHERE customer_orders_id=".$_GET['customer_orders_id']);
$data = $query->fetchAll(PDO::FETCH_ASSOC);
$query2 = $db->query("SELECT * FROM customer_orders WHERE customer_orders_id=".$_GET['customer_orders_id']);
$customer_orders = $query2->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/theme.css" type="text/css"> </head>

<body>
<?php require_once('../function/backend_nav.php');?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class=""><?php echo $customer_orders['order_no'];?>訂單明細</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-left">
          <ul class="breadcrumb" style="margin-bottom: 0px; margin-top: 0px;">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $customer_orders['order_no'];?></li>
            <li class="breadcrumb-item active">訂單明細</li>
          </ul>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>產品照片</th>
                <th>產品名稱</th>
                <th>價錢</th>  
                <th>數量</th>
                <th>小計</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $order_details){?>
              <tr>
              <td><img src="../../uploads/products/<?php echo $order_details['picture'];?>" alt="" width="200"></td>        
                <td><?php echo $order_details['name'];?></td>
                <td><?php echo $order_details['price'];?></td>
                <td><?php echo $order_details['quantity'];?></td>
                <td><?php echo $order_details['price'] * $order_details['quantity'];?></td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12"> </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#">
                <span>«</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                <span>»</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 MacroViz - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>