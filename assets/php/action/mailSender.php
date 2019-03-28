<?php
    function sanitizeMail($field) {
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        $field = filter_var($field, FILTER_VALIDATE_EMAIL);
        return $field;
    }

    function sanitizeBody($field) {
        $field = filter_var($field, FILTER_SANITIZE_SPECIAL_CHARS);
        return $field;
    }

    $sender = sanitizeMail($_POST["sender"]);

    if (!$sender) {
        header('Location: ../../../index.php?error=MAIL_SANITIZE_S');
        exit();
    }

    $subject = sanitizeBody($_POST["subject"]);

    if (!$subject) {
        header('Location: ../../../index.php?error=MAIL_SANITIZE_O');
        exit();
    }

    $message = sanitizeBody($_POST["contact"]);

    if (!$message) {
        header('Location: ../../../index.php?error=MAIL_SANITIZE_B');
        exit();
    }

    $to_email = 'libreoupas@outlook.com';
    $headers = 'From: ' . $sender;

    $return = mail($to_email, $subject, $message, $headers);
    if ($return) {
        header('Location: ../../../index.php');
        exit();
    } else {
        header('Location: ../../../index.php?error=MAIL');
        exit();
    }
?>
