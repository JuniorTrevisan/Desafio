<?php
   
     /**
    * Exercicio 7
    * Created on 29/10/2020
    * @author Claudemir Trevisan
    * Classe Model User
    */
    
    error_reporting(0);
    ini_set('display_errors', 0 );
   
    Class User {
             
        public function __construct(){     
            $tlinha = 1;
            $arq = fopen('arquivo.txt', 'r');           
            while (!feof($arq)) { 
                $linha[$tlinha] = fgets($arq); 
                $tlinha++;
            }
            fclose($arq);
            $total = $tlinha - 1;
            for($ct=1;$ct<$total;$ct++){ 
                $item = explode("|", $linha[$ct]);                 
                $this->Users[$ct]['id'] = $item[0];
                $this->Users[$ct]['nome'] = $item[1]; 
                $this->Users[$ct]['sobrenome'] = $item[2];
                $this->Users[$ct]['email'] = $item[3];
                $this->Users[$ct]['telefone'] = $item[4];  
                $this->Users[$ct]['login'] = $item[5];
                $this->Users[$ct]['senha'] = $item[6];                  
            }    
        }
        
        /**
        * @author Claudemir Trevisan
        * Função para listar todos os usuários
        */
        public function getAllUser(){
            return $this->Users;
        }
        
        /**
         * @author Claudemir Trevisan
         * Função para listar um unico usuario pelo seu id
         * @param: $id       int  -  id do usuario.         
         */ 
        public function getUser($id){		
            $User = array($id => ($this->Users[$id]) ? $this->Users[$id] : $this->Users[1]);
            return $User;
        }
        
        /**
         * @author Claudemir Trevisan
         * Função para apagar um unico usuario pelo seu email
         * @param: $email       string  -  email do usuario.         
         */ 
        public function delUser($email){            
            $arq = fopen('arquivo.txt', 'r');           
            $ct_del = 0;
            $ct_lin = 1;
            $linha_del = 0;
            while (!feof($arq)) { 
                $linha[$ct_lin] = fgets($arq);
                $item = explode('|',$linha[$ct_lin]);                
                if($email == $item[3]) {              
                    $linha_del = $ct_lin;
                    $ct_del++;                            
                }
                $ct_lin++;
            }
            fclose($arq);
            
            unset($linha[$linha_del]);
            $arq2 = fopen("arquivo.txt", "w");
            
            foreach ($linha as $conteudo){
                fwrite($arq2, $conteudo);
            }
            fclose($arq2);

            if($ct_del > 0){
                echo 'Registro Excluido com Sucesso!';
            }else{                
                echo 'Nenhum Registro foi Excluido!';
            }      
        }
        
        /**
         * @author Claudemir Trevisan
         * Função para alterar um unico usuario pelo seu id
         * @param: $id       int  -  id do usuario.       
         * @param: $dados         obj       -   contendo : nome, sobrenome, email, telefone, login e senha do usuario
         */ 
        public function upUser($id,$dados){
            $array_dados = json_decode($dados);                  
            $data = $id . '|' . $array_dados->nome . '|' . $array_dados->sobrenome . '|' . $array_dados->email . '|' . $array_dados->telefone . '|' . $array_dados->login . '|' . md5($array_dados->senha) ."\n";
            $arq = fopen('arquivo.txt', 'r');        
            $ct_lin = 1;
            $ct_up = 0;    
            while (!feof($arq)) { 
                $linha[$ct_lin] = fgets($arq);
                $item = explode('|',$linha[$ct_lin]);                
                if($id == $item[0]) {                 
                    $linha[$ct_lin] = $data;
                    $ct_up++;                            
                }    
                $ct_lin++;
            }
            fclose($arq);
                                    
            $arq2 = fopen("arquivo.txt", "w");
            
            foreach ($linha as $conteudo){
                fwrite($arq2, $conteudo);
            }
            fclose($arq2);

            if($ct_up > 0){
                echo 'Registro Alterado com Sucesso!';
            }else{                
                echo 'Nenhum Registro foi Alterado!';
            }      
        }
        
        /**
         * @author Claudemir Trevisan
         * Função para inserir um novo usuario        
         * @param: $dados         obj       -   contendo : nome, sobrenome, email, telefone, login e senha do usuario  
         */ 
        public function addUser($dados){     
            $linhas = 0; 
            $arq = fopen('arquivo.txt', 'r'); 
            while (!feof($arq)) { 
                fgets($arq); 
                $linhas++; 
            }                   
            fclose($arq); 
            $array_dados = json_decode($dados);                  
            $data = $linhas . '|' . $array_dados->nome . '|' . $array_dados->sobrenome . '|' . $array_dados->email . '|' . $array_dados->telefone . '|' . $array_dados->login . '|' . md5($array_dados->senha) ."\n";    
            $arq2 = fopen("arquivo.txt", "a");                 
            fwrite($arq2,$data);
            fclose($arq2);            
            echo 'Registro Inserido com Sucesso!';             
        }
        
        
    }
?>