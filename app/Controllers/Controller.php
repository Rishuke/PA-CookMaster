<?php

namespace App\Controllers;

use Exception;
use Database\DBConnection;
use PHPMailer\PHPMailer\PHPMailer;

abstract class Controller
{

    protected $db;

    public function __construct(DBConnection $db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->db = $db;
    }

    protected function view(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';

        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }



    protected function getDB()
    {
        return $this->db;
    }

    protected function isAdmin()
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['user']['type'] == 'Admin') {
            return true;
        } else {
            return header('Location: /login');
        }
    }

   protected function isLogged()
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            return true;
        } else {
            return header('Location: /login');
        }
    }


    public function sendRegistryMail($email, $token)
    {

        // Paramètres de l'envoie d'email via PHPMailer

        $template_fichier = "emailTemp.php";

        $nom = "Wicookin";
        $to = $email;
        $sujet = "Activation de votre compte Wicookin";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\r\n";

        $headers .= 'From: ' . $nom . "\r\n" .
            'Reply-To: ' . $nom . "\r\n" .
            'X-Mailer: PHP/' . phpversion();



        $from = "wicookin.fr@gmail.com";
        $password = "skeaqjqwncfqvvdc";

        $message = "<h1><div style='display:block;text-align:center;'>Bonjour " . $_POST['firstname'] . ",</div></h1>";
        $message .= "<h2><div style='display:block;text-align:center;'>Votre compte a été créé avec succès !</div></h2>";
        $message .= "<p>Votre email d'inscription est : " . $to . "</p>";
        $message .= "<p>Vous pouvez vous connecter sur le site.Cliquez sur le lien ci-dessous pour valider votre compte :</p>";
        $message .= "<p><a href='https://wicookin.fr/confirmation?key=" . $token . "&email=" . $to . "'>Confirmer mon compte</a></p>";
        $message .= "<p>Si vous n'êtes pas l'auteur de cette inscription. Veuillez nous en avertir en cliquant sur le lien ci-dessous</p>";
        $message .= "<p><a href='mailto:wicookin.fr@gmail.com'>Nous contacter</a></p>";
        $message .= "<p><div style='display:block;text-align:center;'>Cordialement,</div></p>";
        $message .= "<p><div style='display:block;text-align:center;'>L'équipe de Wicookin</div></p></div>";


        require_once('../vendor/autoload.php');

        $mail = new PHPMailer;
        $mail->CharSet = 'UTF-8';
        $mail->setLanguage('fr');

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;

        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->smtpConnect([
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            ]
        ]);


        $mail->isHTML(true);
        $mail->setFrom($from, $nom);
        $mail->addAddress($to);
        $mail->Subject = $sujet;
        $mail->Body = $message;


        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }
}
