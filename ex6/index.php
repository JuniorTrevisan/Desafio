    
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <title>Criar Formulário via classe - Exercicio 6</title>
            <?php include_once('formulario.class.php');?> 
        </head>     
        <body>
            <form method="post" action="">
                <?php $formulario = new formulario(); 
                    if(!isset($_POST['nome']))$_POST['nome'] = "";
                    if(!isset($_POST['sobrenome']))$_POST['sobrenome'] = "";
                    if(!isset($_POST['sexo']))$_POST['sexo'] = "";
                    if(!isset($_POST['email']))$_POST['email'] = "";
                    if(!isset($_POST['telefone']))$_POST['telefone'] = "";
                    if(!isset($_POST['login']))$_POST['login'] = "";
                    if(!isset($_POST['senha']))$_POST['senha'] = "";
                ?>
                
                <h2>Formulário construído através da classe formulario</h2>       
                <p>Nome: <?php echo $formulario->inputText('nome',$_POST['nome'],'text');?></p>
                <p>Sobrenome: <?php echo $formulario->inputText('sobrenome',$_POST['sobrenome'],'text');?></p>
                <p>E-mail: <?php echo $formulario->inputText('email',$_POST['email'],'email');?></p>
                <p>Sexo: <?php echo $formulario->inputSelect('sexo',array('M'=>'Masculino','F'=>'Feminino'),$_POST['sexo']);?></p>
                <p>Telefone: <?php echo $formulario->inputText('telefone',$_POST['telefone'],'text');?></p>
                <p>Login: <?php echo $formulario->inputText('login',$_POST['login'],'text');?></p>
                <p>Senha: <?php echo $formulario->inputText('senha',$_POST['senha'],'password');?></p>                
                <input type="submit" value="Registrar" />
            </form>

            <?php
            echo "<p>Saída após o Registro:</p>";            
            if(is_array($_POST)){
                print"<pre>";
                    print_r($_POST);
                print "</pre>";
            }?>
        </body>
    </html>