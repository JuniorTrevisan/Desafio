<?php
    
    /**
    * Exercicio 7
    * Created on 29/10/2020
    * @author Claudemir Trevisan
    * Classe Factory ApiFactory para manipulação de endpoints
    */  
    
    require_once("SimpleRest.php");
    require_once("User.php");
           
      
    class ApiFactory extends SimpleRest {

        /**
        * @author Claudemir Trevisan
        * Função para listar todos os usuários
        */
        function getAllUser() {
            $User = new User();
            $rawData = $User->getAllUser();

            if(empty($rawData)) {
                $statusCode = 404;
                $rawData = array('error' => 'Nenhum Usuario Encontrado!');		
            } else {
                $statusCode = 200;
            }

            $requestContentType = @$_SERVER['HTTP_ACCEPT'];
            $this->setHttpHeaders($requestContentType, $statusCode);
                    
            if(strpos($requestContentType,'application/json') !== false){
                $response = $this->encodeJson($rawData);
                echo $response;
            } else if(strpos($requestContentType,'text/html') !== false){
                $response = $this->encodeHtml($rawData);
                echo $response;
            } else if(strpos($requestContentType,'application/xml') !== false){
                $response = $this->encodeXml($rawData);
                echo $response;
            }
        }
               
        /**
        * @author Claudemir Trevisan
        * Função para parse html
        */
        public function encodeHtml($responseData) {        
            $htmlResponse = "<table border='1'>";
            foreach($responseData as $key=>$value) {
                    $htmlResponse .= "<tr><td>". $key. "</td><td>". $value. "</td></tr>";
            }
            $htmlResponse .= "</table>";
            return $htmlResponse;		
        }
        
        /**
        * @author Claudemir Trevisan
        * Função para parse json
        */
        public function encodeJson($responseData) {
            $jsonResponse = json_encode($responseData);
            return $jsonResponse;		
        }
        
        /**
        * @author Claudemir Trevisan
        * Função para parse xml
        */
        public function encodeXml($responseData) {            
            $xml = new SimpleXMLElement('<?xml version="1.0"?><User></User>');
            foreach($responseData as $key=>$value) {
                $xml->addChild($key, $value);
            }
            return $xml->asXML();
        }
        
        /**
         * @author Claudemir Trevisan
         * Função para listar um unico usuario pelo seu id
         * @param: $id       int  -  id do usuario.         
         */ 
        public function getUser($id) {
            $User = new User();
            $rawData = $User->getUser($id);

            if(empty($rawData)) {
                $statusCode = 404;
                $rawData = array('error' => 'Usuario nao Encontrado!');		
            } else {
                $statusCode = 200;
            }

            $requestContentType = @$_SERVER['HTTP_ACCEPT'];
            $this ->setHttpHeaders($requestContentType, $statusCode);
                    
            if(strpos($requestContentType,'application/json') !== false){
                $response = $this->encodeJson($rawData);
                echo $response;
            } else if(strpos($requestContentType,'text/html') !== false){
                $response = $this->encodeHtml($rawData);
                echo $response;
            } else if(strpos($requestContentType,'application/xml') !== false){
                $response = $this->encodeXml($rawData);
                echo $response;
            }
        }
        
        /**
         * @author Claudemir Trevisan
         * Função para apagar um unico usuario pelo seu email
         * @param: $email       string  -  email do usuario.         
         */ 
        public function delUser($email) {
            $User = new User();
            $rawData = $User->delUser($email);

            if(empty($rawData)) {
                $statusCode = 404;
                $rawData = array('error' => 'Usuario nao Encontrado!');		
            } else {
                $statusCode = 200;
            }
        }    
        
        /**
         * @author Claudemir Trevisan
         * Função para alterar um unico usuario pelo seu id
         * @param: $id            int       -   id do usuario
         * @param: $nome          string    -   nome do usuario.
         * @param: $sobrenome     string    -   sobrenome do usuario
         * @param: $email         string    -   email do usuario.
         * @param: $telefone      string    -   telefone do usuario
         * @param: $login         string    -   login do usuario.
         * @param: $senha         string    -   senha do usuario
         */ 
        public function upUser($id,$nome,$sobrenome,$email,$telefone,$login,$senha) {        
            $User = new User();
            $rawData = $User->upUser($id,$nome,$sobrenome,$email,$telefone,$login,$senha);

            if(empty($rawData)) {
                $statusCode = 404;
                $rawData = array('error' => 'Usuario nao Encontrado!');		
            } else {
                $statusCode = 200;
            }           
        } 

        /**
         * @author Claudemir Trevisan
         * Função para inserir um novo usuario        
         * @param: $nome          string    -   nome do usuario.
         * @param: $sobrenome     string    -   sobrenome do usuario
         * @param: $email         string    -   email do usuario.
         * @param: $telefone      string    -   telefone do usuario
         * @param: $login         string    -   login do usuario.
         * @param: $senha         string    -   senha do usuario
         */ 
        function addUser($nome,$sobrenome,$email,$telefone,$login,$senha) {
            $User = new User();
            $rawData = $User->addUser($nome,$sobrenome,$email,$telefone,$login,$senha);

            if(empty($rawData)) {
                $statusCode = 404;
                $rawData = array('error' => 'Nenhum Usuario Encontrado!');		
            } else {
                $statusCode = 200;
            }            
        }    
        
    }
?>