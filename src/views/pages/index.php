
<!DOCTYPE html>
<html>
    <head>
        <title>Laragon</title>
   
        <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
        <link href="<?=$base?>/css/home.css" rel="stylesheet" type="text/css">
        <link href="<?=$base?>/css/geral.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
 
        <div class="container">
            
            <div class="content">
             <img src="<?=$base?>/assets/logo.png" alt="logo" width="200" height="200"/>
                 <form method="post" action="<?=$base;?>/"> 
                     <div class="field">          
                     <input type="email" name="email" placeholder="Email" required/>
                     </div>

                    <div class="field">                   
                    <input type="password" name='password' placeholder="Senha"/>
                    </div>
                    
                    <div class="btnEntrar">
                    <input type="submit" value="Entrar"/>
                    </div>

                    <a class="link" href="<?=$base?>/novo">Não possui cadastro? Realize o cadastro</a>
                 
                 </form>
               
             
            </div>

        </div>
    </body>
</html>