<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - PropertyHub</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <?php include 'navbar.php'; ?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>About PropertyHub</h1>
            <p>Your trusted partner in real estate since 2010</p>
        </div>
    </section>

    <!-- About Content -->
    <section class="about-content">
        <div class="container">
            <div class="about-intro">
                <div class="intro-text">
                    <h2>Who We Are</h2>
                    <p>PropertyHub is a leading real estate platform dedicated to making property buying, selling, and renting simple and accessible for everyone. With over a decade of experience in the real estate industry, we've helped thousands of families find their dream homes and investors discover profitable opportunities.</p>
                    <p>Our mission is to revolutionize the real estate experience by providing innovative technology, expert guidance, and unparalleled customer service. We believe that finding the perfect property should be exciting, not stressful.</p>
                </div>
                <div class="intro-image">
                    <img src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop" alt="PropertyHub Team">
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="values-section">
        <div class="container">
            <h2 class="section-title">Our Core Values</h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Trust & Integrity</h3>
                    <p>We build lasting relationships based on honesty, transparency, and ethical business practices.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Innovation</h3>
                    <p>We continuously evolve our platform with cutting-edge technology to enhance user experience.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Customer First</h3>
                    <p>Our customers are at the heart of everything we do. Their success is our success.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3>Excellence</h3>
                    <p>We strive for excellence in every interaction and continuously improve our services.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <h2 class="section-title">Meet Our Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.pexels.com/photos/1239291/pexels-photo-1239291.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&fit=crop" alt="John Smith">
                    </div>
                    <div class="member-info">
                        <h3>John Smith</h3>
                        <p class="member-role">CEO & Founder</p>
                        <p class="member-bio">With 15+ years in real estate, John founded PropertyHub to make property transactions seamless for everyone.</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&fit=crop" alt="Sarah Johnson">
                    </div>
                    <div class="member-info">
                        <h3>Sarah Johnson</h3>
                        <p class="member-role">Head of Sales</p>
                        <p class="member-bio">Sarah leads our sales team with expertise in luxury properties and commercial real estate.</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&fit=crop" alt="Mike Davis">
                    </div>
                    <div class="member-info">
                        <h3>Mike Davis</h3>
                        <p class="member-role">Technology Director</p>
                        <p class="member-bio">Mike oversees our platform development and ensures we stay at the forefront of PropTech innovation.</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.pexels.com/photos/1181686/pexels-photo-1181686.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&fit=crop" alt="Lisa Wilson">
                    </div>
                    <div class="member-info">
                        <h3>Lisa Wilson</h3>
                        <p class="member-role">Customer Success Manager</p>
                        <p class="member-bio">Lisa ensures every customer has an exceptional experience throughout their property journey.</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Achievements Section -->
    <section class="achievements-section">
        <div class="container">
            <h2 class="section-title">Our Achievements</h2>
            <div class="achievements-grid">
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3>Best Real Estate Platform 2023</h3>
                    <p>Awarded by National Real Estate Association</p>
                </div>
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>5-Star Customer Rating</h3>
                    <p>Based on 10,000+ customer reviews</p>
                </div>
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h3>Innovation Award 2022</h3>
                    <p>For outstanding technology in PropTech</p>
                </div>
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3>Certified Excellence</h3>
                    <p>ISO 9001:2015 Quality Management</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html>