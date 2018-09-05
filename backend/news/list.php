<?php 
require_once('../function/login_check.php');
require('../../connection/connection.php');
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
          <h1 class="">最新消息管理</h1>
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
            <li class="breadcrumb-item active">最新消息管理</li>
          </ul>
          <a href="create.php" class="btn btn-outline-primary m-2">新增</a>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
        <?php if($totalrows > 0){ ?>
          <table class="table">
            <thead>
              <tr>
                <th>發佈日期</th>
                <th>標題</th>
                <th>內容</th>
                <th width="15%">操作</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $news){?>
              <tr>
                <td><?php echo $news['published_date'];?></td>
                <td><?php echo $news['title'];?></td>
                <td><?php echo mb_strimwidth(strip_tags($news['content']),0,100,"...");?></td>
                <td>
                  <a href="edit.php?news_id=<?php echo $news['news_id'];?>" class="btn btn-outline-primary">編輯</a>
                  <a href="delete.php?news_id=<?php echo $news['news_id'];?>" class="btn btn-outline-primary" onclick="if(!confirm('是否確定刪除此筆資料?刪除後無法回復')){return false;};">刪除</a>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        <?php } else {?>
               <p>
              目前無資料，請新增一筆。
              </p>
        <?php }?>
        </div>
      </div>
      <?php  if($totalrows > 0){
            $sth = $db->query("SELECT * FROM news ORDER BY published_date DESC ");
            $data_count = count($sth ->fetchAll(PDO::FETCH_ASSOC));
            $total_pages = ceil($data_count / $limit);//無條件進位
           ?>
      <div class="row">
        <div class="col-md-12">
          <ul class="pagination">
          <?php   if($page > 1){ ?>
            <li class="page-item">
             <!-- 頁數超過一 上一頁可連結 -->
              <a class="page-link" href="list.php?page=<?php echo $page-1;?>">
                <span>«</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?php }else{ ?>
            <!-- 頁數沒超過 1 上一頁按鈕不可做連結 -->
              <li>
                <a  class="page-link" href="#">«</a>
              </li>
              <?php } ?>
            <?php for ($i=1; $i<=$total_pages; $i++) { ?>
            <li class="page-item">
              <a class="page-link" href="list.php?page=<?php echo $i;?>"><?php echo $i;?></a>
              </li>
            <?php }?>
            <?php if($page < $total_pages){ ?>
            <li class="page-item">
              <a class="page-link" href="list.php?page=<?php echo $page+1;?>">
                <span>»</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
              <?php }else{ ?>
                <li>
                  <a class="page-link" href="#">»</a>
                </li>
                <?php } ?>
          </ul>
        </div>
      </div>
    <?php }?>
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