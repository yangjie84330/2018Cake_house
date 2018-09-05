<?php

$fruit ="cherry";
switch($fruit){

    case "banana";

        $account = 100;

    break;

    case "apple";

        $account = 60 ;
    
    break;

    case "cherry";

        $account = 480 ;

    break;
    
    case "piapple";

        $account = 200;

    break;
    
    default;

    $account ="沒有賣這個水果";
    //全部都不符合執行這個
    break;
}

echo $fruit."價格=".$account."元<br><br>";

echo'<table width="100%" border="1"><tbody><tr>';
    

for($i=1; $i<=100; $i++){
    echo "<td>獅子跳火圈，第".$i."圈</td>";
    if($i %5 == 0){
        echo "</tr><tr>";
    }   
}
echo"</tbody></table><br>";

for($j=1; $j<=9; $j++){
 for($k=1; $k<=9;$k++){

    echo $j."*".$k."=".$j * $k."" ;
 }
 echo "<BR>";
}
?>