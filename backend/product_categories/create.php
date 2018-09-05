<?php
require_once('../function/login_check.php'); 
require('../../connection/connection.php');?>
<?php 
if(isset($_POST['AddFrom']) && $_POST['AddFrom'] == "INSERT"){
  $sql= "INSERT INTO product_categories (category,created_at) VALUES (:category,:created_at)";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":category", $_POST['category'], PDO::PARAM_STR);
  $sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
  $sth ->execute();

  header('Location: list.php');}
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../../js/jquery-ui-1.12.1/jquery-ui.min.css" type="text/css">
  <link rel="stylesheet" href="../css/theme.css" type="text/css">  
</head>
<body>
  <?php require_once('../function/backend_nav.php');?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">產品分類管理</h1>
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
              <a href="#">主控台</a>
            </li>
            <li class="breadcrumb-item">產品分類管理</li>
            <li class="breadcrumb-item active">新增</li>
          </ul>
          <a href="list.php" class="btn btn-outline-primary m-2">回上一頁</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" action="create.php" method="post"> 
            
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label">產品分類</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="category">
              </div>
            </div>
            
            <div class="col-md-12 text-right">
              <a href="list.php" class="btn btn-primary">取消並回上一頁</a>
              <button type="submit" class="btn btn-primary">確認送出</button>
              <input type="hidden" name="created_at" value="<?php date('Y-m-d H-i-s'); ?>">
              <input type="hidden" name="AddFrom" value="INSERT" >
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12"> </div>
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
  <script src="../../js/jquery.js"></script>
  <script src="../../js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
  <script>
  $(function(){
    $("#published_date").datepicker({
      dateFormat: "yy-mm-dd"
    });
  } );
  </script>
</body>

</html>