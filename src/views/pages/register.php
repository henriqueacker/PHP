
<!DOCTYPE html>
<html>
    <head>
        <title>Community X</title>
   
        <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
        <link href="<?=$base?>/css/register.css" rel="stylesheet" type="text/css">
        <link href="<?=$base?>/css/geral.css" rel="stylesheet" type="text/css">
    <body>
        <div class="container">
            <div class="content">
            <img src="<?=$base?>/assets/logo.png" alt="logo" width="200" height="200"/>
            
            <div class="message">
                <?php if(!empty($message)): ?>
                    <?php echo $message ?>
                <?php endif;?>
            </div>

             <form method="post" action="<?=$base;?>/cadastro"> 
                
             
                    <div class="field">                   
                    <input type="text" name='nome' placeholder="Nome"/>
                    </div>

                     <div class="field">          
                     <input type="email" name="email" placeholder="Email" required/>
                     </div>

                    <div class="field">                   
                    <input type="password" name='password' placeholder="Senha"/>
                    </div>
                    
                  
                    <div class="btnEntrar">
                    <input type="submit" value="Cadastrar"/>
                    </div>

                    <a class="link" href="<?=$base?>/login">Já possui conta? Faça o login!</a>
               
                 </form>
               
             
            </div>

        </div>
    </body>
</html>