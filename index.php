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
                    <h2 class="text-center mb-4 fw-bold">Contact Us</h2>

                    <form action="process.php" method="POST">
                        <!-- Name Field -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name:</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="name" 
                                   name="name" 
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
                                      required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg text-white" 
                                    style="background-color: #6f42c1;">
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