<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties - PropertyHub</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/properties.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <?php include 'navbar.php'; ?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Properties</h1>
            <p>Find your perfect property from our extensive collection</p>
        </div>
    </section>

    <!-- Search Filters -->
    <section class="filters-section">
        <div class="container">
            <div class="filters-container">
                <form class="filters-form" id="filtersForm">
                    <div class="filters-row">
                        <div class="filter-group">
                            <label for="filter-location">Location</label>
                            <select id="filter-location" name="location">
                                <option value="">All Locations</option>
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
                        
                        <div class="filter-group">
                            <label for="filter-type">Property Type</label>
                            <select id="filter-type" name="property_type">
                                <option value="">All Types</option>
                                <option value="house">House</option>
                                <option value="apartment">Apartment</option>
                                <option value="condo">Condo</option>
                                <option value="townhouse">Townhouse</option>
                                <option value="villa">Villa</option>
                                <option value="commercial">Commercial</option>
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <label for="filter-price">Price Range</label>
                            <select id="filter-price" name="price_range">
                                <option value="">Any Price</option>
                                <option value="0-100000">$0 - $100,000</option>
                                <option value="100000-300000">$100,000 - $300,000</option>
                                <option value="300000-500000">$300,000 - $500,000</option>
                                <option value="500000-1000000">$500,000 - $1,000,000</option>
                                <option value="1000000+">$1,000,000+</option>
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <label for="filter-bedrooms">Bedrooms</label>
                            <select id="filter-bedrooms" name="bedrooms">
                                <option value="">Any</option>
                                <option value="1">1+</option>
                                <option value="2">2+</option>
                                <option value="3">3+</option>
                                <option value="4">4+</option>
                                <option value="5">5+</option>
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <label for="filter-sort">Sort By</label>
                            <select id="filter-sort" name="sort">
                                <option value="newest">Newest First</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                                <option value="bedrooms">Most Bedrooms</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="filter-btn">
                            <i class="fas fa-filter"></i>
                            Apply Filters
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Properties Grid -->
    <section class="properties-section">
        <div class="container">
            <div class="properties-header">
                <div class="results-info">
                    <span id="results-count">24 Properties Found</span>
                </div>
                <div class="view-toggle">
                    <button class="view-btn active" data-view="grid">
                        <i class="fas fa-th-large"></i>
                    </button>
                    <button class="view-btn" data-view="list">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>
            
            <div class="properties-grid" id="propertiesGrid">
                <!-- Property Card 1 -->
                <div class="property-card">
                    <div class="property-image">
                        <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop" alt="Modern Family House">
                        <div class="property-badge">For Sale</div>
                        <div class="property-price">$450,000</div>
                        <div class="property-actions">
                            <button class="action-btn" title="Add to Favorites">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="action-btn" title="Share">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Modern Family House</h3>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            123 Oak Street, New York, NY
                        </p>
                        <div class="property-features">
                            <span class="feature">
                                <i class="fas fa-bed"></i>
                                4 Beds
                            </span>
                            <span class="feature">
                                <i class="fas fa-bath"></i>
                                3 Baths
                            </span>
                            <span class="feature">
                                <i class="fas fa-ruler-combined"></i>
                                2,500 sq ft
                            </span>
                        </div>
                        <div class="property-footer">
                            <div class="agent-info">
                                <img src="https://images.pexels.com/photos/1239291/pexels-photo-1239291.jpeg?auto=compress&cs=tinysrgb&w=50&h=50&fit=crop" alt="Agent">
                                <span>John Smith</span>
                            </div>
                            <button class="contact-btn">Contact Agent</button>
                        </div>
                    </div>
                </div>

                <!-- Property Card 2 -->
                <div class="property-card">
                    <div class="property-image">
                        <img src="https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop" alt="Luxury Apartment">
                        <div class="property-badge">For Rent</div>
                        <div class="property-price">$2,800/mo</div>
                        <div class="property-actions">
                            <button class="action-btn" title="Add to Favorites">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="action-btn" title="Share">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Luxury Downtown Apartment</h3>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            456 Main Ave, Los Angeles, CA
                        </p>
                        <div class="property-features">
                            <span class="feature">
                                <i class="fas fa-bed"></i>
                                2 Beds
                            </span>
                            <span class="feature">
                                <i class="fas fa-bath"></i>
                                2 Baths
                            </span>
                            <span class="feature">
                                <i class="fas fa-ruler-combined"></i>
                                1,200 sq ft
                            </span>
                        </div>
                        <div class="property-footer">
                            <div class="agent-info">
                                <img src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=50&h=50&fit=crop" alt="Agent">
                                <span>Sarah Johnson</span>
                            </div>
                            <button class="contact-btn">Contact Agent</button>
                        </div>
                    </div>
                </div>

                <!-- Property Card 3 -->
                <div class="property-card">
                    <div class="property-image">
                        <img src="https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop" alt="Cozy Townhouse">
                        <div class="property-badge">For Sale</div>
                        <div class="property-price">$320,000</div>
                        <div class="property-actions">
                            <button class="action-btn" title="Add to Favorites">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="action-btn" title="Share">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Cozy Townhouse</h3>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            789 Pine Road, Chicago, IL
                        </p>
                        <div class="property-features">
                            <span class="feature">
                                <i class="fas fa-bed"></i>
                                3 Beds
                            </span>
                            <span class="feature">
                                <i class="fas fa-bath"></i>
                                2 Baths
                            </span>
                            <span class="feature">
                                <i class="fas fa-ruler-combined"></i>
                                1,800 sq ft
                            </span>
                        </div>
                        <div class="property-footer">
                            <div class="agent-info">
                                <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=50&h=50&fit=crop" alt="Agent">
                                <span>Mike Davis</span>
                            </div>
                            <button class="contact-btn">Contact Agent</button>
                        </div>
                    </div>
                </div>

                <!-- Property Card 4 -->
                <div class="property-card">
                    <div class="property-image">
                        <img src="https://images.pexels.com/photos/1029599/pexels-photo-1029599.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop" alt="Spacious Villa">
                        <div class="property-badge">For Sale</div>
                        <div class="property-price">$750,000</div>
                        <div class="property-actions">
                            <button class="action-btn" title="Add to Favorites">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="action-btn" title="Share">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Spacious Villa with Pool</h3>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            321 Beach Blvd, Houston, TX
                        </p>
                        <div class="property-features">
                            <span class="feature">
                                <i class="fas fa-bed"></i>
                                5 Beds
                            </span>
                            <span class="feature">
                                <i class="fas fa-bath"></i>
                                4 Baths
                            </span>
                            <span class="feature">
                                <i class="fas fa-ruler-combined"></i>
                                3,200 sq ft
                            </span>
                        </div>
                        <div class="property-footer">
                            <div class="agent-info">
                                <img src="https://images.pexels.com/photos/1181686/pexels-photo-1181686.jpeg?auto=compress&cs=tinysrgb&w=50&h=50&fit=crop" alt="Agent">
                                <span>Lisa Wilson</span>
                            </div>
                            <button class="contact-btn">Contact Agent</button>
                        </div>
                    </div>
                </div>

                <!-- Property Card 5 -->
                <div class="property-card">
                    <div class="property-image">
                        <img src="https://images.pexels.com/photos/1438832/pexels-photo-1438832.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop" alt="Studio Apartment">
                        <div class="property-badge">For Rent</div>
                        <div class="property-price">$1,500/mo</div>
                        <div class="property-actions">
                            <button class="action-btn" title="Add to Favorites">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="action-btn" title="Share">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Modern Studio Apartment</h3>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            654 City Center, Phoenix, AZ
                        </p>
                        <div class="property-features">
                            <span class="feature">
                                <i class="fas fa-bed"></i>
                                1 Bed
                            </span>
                            <span class="feature">
                                <i class="fas fa-bath"></i>
                                1 Bath
                            </span>
                            <span class="feature">
                                <i class="fas fa-ruler-combined"></i>
                                600 sq ft
                            </span>
                        </div>
                        <div class="property-footer">
                            <div class="agent-info">
                                <img src="https://images.pexels.com/photos/1043471/pexels-photo-1043471.jpeg?auto=compress&cs=tinysrgb&w=50&h=50&fit=crop" alt="Agent">
                                <span>Tom Brown</span>
                            </div>
                            <button class="contact-btn">Contact Agent</button>
                        </div>
                    </div>
                </div>

                <!-- Property Card 6 -->
                <div class="property-card">
                    <div class="property-image">
                        <img src="https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop" alt="Family Condo">
                        <div class="property-badge">For Sale</div>
                        <div class="property-price">$380,000</div>
                        <div class="property-actions">
                            <button class="action-btn" title="Add to Favorites">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="action-btn" title="Share">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Family Condo with Balcony</h3>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            987 Garden View, Philadelphia, PA
                        </p>
                        <div class="property-features">
                            <span class="feature">
                                <i class="fas fa-bed"></i>
                                3 Beds
                            </span>
                            <span class="feature">
                                <i class="fas fa-bath"></i>
                                2 Baths
                            </span>
                            <span class="feature">
                                <i class="fas fa-ruler-combined"></i>
                                1,400 sq ft
                            </span>
                        </div>
                        <div class="property-footer">
                            <div class="agent-info">
                                <img src="https://images.pexels.com/photos/1181424/pexels-photo-1181424.jpeg?auto=compress&cs=tinysrgb&w=50&h=50&fit=crop" alt="Agent">
                                <span>Emma Taylor</span>
                            </div>
                            <button class="contact-btn">Contact Agent</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="page-btn" disabled>
                    <i class="fas fa-chevron-left"></i>
                    Previous
                </button>
                <div class="page-numbers">
                    <button class="page-number active">1</button>
                    <button class="page-number">2</button>
                    <button class="page-number">3</button>
                    <button class="page-number">4</button>
                    <span class="page-dots">...</span>
                    <button class="page-number">12</button>
                </div>
                <button class="page-btn">
                    Next
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
<?php include 'footer.php'; ?>

    <script src="js/script.js"></script>
    <script src="js/properties.js"></script>
</body>
</html>