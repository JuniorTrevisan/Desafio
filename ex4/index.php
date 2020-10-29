    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8"/>
            <title>Formulário - Exercicio 4 </title>       
            <script type="text/javascript" src="js/jquery.js"></script>        
        </head>
        <body>
            <h2>Formulário</h2>       
                <p>Nome: <input type="text" name="nome" id="nome"></p>
                <p>Sobrenome: <input type="text" name="sobrenome" id="sobrenome"></p>
                <p>E-mail: <input type="email" name="email" id="email"></p>
                <p>Telefone: <input type="text" name="telefone" id="telefone"></p>
                <p>Login: <input type="text" name="login" id="login"></p>
                <p>Senha: <input type="password" name="senha" placeholder="Digite sua Senha" id="senha"></p>
                <button id="Registrar">Registrar</button>       
        </body>
        <script>
            function validateEmail(email) {	 
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;	  
                return re.test(email);	
            }
            
            function validPhone(phone) {
                var regex = new RegExp('^\\(((1[1-9])|([2-9][0-9]))\\)((3[0-9]{3}-[0-9]{4})|(9[0-9]{3}-[0-9]{5}))$');
                return regex.test(phone);
            }

            $("#Registrar").click(function(){
                var varNome = $("#nome").val();
                var varSobrenome = $("#sobrenome").val();
                var varEmail = $("#email").val();
                var varTelefone = $("#telefone").val();
                var varLogin = $("#login").val();
                var varSenha = $("#senha").val();
                            
                if((varNome == '') || (varSobrenome == '') || (varEmail == '') || (varTelefone == '') || (varSenha == '') || (varLogin == '')){			
                    alert('Favor preencher todos os dados!');						
                }else{				
                    if (validPhone(varTelefone)){
                        if (validateEmail(varEmail)) {			
                            //Registrar
                            $.ajax({					
                                type: 'post',					
                                cache: false,
                                data: {
                                    senderNome:varNome,senderSobrenome:varSobrenome,senderEmail:varEmail,senderSenha:varSenha,senderLogin:varLogin,senderTelefone:varTelefone				
                                },
                                url:'registro.php',					
                                success: function(retorno){	
                                    alert(retorno);
                                },
                                error: function (retorno) {
                                    alert('Registro Não efetuado!');	
                                }	
                            });	              
                        }else{				
                            alert('Favor informar um e-mail de retorno válido!');
                        }	
                    }else{
                        alert('Favor digitar um telefone válido (XX)3XXX-XXXX (Fixo) ou (XX)9XXX-XXXXX (Celular)!');
                    }		
                }
            });    
        </script>        
    </html>

