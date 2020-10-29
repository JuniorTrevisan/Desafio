<?php

    /**
    * Exercicio 4
    * Created on 28/10/2020
    * @author Claudemir Trevisan
    * Formulario de Registros que popula o arquivo registros.txt
    * Validações de dados como E-mail e Login
    */
    
    if(isset($_POST['senderNome']) && isset($_POST['senderSobrenome']) && isset($_POST['senderEmail']) && isset($_POST['senderTelefone']) && isset($_POST['senderLogin']) && isset($_POST['senderSenha'])) {
        if(strpos(file_get_contents("registros.txt"),$_POST['senderEmail']) !== false) {
            echo 'Registro não Salvo! - E-mail enviado ja está Cadastrado!';
        }else{
            if(strpos(file_get_contents("registros.txt"),$_POST['senderLogin']) !== false) {
                echo 'Registro não Salvo! - Login enviado ja está Cadastrado!';
            }else{
                //Contar linhas
                $linhas = 0; 
                $arq = fopen('registros.txt', 'r'); 
                while (!feof($arq)) { 
                    fgets($arq); 
                    $linhas++; 
                }
                fclose($arq);
                
                $data = $linhas . '|' . $_POST['senderNome'] . '|' . $_POST['senderSobrenome'] . '|' . $_POST['senderEmail'] . '|' . $_POST['senderTelefone'] . '|' . $_POST['senderLogin'] . '|' . md5($_POST['senderSenha']) ."\n";
                $ret = file_put_contents('registros.txt', $data, FILE_APPEND | LOCK_EX);
                if($ret === false) {
                    echo 'Registro não Salvo! - Houve um erro na hora de reescrever o arquivo';
                } else {
                    echo "Registro Salvo com Sucesso!";
                }
            }            
        }        
    }
    else {
       echo 'Registro não Salvo! - Sem dados para processar';
    }

?>