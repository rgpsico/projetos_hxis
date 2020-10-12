


<?php 
echo "<script>";
echo "
let pizzaJson = [
  "; 
$read = new Read();
$read->ExeRead('ws_posts');
if($read){
	foreach ($read->getResult() as $key => $value) {
	extract($value);

echo   $obj = "                         
    {id:".$post_id.", name:'".$post_name."', img:'".HOME.'uploads/'.$post_cover."', price:20.19, sizes:['100g', '530g', '860g'], description:'Descrição da pizza em mais de uma linha muito legal bem interessante'},

";







	}
 $ul ="{id:".$post_id.", name:'', img:'', price:20.19, sizes:['100g', '530g', '860g'], description:''}";

echo "];";
echo "</script>";
}


?>
