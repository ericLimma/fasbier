<?php
// Inicia a sessão para garantir que não haja saídas antes do cabeçalho
ob_start();

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

$body = "<body style='font-family: Arial, sans-serif; line-height: 1.6; width:100%; max-width:980px'>
<div style='margin: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9; width:100%; max-width:980px'>
    <div style='margin-bottom: 20px;'>
        <h1>Mensagem do Formulário de Contato</h1>
    </div>
    <p><strong>Nome:</strong> $nome</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Telefone:</strong> $tel</p>
    <p><strong>Contato:</strong> $contato</p>
    <p><strong>Tipo de Evento:</strong> $tipoEvento</p>
    <p><strong>Data:</strong> $data</p>
    <p><strong>Número de Convidados:</strong> $convidados</p>
    <p><strong>Mensagem:</strong></p>
    <p>$mensagem</p>
    <div style='margin-top: 20px; font-size: 0.9em;'>
        <p>Enviado através do seu site. Visite <a href='https://restaurantefassbier.com.br/'>https://restaurantefassbier.com.br/</a>.</p>
    </div>
</div>
</body>";


$mail = new PHPMailer(true);

try {
    // Configurações do servidor
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASSWORD;
    $mail->Port       = SMTP_PORT;
    $mail->CharSet    = 'utf8';
    $mail->SMTPSecure = 'ssl';

    // Destinatários
    $mail->setFrom('contato@restaurantefassbier.com.br', 'Restaurante Fassbier');
    $mail->addAddress('contato@restaurantefassbier.com.br', 'Restaurante Fassbier');

    // Conteúdo
    $mail->isHTML(true);
    $mail->Subject = 'Contato do Site: ' . $nome;
    $mail->Body    = $body;
    $mail->AltBody = "Telefone: " . $tel . "\n" .
        "Prefiro ser contatado via: " . $contato . "\n" .
        "Tipo de evento: " . $tipoEvento . "\n" .
        "Data do evento: " . $data . "\n" .
        "Número de convidados: " . $convidados . "\n" .
        "Mensagem: " . $mensagem . "\n";

    $mail->send();
    header("Location: retorno.html");
    exit; // Certifique-se de sair do script após o redirecionamento
} catch (Exception $e) {
    echo "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
}

// Limpa o buffer de saída e envia todo o conteúdo ao navegador
ob_end_flush();
