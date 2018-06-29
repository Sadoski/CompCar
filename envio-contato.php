<?php
    require_once("class.phpmailer.php");
    require 'config/banco.php';
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto']; 
    $mensagem = $_POST['mensagem'];
    
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
         
         //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom("{$email}", "{$nome}"); //remetente e-mail
     $mail->AddReplyTo("{$email}", "{$nome}"); //remetente e-mail
     $mail->Subject = "{$assunto}";//Assunto do e-mail
 
 
     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress('jefferson_sadoski@hotmail.com', 'Teste Locaweb');
 
     //Campos abaixo são opcionais 
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
 
 
     //Define o corpo do email
     $mail->MsgHTML("{$mensagem}"); 
 
     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     //$mail->MsgHTML(file_get_contents('arquivo.html'));
 
     $mail->Send();
     echo "Mensagem enviada com sucesso</p>\n";
     
     require 'contato.php';
 
    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}