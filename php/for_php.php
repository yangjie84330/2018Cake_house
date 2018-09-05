<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table width="100%" border="1">
  <tbody>
    <tr>
    <?php for($i=1; $i<=100; $i++){?>  
      <td>獅子跳火圈，第<?php echo $i?>圈</td>
      <?php if($i % 5 ==0){
          echo "</tr><tr>";
      }
    }//end for?>
  </tbody>
</table>

<table width="100%" border="1">
  <tbody>
    <tr>
    <?php for($j=1; $j<=9; $j++){
        for($k=1; $k<=9; $k++){?>  
      <td><?php echo $j."*".$k."=".$j*$k; ?></td>
      <?php} //end for j?>
        </tr>
    <?php}//end fork?>
  </tbody>
</table>
</body>
</html>
