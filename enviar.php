
<?php
include('includes/config.php');
include('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$post = filter_input_array(INPUT_POST);


$nome = $post['nome'];
$email = $post['email'];
$tel = $post['tel'];
$contato = $post['contato'];
$tipoEvento = $post['eventos'];
$data = $post['data'];
$convidados = $post['convidados'];
$mensagem = $post['mensagem'];

$body = "<body style='font-family: Arial, sans-serif; line-height: 1.6; width:100%; max-widht:980px'>
<div style='margin: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9; width:100%; max-widht:980px'>
    <div style='margin-bottom: 20px;'>
        <h1>Mensagem do Formulário de Contato</h1>
    </div>
    <p><strong>Nome:</strong> $nome;</p>
    <p><strong>Email:</strong> $email;</p>
    <p><strong>Telefone:</strong> $tel;</p>
    <p><strong>Contato:</strong> $contato;</p>
    <p><strong>Tipo de Evento:</strong> $tipoEvento;</p>
    <p><strong>Data:</strong> $data;</p>
    <p><strong>Número de Convidados:</strong> $convidados;</p>
    <p><strong>Mensagem:</strong></p>
    <p> $mensagem;</p>
    <div style='margin-top: 20px; font-size: 0.9em;'>
        <p>Enviado através do seu site. Visite <a href='https://restaurantefassbier.com.br/'>https://restaurantefassbier.com.br/</a>.</p>
    </div>
</div>
</body>";


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = SMTP_HOST;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = SMTP_USER;                     //SMTP username
    $mail->Password   = SMTP_PASSWORD;                               //SMTP password
    $mail->Port       = SMTP_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->CharSet    =    'utf8';
    $mail->SMTPSecure    =    'ssl';
    //Recipients
    $mail->setFrom('contato@restaurantefassbier.com.br', 'Restaurante Fassbier');
    $mail->addAddress('contato@restaurantefassbier.com.br', 'Restaurante Fassbier');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contato do Site: ' . $nome;
    $mail->Body    = $body;
    $mail->AltBody = "Telefone: " . $tel . "<br>";
    "Prefiro ser contatado via: " . $contato . "<br>";
    "Tipo de evento: " . $tipoEvento . "<br>";
    "Data do evento: " . $data . "<br>";
    "Número de convidados: " . $convidados . "<br>";
    "Mensagem: " . $mensagem . "<br>";

    $mail->send();
    echo "<script>alert('O formulário foi enviado com sucesso!'); </script>";
    header("Location: retorno.html");
    exit; // Certifique-se de sair do script após o redirecionamento
} catch (Exception $e) {
    echo "error: {$mail->ErrorInfo}";
}
?>
