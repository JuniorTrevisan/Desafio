<?php
    
    /**
    * Exercicio 7
    * Created on 29/10/2020
    * @author Claudemir Trevisan
    * Controller para roteamento dos endpoints da API
    */
    
    require_once("ApiFactory.php");
            
    $view = "";
    if(isset($_GET["view"]))
        $view = $_GET["view"];

    switch($view){

        case "all":
            // redireciona REST Url /User/list/
            $ApiFactory = new ApiFactory();
            $ApiFactory->getAllUser();
            break;		
        case "single":
            // redireciona REST Url /User/show/<id>/
            $ApiFactory = new ApiFactory();
            $ApiFactory->getUser($_GET["id"]);
            break; 
        case "insert":
            // redireciona REST Url /User/insert/
            $ApiFactory = new ApiFactory();
            $ApiFactory->addUser($_POST["nome"],$_POST['sobrenome'],$_POST['email'],$_POST['telefone'],$_POST['login'],$_POST['senha']);
            break;	    
        case "delete":
            // redireciona REST Url /User/delete/<email>/
            $ApiFactory = new ApiFactory();
            $ApiFactory->delUser($_GET["email"]);
            break;       
        case "update":
            // redireciona REST Url /User/update/<id>/       
            $ApiFactory = new ApiFactory();
            $ApiFactory->upUser($_GET["id"],$_POST["nome"],$_POST['sobrenome'],$_POST['email'],$_POST['telefone'],$_POST['login'],$_POST['senha']);
            break;           
        case "" :
            //404 - not found;
            break;
    }
?>
