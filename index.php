<?php 
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    $success = '';
    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $subject = trim($_POST['subject'] ?? '');
        $message = trim($_POST['message'] ?? '');
        
        if (empty($username) || empty($email) || empty($subject) || empty($message)) {
            $error = 'All fields are required!';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Invalid email address!';
        } else {
            $mail = new PHPMailer(true);

            try {
                // ===== SHU YERGA Server settings (SMTP konfiguratsiyasi) =====
                $mail->SMTPDebug = 0;                                     // Test uchun 2 qo'yib debug ko'rish mumkin
                $mail->isSMTP();                                          // SMTP orqali yuborish
                $mail->Host       = 'sandbox.smtp.mailtrap.io';           // Mailtrap host
                $mail->SMTPAuth   = true;                                 
                $mail->Username   = 'f400526bf5b48b';                      // <<< Mailtrap username
                $mail->Password   = '79c779e79df514';                      // <<< Mailtrap password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       // STARTTLS
                $mail->Port       = 2525;                                 // yoki 587

                // ===== Keyin Recipients (kimdan, kimga) =====
                $mail->setFrom($email, $username);                        // Foydalanuvchi ma'lumoti
                $mail->addAddress('any@recipient.com');                   // Mailtrapga tushadi anyway, shuning uchun istalgan email yozsa bo'ladi
                $mail->addReplyTo($email, $username);

                // ===== Keyin Content (subject va body) =====
                $mail->isHTML(false);
                $mail->Subject = "Contact Form: $subject";
                $mail->Body    = "New message:\n\nName: $username\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";

                // ===== Oxirida send() =====
                $mail->send();

                $success = 'Thank you! Your message has been sent.';
                $username = $email = $subject = $message = '';
            } catch (Exception $e) {
                $error = 'Sorry, something went wrong. Email not sent.';
            }
        }
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Form</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">

                <!-- Form Card -->
                <div class="bg-white rounded shadow-sm p-4 p-md-5">
                    <h2 class="text-center mb-4 fw-bold">Contact Form</h2>

                    <?php if ($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    <?php if ($error): ?>
                        <div class="alert alert-danger"> <?= $error; ?> </div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <!-- Name Field -->
                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold">Name:</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="username" 
                                   name="username" 
                                   placeholder="Full name" 
                                   required>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email:</label>
                            <input type="email" 
                                   class="form-control" 
                                   id="email" 
                                   name="email" 
                                   placeholder="Email address" 
                                   required>
                        </div>

                        <!-- Subject Field -->
                        <div class="mb-3">
                            <label for="subject" class="form-label fw-semibold">Subject:</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="subject" 
                                   name="subject" 
                                   placeholder="Enter a subject" 
                                   required>
                        </div>

                        <!-- Message Field -->
                        <div class="mb-4">
                            <label for="message" class="form-label fw-semibold">Message:</label>
                            <textarea class="form-control" 
                                      id="message" 
                                      name="message" 
                                      rows="6" 
                                      placeholder="" 
                                      required>
                            </textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg text-white" 
                                    style="background-color: navy;">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>