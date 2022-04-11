
<!DOCTYPE html>
<html>
    <head>
        <title>Laragon</title>
   
        <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
        <link href="../css/home.css" rel="stylesheet" type="text/css">
        <style>
            html, body {
                height: 100%;
            }
            
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

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
                background-color: #c3c3c3;
            }

            .content {
                text-align: center;
                display: inline-block;
            }
            .field{
                margin: 5px;
                padding: 5px;
            }
            .field input{
                border-radius: 5px;
                font-size: 20px;
            }
            .btnEntrar input{
                font-size: 20px;
                height: 30px;
                width: 100px;
                border-radius: 5px;
            }
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Karla';
            }

            a{
                text-decoration: none;
            }
            a:hover{
                color: white;
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
                    <input type="submit" value="Cadastrar"/>
                    </div>

                    <a style="color:black" href="<?=$base?>/">Fazer login</a>
               
                 </form>
               
             
            </div>

        </div>
    </body>
</html>