<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$nome = $_POST["nome"];
		$email = $_POST["email"];
		$telefone = $_POST["telefone"];
		$mensagem = $_POST["mensagem"];
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "bruno1989diasandrade@gmail.com");
        $subject = "Confirmar email";
        $to = new SendGrid\Email(null, "bruno1989diasandrade@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá, <br><br>Nova mensagem de contato
		<br><br>Nome: $nome <br>
				Email: $email<br>
				Telefone: $telefone
				Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem Enviada com Sucesso!"
        ?>
    </body>
</html>
