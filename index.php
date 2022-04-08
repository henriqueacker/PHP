
<!DOCTYPE html>
<html>
    <head>
        <title>Laragon</title>

        <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
        <link href="/Views/css/Home.css" rel="stylesheet" type="text/css">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Karla';
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                 <form method="POST" > 
                     <div class="field">          
                     <input type="email" name="email" placeholder="Email" required/>
                     </div>

                    <div class="field">                   
                    <input type="password" name='password' placeholder="Senha"/>
                    </div>
                    
                    <div class="btnEntrar">
                    <input type="submit" value="Entrar"/>
                    </div>
                 </form>
               
             
            </div>

        </div>
    </body>
</html>