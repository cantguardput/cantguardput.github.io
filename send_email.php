<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Alamat email tujuan
    $to = "amandafaatihah123@@gmail.com"; // Ganti dengan alamat email Anda
    $subject = "Pesan dari Formulir Kontak: $subject"; // Subjek email

    // Isi email
    $body = "
    Nama: $name\n
    Email: $email\n
    Subjek: $subject\n\n
    Pesan:\n
    $message
    ";

    // Header email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Mengirim email
    if (mail($to, $subject, $body, $headers)) {
        echo "Pesan Anda telah dikirim!";
    } else {
        echo "Terjadi kesalahan, pesan gagal dikirim.";
    }
}
?>
