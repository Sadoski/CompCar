<?php
    require_once("class.phpmailer.php");
    require 'config/banco.php';
    require 'Usuarios.php';


$email = $_POST['email'];


$usuario = new Usuarios();
$resultado = $usuario->recuperar($email);

if (count($resultado) == 0){

echo "Este email não está cadastrado em nosso banco de dados.<br /><br />";

require "senha-perdida.php";

exit();

}

// Se tudo OK vamos gerar uma nova senha e enviar para o email do usuário!

function makeRandomPassword(){

$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string

}

 
// Inicia a classe PHPMailer
$mail = new PHPMailer(true);
 
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
 
try {
     $mail->IsSMTP();        // Ativar SMTP
     $mail->SMTPDebug = false;       // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
     $mail->SMTPSecure = 'tls';
     $mail->Host = 'smtp.live.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
     $mail->Port       = 587; //  Usar 587 porta SMTP
     $mail->Username = ''; // Usuário do servidor SMTP (endereço de email)
     $mail->Password = ''; // Senha do servidor SMTP (senha do email usado)
     $mail->CharSet = "UTF-8";
     
    $senha_randomica = makeRandomPassword();
    
    $senha = md5($senha_randomica);
    $usuario->updateSenha($senha,$email);
    
     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom('jefferson_sadoski@hotmail.com', 'CompCar'); //Seu e-mail
     $mail->AddReplyTo('jefferson_sadoski@hotmail.com', 'CompCar'); //Seu e-mail
     $mail->Subject = 'Alteração de senha';//Assunto do e-mail
 
 
     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress("{$email}", 'Teste Locaweb');
 
     //Campos abaixo são opcionais 
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
 
 
     //Define o corpo do email
     $mail->MsgHTML("Olá, redefinimos sua senha.<br /><br />
    <strong>Nova Senha</strong>: {$senha_randomica}<br /><br />

    <a href='www.compcar.com.br/login.php'> CompCar</a><br /><br />
    Obrigado!<br /><br />
    Jedy<br /><br /><br />

    Esta é uma mensagem automática, por favor não responda! <br /><br /><br />"); 
 
     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     //$mail->MsgHTML(file_get_contents('arquivo.html'));
 
     $mail->Send();
     echo "Mensagem enviada com sucesso</p>\n";
     
     require 'login.php';
 
    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}

    
    


    