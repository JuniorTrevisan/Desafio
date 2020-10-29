
<?php
    
    /**
    * Exercicio 3
    * Created on 27/10/2020
    * @author Claudemir Trevisan
    * Determinar extensão de 3 arquivos exemplos
    * Function : uploadArquivos()
    * Lista Ordenada de resultados usando função asort() do PHP
    */
    
    function uploadArquivo($arquivo){        
        return pathinfo($arquivo , PATHINFO_EXTENSION);
    }

    $arq[0] = 'music.mp4';
    $arq[1] = 'video.mov';
    $arq[2] = 'imagem.jpeg';

    echo "Lista de entrada arquivos:";
    echo "<ul>";
    $ct = 0;
    foreach ($arq as $val) {
        $path_info[$ct] = uploadArquivo($arq[$ct]);
        echo "<li> ".$val."</li>";
        $ct++;
    }
    echo "</ul>";

    asort($path_info);

    echo "Lista de saída esperada dos arquivos em ordem alfabética:";
    echo "<ul>";
    foreach ($path_info as $val) {
        echo "<li> .".$val."</li>";
    }
    echo "</ul>";

?>

