<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertyHub - Find Your Dream Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <?php include 'navbar.php'; ?>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Find Your Perfect Home</h1>
            <p class="hero-subtitle">Discover the best properties in your desired location with our comprehensive real estate platform</p>
            
            <!-- Property Search Form -->
            <div class="search-container">
                <form class="search-form" id="propertySearchForm">
                    <div class="search-row">
                        <div class="search-field">
                            <label for="location">Location</label>
                            <select id="location" name="location" required>
                                <option value="">Select Location</option>
                                <option value="new-york">New York</option>
                                <option value="los-angeles">Los Angeles</option>
                                <option value="chicago">Chicago</option>
                                <option value="houston">Houston</option>
                                <option value="phoenix">Phoenix</option>
                                <option value="philadelphia">Philadelphia</option>
                                <option value="san-antonio">San Antonio</option>
                                <option value="san-diego">San Diego</option>
                            </select>
                        </div>
                        
                        <div class="search-field">
                            <label for="property-type">Property Type</label>
                            <select id="property-type" name="property_type">
                                <option value="">Any Type</option>
                                <option value="house">House</option>
                                <option value="apartment">Apartment</option>
                                <option value="condo">Condo</option>
                                <option value="townhouse">Townhouse</option>
                                <option value="villa">Villa</option>
                                <option value="commercial">Commercial</option>
                            </select>
                        </div>
                        
                        <div class="search-field">
                            <label for="price-range">Price Range</label>
                            <select id="price-range" name="price_range">
                                <option value="">Any Price</option>
                                <option value="0-100000">$0 - $100,000</option>
                                <option value="100000-300000">$100,000 - $300,000</option>
                                <option value="300000-500000">$300,000 - $500,000</option>
                                <option value="500000-1000000">$500,000 - $1,000,000</option>
                                <option value="1000000+">$1,000,000+</option>
                            </select>
                        </div>
                        
                        <div class="search-field">
                            <label for="bedrooms">Bedrooms</label>
                            <select id="bedrooms" name="bedrooms">
                                <option value="">Any</option>
                                <option value="1">1+</option>
                                <option value="2">2+</option>
                                <option value="3">3+</option>
                                <option value="4">4+</option>
                                <option value="5">5+</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="search-btn">
                            <i class="fas fa-search"></i>
                            Search Properties
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="section-title">Why Choose PropertyHub?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Advanced Search</h3>
                    <p>Find properties with our powerful search filters including location, price, type, and amenities.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Verified Listings</h3>
                    <p>All our property listings are verified and updated regularly to ensure accuracy and reliability.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Expert Support</h3>
                    <p>Our team of real estate experts is here to help you throughout your property buying journey.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Mobile Friendly</h3>
                    <p>Access our platform from anywhere with our responsive design that works on all devices.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">10,000+</div>
                    <div class="stat-label">Properties Listed</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">5,000+</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Cities Covered</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Customer Support</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Find Your Dream Property?</h2>
                <p>Join thousands of satisfied customers who found their perfect home through PropertyHub</p>
                <div class="cta-buttons">
                    <a href="properties.html" class="btn btn-primary">Browse Properties</a>
                    <a href="submit-property.html" class="btn btn-secondary">List Your Property</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html>