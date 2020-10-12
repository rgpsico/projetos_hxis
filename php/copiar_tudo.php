<?php 



function copia_ficheiros_saida($origem, $destino){
    //O nome das pastas tem de terminar em "/" ou ""(win).
    if (is_dir($origem)) {
        if (is_dir($destino)) {
            $i = 0;
            if ($dir = opendir($origem)) {
                while (($ficheiro = readdir($dir)) !== false) {                  
     
              
             $arquivo =  $origem.$ficheiro;
        
      
                copy($arquivo, $destino.$ficheiro);
                 //echo "Copiado com Sucesso ";
             
                  //}   
              }  
         
       }//endwhile    
   
             closedir($dir);      
             
            }else{
          echo "A pasta DESTINO ".$destino." não existe.";
        }
    }else{
      echo "A pasta  ORIGEM".$origem." não existe.";
    }
}

$origem =  "uploads/";
$destino = "uploads/destino/";
copia_ficheiros_saida($origem, $destino);
?>