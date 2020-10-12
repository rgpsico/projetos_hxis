<?php

$baseDir = 'uploads/';
$abreDir = ($_GET['dir'] != '' ? $_GET['dir'] : $baseDir);
$openDir = dir($abreDir);


echo '<table width="500" border="1" cellspacing="0" cellpadding="5">';
while($arq = $openDir->read()):

	if($arq != '.' && $arq != '..'):
		if(is_dir($abreDir.$arq)){
echo'<tr>';
echo'<td>'.$arq.'</td>';
echo'<td>a href=navegacao.php?dir='.$abreDir.$arq.'>Abrir</a></td>';
echo'</tr>';

		}else{
echo'<tr>';
echo'<td>'.$arq.'</td>';
echo'<td>'.$arq.'</td>';
echo'<td>a href='.$abreDir.$arq.'>Abrir</a></td>';
echo'</tr>';

}
endif;
endwhile;
echo "</table>";
$openDir->close();
?>