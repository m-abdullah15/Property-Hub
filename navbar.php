<?php
session_start();
// Get the current page's filename (e.g., 'index.php', 'properties.php')
$current_page = basename($_SERVER['SCRIPT_NAME']);
?>
<nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <a href="index.php">
                <i class="fas fa-home"></i>
                PropertyHub
            </a>
        </div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="index.php" class="nav-link <?php echo $current_page === 'index.php' ? 'active' : ''; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a href="properties.php" class="nav-link <?php echo $current_page === 'properties.php' ? 'active' : ''; ?>">Properties</a>
            </li>
            <li class="nav-item">
                <a href="about.php" class="nav-link <?php echo $current_page === 'about.php' ? 'active' : ''; ?>">About</a>
            </li>
            <li class="nav-item">
                <a href="contact.php" class="nav-link <?php echo $current_page === 'contact.php' ? 'active' : ''; ?>">Contact</a>
            </li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a href="submit-property.php" class="nav-link btn-submit <?php echo $current_page === 'submit-property.php' ? 'active' : ''; ?>">Submit Property</a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link btn-submit <?php echo $current_page === 'logout.php' ? 'active' : ''; ?>">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a href="login.php" class="nav-link btn-submit <?php echo $current_page === 'login.php' ? 'active' : ''; ?>">Login</a>
                </li>
                <li class="nav-item">
                    <a href="register.php" class="nav-link btn-submit <?php echo $current_page === 'register.php' ? 'active' : ''; ?>">Register</a>
                </li>
            <?php endif; ?>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</nav>