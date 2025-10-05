<?php
  
  if(isset($_POST['url']) && strlen($_POST['url']) == '0' ) {

    //1 – Definimos Para quem vai ser enviado o email
    $para = "contato.brunopessanha@gmail.com";
    
    //2 - resgatar o nome digitado no formulário e grava na variavel $nome
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    
    // 3 - resgatar o assunto digitado no formulário e  grava na variavel //$assunto
    $assunto = 'Mensagem do Formulário de contato SIMPLES Diário Completo';
    
    //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
    $data      = date('d/m/Y H:i');
    $mensagem .= "<br> <strong>Nome:  </strong>".$_POST['nome'];
    $mensagem .= "<br> <strong>E-mail:  </strong>".$_POST['email'];
    $mensagem .= "<br> <strong>Telefone:  </strong>".$_POST['telefone'];
    $mensagem .= "<br> <strong>Sexo:  </strong>".$_POST['sexo'];
    $mensagem .= "<br> <strong>Quero aprender a fazer:  </strong>".$_POST['aprender'];
    $mensagem .= "<br> <strong>Enviado em:  </strong>".$data;
    $mensagem .= "<br> <strong>Mensagem: </strong>".$_POST['mensagem'];

  //5 – agora inserimos as codificações corretas e  tudo mais.
    $headers =  "Content-Type:text/html; charset=UTF-8\n";
    $headers .= "From:  Mensagem do site Diário Completo <contato.brunopessanha@gmail.com>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
    $headers .= "X-Sender:  <contato.brunopessanha@gmail.com>\n"; //email do servidor //que enviou
    $headers .= "X-Mailer: PHP  v".phpversion()."\n";
    $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
    $headers .= "Return-Path:  <contato.brunopessanha@gmail.com>\n"; //caso a msg //seja respondida vai para  este email.
    $headers .= "Reply-To: ".$email."\n";
    $headers .= "MIME-Version: 1.0\n";

    mail($para, $assunto, $mensagem, $headers);  //função que faz o envio do email.

    echo '
            <div style="max-width:320px; padding:50px; border:3px solid #007cff; color:#007cff; font-family: tahoma; background:#E9F8FB; text-align:center; font-weight:800; margin:180px auto;">
           
              <p style="font-size:1.3em;">'.$nome.', obrigado!</p> 
              <p style="font-size:1.1em;">Sua mensagem enviada com sucesso !</p>
            
            </div>
          ';

    echo    '<meta HTTP-EQUIV="Refresh" CONTENT="5;URL=index.html">';

    exit; 

  }//Fecha verifica se é url vazia

?>