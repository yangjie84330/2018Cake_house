<?php
$frulit1 = array("柳橙","香蕉","奇異果","草莓","橘子");
$frulits = array("apple"=>"蘋果","watermelon"=>"西瓜","peach"=>"水蜜桃","cherry"=>"櫻桃","cantaloupe"=>"哈密瓜");
echo $frulits["apple"]."<br>";
print_r($frulits);

echo"<hr>";
for($i=0; $i<count($frulit1);$i++){
    echo $frulit1[$i]."<br>";
}
echo"<hr>";

foreach($frulit1 as $one){
    echo $one."<br>";
}

$a = array(1, 2, 3, 17);

foreach ($a as $v) {
   echo  "Current value of \$a: $v.\n" ;
}
?>