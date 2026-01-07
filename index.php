<?php 

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
            $to = 'sulaymonovhusan2002@gmail.com';

            $safe_subject = "Contact Form: " . $subject;

            $body = "You have a new message from your contact form:<br>";
            $body .= "Name: $username<br>";
            $body .= "Email: $email<br>";
            $body .= "Subject: $subject<br>";
            $body .= "Message: $message<br>";

            $headers = "From: $username <$email>\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            if (mail($to, $safe_subject, $body, $headers)) {
                $success = 'Thank you! Your message has been sent.';
                $username = $email = $subject =$message = '';
            } else {
                $erorr = 'Sorry, something went wrong. Email not sent.';
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
                    <?php else: ?>
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
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>