<?php 
    /**
    * Exercicio 7
    * Created on 29/10/2020
    * @author Claudemir Trevisan
    * Classe SimpleRest para status do servico
    */
    class SimpleRest {
        
        private $httpVersion = "HTTP/1.1";

        public function setHttpHeaders($contentType, $statusCode){
            
            $statusMessage = $this -> getHttpStatusMessage($statusCode);
            
            header($this->httpVersion. " ". $statusCode ." ". $statusMessage);		
            header("Content-Type:". $contentType);
        }
        
        public function getHttpStatusMessage($statusCode){
            $httpStatus = array(                
                200 => 'OK',                
                400 => 'Erro',  
                401 => 'Nao Autorizado',               
                404 => 'Nao Encontrado'
                );
            return ($httpStatus[$statusCode]) ? $httpStatus[$statusCode] : $status[500];
        }
    }
?>