<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Property - PropertyHub</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/submit-property.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
      <?php include 'navbar.php'; ?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Submit Your Property</h1>
            <p>List your property with us and reach thousands of potential buyers</p>
        </div>
    </section>

    <!-- Submit Property Form -->
    <section class="submit-section">
        <div class="container">
            <div class="submit-content">
                <!-- Form Steps -->
                <div class="form-steps">
                    <div class="step active" data-step="1">
                        <div class="step-number">1</div>
                        <div class="step-info">
                            <h3>Property Details</h3>
                            <p>Basic information</p>
                        </div>
                    </div>
                    <div class="step" data-step="2">
                        <div class="step-number">2</div>
                        <div class="step-info">
                            <h3>Features & Amenities</h3>
                            <p>Property specifications</p>
                        </div>
                    </div>
                    <div class="step" data-step="3">
                        <div class="step-number">3</div>
                        <div class="step-info">
                            <h3>Photos & Media</h3>
                            <p>Upload images</p>
                        </div>
                    </div>
                    <div class="step" data-step="4">
                        <div class="step-number">4</div>
                        <div class="step-info">
                            <h3>Contact Information</h3>
                            <p>Your details</p>
                        </div>
                    </div>
                </div>

                <!-- Property Submission Form -->
                <form class="property-form" id="propertyForm">
                    <!-- Step 1: Property Details -->
                    <div class="form-step active" data-step="1">
                        <h2>Property Details</h2>
                        <p>Tell us about your property's basic information</p>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="propertyTitle">Property Title *</label>
                                <input type="text" id="propertyTitle" name="propertyTitle" required placeholder="e.g., Modern Family House in Downtown">
                            </div>
                            <div class="form-group">
                                <label for="propertyType">Property Type *</label>
                                <select id="propertyType" name="propertyType" required>
                                    <option value="">Select Property Type</option>
                                    <option value="house">House</option>
                                    <option value="apartment">Apartment</option>
                                    <option value="condo">Condo</option>
                                    <option value="townhouse">Townhouse</option>
                                    <option value="villa">Villa</option>
                                    <option value="commercial">Commercial</option>
                                    <option value="land">Land</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="listingType">Listing Type *</label>
                                <select id="listingType" name="listingType" required>
                                    <option value="">Select Listing Type</option>
                                    <option value="sale">For Sale</option>
                                    <option value="rent">For Rent</option>
                                    <option value="lease">For Lease</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Price *</label>
                                <div class="price-input">
                                    <span class="currency">$</span>
                                    <input type="number" id="price" name="price" required placeholder="0">
                                    <select id="priceType" name="priceType">
                                        <option value="total">Total</option>
                                        <option value="monthly">Per Month</option>
                                        <option value="yearly">Per Year</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="propertyAddress">Property Address *</label>
                            <input type="text" id="propertyAddress" name="propertyAddress" required placeholder="Enter full address">
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="city">City *</label>
                                <input type="text" id="city" name="city" required placeholder="City">
                            </div>
                            <div class="form-group">
                                <label for="state">State *</label>
                                <select id="state" name="state" required>
                                    <option value="">Select State</option>
                                    <option value="NY">New York</option>
                                    <option value="CA">California</option>
                                    <option value="TX">Texas</option>
                                    <option value="FL">Florida</option>
                                    <option value="IL">Illinois</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="OH">Ohio</option>
                                    <option value="GA">Georgia</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="MI">Michigan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="zipCode">ZIP Code *</label>
                                <input type="text" id="zipCode" name="zipCode" required placeholder="12345">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Property Description *</label>
                            <textarea id="description" name="description" rows="5" required placeholder="Describe your property in detail..."></textarea>
                        </div>
                    </div>

                    <!-- Step 2: Features & Amenities -->
                    <div class="form-step" data-step="2">
                        <h2>Features & Amenities</h2>
                        <p>Specify your property's features and amenities</p>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="bedrooms">Bedrooms *</label>
                                <select id="bedrooms" name="bedrooms" required>
                                    <option value="">Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6+">6+</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bathrooms">Bathrooms *</label>
                                <select id="bathrooms" name="bathrooms" required>
                                    <option value="">Select</option>
                                    <option value="1">1</option>
                                    <option value="1.5">1.5</option>
                                    <option value="2">2</option>
                                    <option value="2.5">2.5</option>
                                    <option value="3">3</option>
                                    <option value="3.5">3.5</option>
                                    <option value="4">4</option>
                                    <option value="4+">4+</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="squareFootage">Square Footage *</label>
                                <input type="number" id="squareFootage" name="squareFootage" required placeholder="e.g., 2500">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="lotSize">Lot Size (sq ft)</label>
                                <input type="number" id="lotSize" name="lotSize" placeholder="e.g., 5000">
                            </div>
                            <div class="form-group">
                                <label for="yearBuilt">Year Built</label>
                                <input type="number" id="yearBuilt" name="yearBuilt" placeholder="e.g., 2010" min="1800" max="2024">
                            </div>
                            <div class="form-group">
                                <label for="parking">Parking Spaces</label>
                                <select id="parking" name="parking">
                                    <option value="">Select</option>
                                    <option value="0">None</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4+">4+</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="amenities-section">
                            <h3>Amenities</h3>
                            <div class="amenities-grid">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="amenities" value="pool">
                                    <span class="checkmark"></span>
                                    Swimming Pool
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="amenities" value="gym">
                                    <span class="checkmark"></span>
                                    Gym/Fitness Center
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="amenities" value="garden">
                                    <span class="checkmark"></span>
                                    Garden/Yard
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="amenities" value="balcony">
                                    <span class="checkmark"></span>
                                    Balcony/Terrace
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="amenities" value="fireplace">
                                    <span class="checkmark"></span>
                                    Fireplace
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="amenities" value="ac">
                                    <span class="checkmark"></span>
                                    Air Conditioning
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="amenities" value="heating">
                                    <span class="checkmark"></span>
                                    Central Heating
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="amenities" value="laundry">
                                    <span class="checkmark"></span>
                                    Laundry Room
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="amenities" value="security">
                                    <span class="checkmark"></span>
                                    Security System
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="amenities" value="elevator">
                                    <span class="checkmark"></span>
                                    Elevator
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Photos & Media -->
                    <div class="form-step" data-step="3">
                        <h2>Photos & Media</h2>
                        <p>Upload high-quality photos of your property</p>
                        
                        <div class="upload-section">
                            <div class="upload-area" id="uploadArea">
                                <div class="upload-content">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <h3>Upload Property Photos</h3>
                                    <p>Drag and drop photos here or click to browse</p>
                                    <p class="upload-note">Maximum 20 photos, 5MB each (JPG, PNG)</p>
                                    <input type="file" id="photoUpload" name="photos" multiple accept="image/*" hidden>
                                    <button type="button" class="upload-btn" onclick="document.getElementById('photoUpload').click()">
                                        <i class="fas fa-plus"></i>
                                        Choose Photos
                                    </button>
                                </div>
                            </div>
                            
                            <div class="photo-preview" id="photoPreview">
                                <!-- Uploaded photos will appear here -->
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="virtualTour">Virtual Tour URL (Optional)</label>
                            <input type="url" id="virtualTour" name="virtualTour" placeholder="https://example.com/virtual-tour">
                        </div>
                        
                        <div class="form-group">
                            <label for="videoUrl">Property Video URL (Optional)</label>
                            <input type="url" id="videoUrl" name="videoUrl" placeholder="https://youtube.com/watch?v=...">
                        </div>
                    </div>

                    <!-- Step 4: Contact Information -->
                    <div class="form-step" data-step="4">
                        <h2>Contact Information</h2>
                        <p>Provide your contact details for potential buyers</p>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="ownerName">Full Name *</label>
                                <input type="text" id="ownerName" name="ownerName" required placeholder="Your full name">
                            </div>
                            <div class="form-group">
                                <label for="ownerEmail">Email Address *</label>
                                <input type="email" id="ownerEmail" name="ownerEmail" required placeholder="your@email.com">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="ownerPhone">Phone Number *</label>
                                <input type="tel" id="ownerPhone" name="ownerPhone" required placeholder="+1 (555) 123-4567">
                            </div>
                            <div class="form-group">
                                <label for="preferredContact">Preferred Contact Method</label>
                                <select id="preferredContact" name="preferredContact">
                                    <option value="phone">Phone</option>
                                    <option value="email">Email</option>
                                    <option value="both">Both</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="availability">Availability for Showings</label>
                            <textarea id="availability" name="availability" rows="3" placeholder="e.g., Weekdays after 5 PM, Weekends anytime"></textarea>
                        </div>
                        
                        <div class="checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="agentContact" value="yes">
                                <span class="checkmark"></span>
                                I am a licensed real estate agent
                            </label>
                        </div>
                        
                        <div class="checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="terms" required>
                                <span class="checkmark"></span>
                                I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a> *
                            </label>
                        </div>
                        
                        <div class="checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="marketing" value="yes">
                                <span class="checkmark"></span>
                                I agree to receive marketing communications about my listing
                            </label>
                        </div>
                    </div>

                    <!-- Form Navigation -->
                    <div class="form-navigation">
                        <button type="button" class="nav-btn prev-btn" id="prevBtn" style="display: none;">
                            <i class="fas fa-chevron-left"></i>
                            Previous
                        </button>
                        <button type="button" class="nav-btn next-btn" id="nextBtn">
                            Next
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <button type="submit" class="nav-btn submit-btn" id="submitBtn" style="display: none;">
                            <i class="fas fa-check"></i>
                            Submit Property
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
   <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>
    <script src="js/submit-property.js"></script>
</body>
</html>