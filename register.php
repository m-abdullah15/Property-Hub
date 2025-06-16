<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? '';
unset($_SESSION['errors'], $_SESSION['success']); // Clear session messages
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PropertyHub</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/register.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    </head>
<body>
    <?php include 'navbar.php'; ?>

    <section class="register-container">
        <form class="register-form" id="registerForm" action="process_register.php" method="POST">
            <?php if (!empty($errors)): ?>
                <div class="message-container error">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php elseif ($success): ?>
                <div class="message-container success">
                    <p><?php echo htmlspecialchars($success); ?></p>
                </div>
            <?php endif; ?>
            <h2>Create Account</h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">First Name *</label>
                    <input type="text" id="firstName" name="firstName" required placeholder="Enter your first name" value="<?php echo htmlspecialchars($_POST['firstName'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name *</label>
                    <input type="text" id="lastName" name="lastName" required placeholder="Enter your last name" value="<?php echo htmlspecialchars($_POST['lastName'] ?? ''); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
            </div>
            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" id="password" name="password" required placeholder="Create a password">
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password *</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required placeholder="Confirm your password">
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="newsletter" name="newsletter" <?php echo isset($_POST['newsletter']) ? 'checked' : ''; ?>>
                <label for="newsletter">Subscribe to our newsletter for property updates</label>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="terms" name="terms" required <?php echo isset($_POST['terms']) ? 'checked' : ''; ?>>
                <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a> *</label>
            </div>
            <button type="submit" class="submit-btn">
                <i class="fas fa-user-plus"></i>
                Create Account
            </button>
            <div class="form-group text-center">
                <p>Already have an account? <a href="login.php">Sign in here</a></p>
            </div>
        </form>
    </section>

   <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html>