<?php

    /**
    * Exercicio 6
    * Created on 28/10/2020
    * @author Claudemir Trevisan
    * Classe para criação de componentes para formulários 
    */
    
    class formulario{
     
        function formulario() {
         
        }
     
        /**
         * @author Claudemir Trevisan
         * @param: $nome     string  -   nome do campo.
         * @param: $valor    string  -   valor digitado ou valor encontrado através da busca.
         * @param: $tipo     string  -   tipo do input (text,email ou password).
         */ 
         
        function inputText($nome,$valor,$tipo) {
            return "<input type='$tipo' id='$nome' name='$nome' value='$valor' />";
        }
         
        /**
         * @author Claudemir Trevisan
         * @param: $nome                -   nome do campo.
         * @param: $valores             -   array de valores; esse por sua vez deve ser unidimensional.
         * @param: $selecionado         -   opção que retorna o valor atual gravado no banco.
         */ 
         
        function inputSelect($nome,$valores,$selecionado=null) {
            $select = "";
            foreach($valores as $key=>$valor){
                if($key == $selecionado){ 
                    $select .="<option value='$key' selected='selected' >".$valor."</option>";
                }else{                     
                    $select .="<option value='$key' >".$valor."</option>";
                }    
            }
         
            $select = " <select id='$nome' name='$nome'>$select</select>";
         
            return  $select;
         
        }
    }

?>