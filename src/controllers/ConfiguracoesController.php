<?php
namespace src\controllers;

use \core\Controller;
use src\models\Usuario;
use src\handlers\UsuarioHandler;
use src\handlers\PostHandler;


class ConfiguracoesController extends Controller {

    private $loggedUser;

    public function __construct(){
        $this->loggedUser  = UsuarioHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
        
    }

    public function index() {
       

        $user = UsuarioHandler::getUsuario($this->loggedUser->getId());

        $message = '';
        if(!empty($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $_SESSION['message'] = '';
        }

        $this->render('config', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'message' => $message
        ]);
    }
    public function save(){
        $nome =filter_input(INPUT_POST, 'nome');
        $dtNascimento = filter_input(INPUT_POST, 'dt_nascimento');
        $cidade = filter_input(INPUT_POST, 'cidade');
        $password = filter_input(INPUT_POST, 'password');
        $passwordConfirm = filter_input(INPUT_POST, 'passwordconfirm');
        
        //Valida o nome
        if(empty($nome)){
            $_SESSION['message'] = 'Nome deve ser preenchido';
            $this->redirect('/configuracoes');
        }

        //Validando as datas
        $dtNascimento = explode('/', $dtNascimento);
        if(count($dtNascimento) != 3) {
            $_SESSION['message'] = 'Data de nascimento inválida!';
            $this->redirect('/configuracoes');
        }
        $birthdate = $dtNascimento[2].'-'.$dtNascimento[1].'-'.$dtNascimento[0];
        if(strtotime($birthdate) === false) {
            $_SESSION['message'] = 'Data de nascimento inválida!';
            $this->redirect('/configuracoes');
        }

        if(!empty($password)){
            if($password != $passwordConfirm){
                $_SESSION['message'] = 'As senhas não conferem';
                 $newPassword = password_hash($password , PASSWORD_DEFAULT);
                UsuarioHandler::alterarSenha($newPassword, $this->loggedUser->getId());
                $this->redirect('/configuracoes');
            }
        }
       
   

        $usuario  = new Usuario();
        $usuario->setId($this->loggedUser->getId());
        $usuario->setNome($nome);
        $usuario->setDtnascimento($birthdate);
        $usuario->setCidade($cidade);
        $usuario->setSenha($password);
        $usuario->setAvatar($this->loggedUser->getAvatar());
        $usuario->setCapa($this->loggedUser->getCapa());
        
        //Atualizando o Avatar
        if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name'])){
            $newAvatar = $_FILES['avatar'];
            $extensoesAceitas = ['image/jpeg', 'image/jpg', 'image/png'];

            if(in_array($newAvatar['type'],$extensoesAceitas)){
                $avatarName = $this->cutImage($newAvatar,200,200,'assets');
                $usuario->setAvatar($avatarName);
            }
        }
        //Atualizando a Capa
        if(isset($_FILES['capa']) && !empty($_FILES['capa']['tmp_name'])){
            $newCapa= $_FILES['capa'];
            $extensoesAceitas = ['image/jpeg', 'image/jpg', 'image/png'];

            if(in_array($newCapa['type'],$extensoesAceitas)){
                $newCapa = $this->cutImage($newCapa,850,310,'assets');
                $usuario->setCapa($newCapa);
            }
        }

        $update = UsuarioHandler::UpdateDados($usuario);

        if($update){
            $_SESSION['message'] = 'Dados Salvos com sucesso!';
            // $this->redirect('/configuracoes');
        }
        $this->redirect('/configuracoes');
        
    }
    private function cutImage($file, $width, $height, $folder){
        //Esse método recebe a imagem, manipula e redimensiona ela, salva e retorna o caminho da imagem para ser armazenado no banco
        list($widthOrig, $heightOrig) = getimagesize($file['tmp_name']); //Pegando as dimensões do arquivo original
        $ratio = $widthOrig / $heightOrig; //Tamanho original
        $newWidth = $width; //Nova largura
        $newHeight = $newWidth / $ratio; //Nova altura
        //Verificando se a imagem tem o mínimo de altura que foi definido
        if ($newHeight < $height) {
            $newHeight = $height;
            $newWidth = $newHeight * $ratio;
        }
        //Calculando x e y para que possamos cortar a imagem
        $x = $width - $newWidth; 
        $y = $height - $newHeight;
        $x = $x < 0 ? $x / 2 : $x;
        $y = $y < 0 ? $y / 2 : $y;
        //Fim do cálculo
        $finalImage = imagecreatetruecolor($width, $height); // Criando a imagem final
        switch ($file['type']) {
            case 'image/jpeg':
             $image = imagecreatefromjpeg($file['tmp_name']); //Imagem inicial
             break;
            case 'image/jpg':
                $image = imagecreatefromjpeg($file['tmp_name']); //Imagem inicial
                break;
            case 'image/png':
                $image = imagecreatefrompng($file['tmp_name']); //Imagem inicial
                break;
        }
        imagecopyresampled(
            $finalImage, //Imagem final
            $image, //Imagem final
            $x, //Posição
            $y, //Posição
            0, //Posição imagem original
            0, //Posição imagem original
            $newWidth, //Nova largura
            $newHeight, //Nova altura
            $widthOrig, //Antiga largura
            $heightOrig //Antiga altura
        );
        $fileName = md5(time().rand(0, 9999)).'.jpg'; //Gerando um nome para imagem
        imagejpeg($finalImage, $folder . '/' . $fileName); //Salvando a imagem no servidor
        //Retorna o caminho (nome) do arquivo
        return $fileName;
    }
    
}

