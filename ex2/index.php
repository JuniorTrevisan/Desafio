<?php

    /**
    * Exercicio 2
    * Created on 27/10/2020
    * @author Claudemir Trevisan
    * Joãozinho vai morder o seu dedo 50% das vezes 
    * Function : foiMordido()
    * Tentativas
    */
    
    function foiMordido(){        
        return rand(false,true); 
    }
    
    echo "Joãozinho vai morder seu dedo? <br>";
    for($ct=1;$ct<=10;$ct++){        
        if(foiMordido() == true){
            $frase = 'Joãozinho mordeu seu dedo!';
        }else{
            $frase = 'Joãozinho NÃO mordeu seu dedo!';
        }
        echo "Tentativa ".$ct." = ".$frase."<br>";
    }
?>