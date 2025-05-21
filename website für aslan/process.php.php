<?php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formular-Daten erfassen
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // E-Mail-Einstellungen
    $to = "tasginaslan12@gmail.com";
    $subject = "Neue Anfrage von " . $name;
    
    // E-Mail-Inhalt
    $email_content = "Name: $name\n";
    $email_content .= "E-Mail: $email\n\n";
    $email_content .= "Nachricht:\n$message\n";
    
    // Header
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // E-Mail senden
    if(mail($to, $subject, $email_content, $headers)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "E-Mail konnte nicht gesendet werden"]);
    }
}
?>