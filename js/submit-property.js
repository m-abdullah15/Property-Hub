// Submit Property page functionality

document.addEventListener('DOMContentLoaded', function() {
    // Initialize submit property form
    initializeStepForm();
    initializeFileUpload();
    initializeFormValidation();
});

let currentStep = 1;
const totalSteps = 4;

// Initialize step form functionality
function initializeStepForm() {
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const submitBtn = document.getElementById('submitBtn');
    const form = document.getElementById('propertyForm');
    
    // Next button functionality
    nextBtn.addEventListener('click', function() {
        if (validateCurrentStep()) {
            nextStep();
        }
    });
    
    // Previous button functionality
    prevBtn.addEventListener('click', function() {
        prevStep();
    });
    
    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        handleFormSubmission();
    });
    
    // Initialize first step
    updateStepDisplay();
}

// Move to next step
function nextStep() {
    if (currentStep < totalSteps) {
        currentStep++;
        updateStepDisplay();
        scrollToTop();
    }
}

// Move to previous step
function prevStep() {
    if (currentStep > 1) {
        currentStep--;
        updateStepDisplay();
        scrollToTop();
    }
}

// Update step display
function updateStepDisplay() {
    // Update step indicators
    const steps = document.querySelectorAll('.step');
    const formSteps = document.querySelectorAll('.form-step');
    
    steps.forEach((step, index) => {
        const stepNumber = index + 1;
        step.classList.remove('active', 'completed');
        
        if (stepNumber === currentStep) {
            step.classList.add('active');
        } else if (stepNumber < currentStep) {
            step.classList.add('completed');
        }
    });
    
    // Update form steps
    formSteps.forEach((step, index) => {
        const stepNumber = index + 1;
        step.classList.remove('active');
        
        if (stepNumber === currentStep) {
            step.classList.add('active');
        }
    });
    
    // Update navigation buttons
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const submitBtn = document.getElementById('submitBtn');
    
    // Previous button
    if (currentStep === 1) {
        prevBtn.style.display = 'none';
    } else {
        prevBtn.style.display = 'flex';
    }
    
    // Next/Submit button
    if (currentStep === totalSteps) {
        nextBtn.style.display = 'none';
        submitBtn.style.display = 'flex';
    } else {
        nextBtn.style.display = 'flex';
        submitBtn.style.display = 'none';
    }
}

// Validate current step
function validateCurrentStep() {
    const currentFormStep = document.querySelector(`.form-step[data-step="${currentStep}"]`);
    const requiredFields = currentFormStep.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!validateField(field)) {
            isValid = false;
        }
    });
    
    if (!isValid) {
        showNotification('Please fill in all required fields correctly.', 'error');
    }
    
    return isValid;
}

// Validate individual field
function validateField(field) {
    const value = field.value.trim();
    
    // Check if required field is empty
    if (field.hasAttribute('required') && !value) {
        showFieldError(field, 'This field is required');
        return false;
    }
    
    // Specific validations
    switch (field.type) {
        case 'email':
            if (value && !isValidEmail(value)) {
                showFieldError(field, 'Please enter a valid email address');
                return false;
            }
            break;
        case 'tel':
            if (value && !isValidPhone(value)) {
                showFieldError(field, 'Please enter a valid phone number');
                return false;
            }
            break;
        case 'url':
            if (value && !isValidURL(value)) {
                showFieldError(field, 'Please enter a valid URL');
                return false;
            }
            break;
        case 'number':
            if (value && (isNaN(value) || parseFloat(value) < 0)) {
                showFieldError(field, 'Please enter a valid number');
                return false;
            }
            break;
    }
    
    // Clear any existing errors
    clearFieldError(field);
    return true;
}

// Show field error
function showFieldError(field, message) {
    clearFieldError(field);
    
    field.style.borderColor = '#e74c3c';
    
    const errorElement = document.createElement('div');
    errorElement.className = 'field-error';
    errorElement.textContent = message;
    errorElement.style.cssText = `
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
    `;
    
    field.parentNode.appendChild(errorElement);
}

// Clear field error
function clearFieldError(field) {
    field.style.borderColor = '#e1e5e9';
    
    const existingError = field.parentNode.querySelector('.field-error');
    if (existingError) {
        existingError.remove();
    }
}

// Initialize file upload functionality
function initializeFileUpload() {
    const uploadArea = document.getElementById('uploadArea');
    const photoUpload = document.getElementById('photoUpload');
    const photoPreview = document.getElementById('photoPreview');
    
    // Click to upload
    uploadArea.addEventListener('click', function() {
        photoUpload.click();
    });
    
    // Drag and drop functionality
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });
    
    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
    });
    
    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
        
        const files = e.dataTransfer.files;
        handleFileUpload(files);
    });
    
    // File input change
    photoUpload.addEventListener('change', function(e) {
        handleFileUpload(e.target.files);
    });
}

// Handle file upload
function handleFileUpload(files) {
    const photoPreview = document.getElementById('photoPreview');
    const maxFiles = 20;
    const maxSize = 5 * 1024 * 1024; // 5MB
    
    // Check file count
    const currentFiles = photoPreview.querySelectorAll('.photo-item').length;
    if (currentFiles + files.length > maxFiles) {
        showNotification(`Maximum ${maxFiles} photos allowed`, 'error');
        return;
    }
    
    Array.from(files).forEach(file => {
        // Validate file type
        if (!file.type.startsWith('image/')) {
            showNotification(`${file.name} is not a valid image file`, 'error');
            return;
        }
        
        // Validate file size
        if (file.size > maxSize) {
            showNotification(`${file.name} is too large. Maximum size is 5MB`, 'error');
            return;
        }
        
        // Create preview
        const reader = new FileReader();
        reader.onload = function(e) {
            createPhotoPreview(e.target.result, file.name);
        };
        reader.readAsDataURL(file);
    });
}

// Create photo preview
function createPhotoPreview(src, filename) {
    const photoPreview = document.getElementById('photoPreview');
    
    const photoItem = document.createElement('div');
    photoItem.className = 'photo-item';
    photoItem.innerHTML = `
        <img src="${src}" alt="${filename}">
        <button type="button" class="photo-remove" onclick="removePhoto(this)">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    photoPreview.appendChild(photoItem);
}

// Remove photo
function removePhoto(button) {
    const photoItem = button.closest('.photo-item');
    photoItem.remove();
}

// Initialize form validation
function initializeFormValidation() {
    const form = document.getElementById('propertyForm');
    const inputs = form.querySelectorAll('input, select, textarea');
    
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value.trim()) {
                validateField(this);
            }
        });
        
        input.addEventListener('input', function() {
            clearFieldError(this);
        });
    });
}

// Handle form submission
function handleFormSubmission() {
    // Final validation
    if (!validateAllSteps()) {
        showNotification('Please complete all required fields correctly.', 'error');
        return;
    }
    
    // Collect form data
    const formData = new FormData(document.getElementById('propertyForm'));
    const propertyData = {};
    
    // Convert FormData to object
    for (let [key, value] of formData.entries()) {
        if (propertyData[key]) {
            // Handle multiple values (like amenities)
            if (Array.isArray(propertyData[key])) {
                propertyData[key].push(value);
            } else {
                propertyData[key] = [propertyData[key], value];
            }
        } else {
            propertyData[key] = value;
        }
    }
    
    // Show loading state
    const submitBtn = document.getElementById('submitBtn');
    setButtonLoading(submitBtn, true);
    
    // Simulate form submission (replace with actual API call)
    setTimeout(() => {
        // Reset loading state
        setButtonLoading(submitBtn, false);
        
        // Show success message
        showSuccessModal();
        
        // Log form data (for development)
        console.log('Property submitted:', propertyData);
        
    }, 3000);
}

// Validate all steps
function validateAllSteps() {
    let isValid = true;
    
    for (let step = 1; step <= totalSteps; step++) {
        const formStep = document.querySelector(`.form-step[data-step="${step}"]`);
        const requiredFields = formStep.querySelectorAll('[required]');
        
        requiredFields.forEach(field => {
            if (!validateField(field)) {
                isValid = false;
            }
        });
    }
    
    return isValid;
}

// Show success modal
function showSuccessModal() {
    const modal = document.createElement('div');
    modal.className = 'success-modal';
    modal.innerHTML = `
        <div class="modal-overlay">
            <div class="modal-content">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h2>Property Submitted Successfully!</h2>
                <p>Thank you for submitting your property. Our team will review your listing and contact you within 24 hours.</p>
                <div class="modal-actions">
                    <button class="btn-primary" onclick="closeSuccessModal()">Continue</button>
                    <button class="btn-secondary" onclick="submitAnother()">Submit Another Property</button>
                </div>
            </div>
        </div>
    `;
    
    // Add styles
    modal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 10000;
        display: flex;
        align-items: center;
        justify-content: center;
    `;
    
    document.body.appendChild(modal);
    document.body.style.overflow = 'hidden';
}

// Close success modal
function closeSuccessModal() {
    const modal = document.querySelector('.success-modal');
    if (modal) {
        document.body.removeChild(modal);
        document.body.style.overflow = '';
        
        // Redirect to properties page
        window.location.href = 'properties.php';
    }
}

// Submit another property
function submitAnother() {
    const modal = document.querySelector('.success-modal');
    if (modal) {
        document.body.removeChild(modal);
        document.body.style.overflow = '';
        
        // Reset form
        document.getElementById('propertyForm').reset();
        document.getElementById('photoPreview').innerHTML = '';
        currentStep = 1;
        updateStepDisplay();
        scrollToTop();
    }
}

// Set button loading state
function setButtonLoading(button, isLoading) {
    if (isLoading) {
        button.disabled = true;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
    } else {
        button.disabled = false;
        button.innerHTML = '<i class="fas fa-check"></i> Submit Property';
    }
}

// Validation helpers
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidPhone(phone) {
    const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
    const cleanPhone = phone.replace(/[\s\-\(\)]/g, '');
    return phoneRegex.test(cleanPhone) && cleanPhone.length >= 10;
}

function isValidURL(url) {
    try {
        new URL(url);
        return true;
    } catch {
        return false;
    }
}

// Scroll to top of form
function scrollToTop() {
    document.querySelector('.submit-section').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
}

// Show notification
function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
        <span>${message}</span>
        <button class="notification-close">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? '#27ae60' : type === 'error' ? '#e74c3c' : '#3498db'};
        color: white;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        z-index: 10000;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 500;
        max-width: 400px;
        transform: translateX(100%);
        transition: transform 0.3s ease;
    `;
    
    // Style close button
    const closeBtn = notification.querySelector('.notification-close');
    closeBtn.style.cssText = `
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        padding: 0;
        margin-left: auto;
        opacity: 0.8;
        transition: opacity 0.3s ease;
    `;
    
    // Add to page
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Close button functionality
    closeBtn.addEventListener('click', function() {
        removeNotification(notification);
    });
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (document.body.contains(notification)) {
            removeNotification(notification);
        }
    }, 5000);
}

// Remove notification
function removeNotification(notification) {
    notification.style.transform = 'translateX(100%)';
    setTimeout(() => {
        if (document.body.contains(notification)) {
            document.body.removeChild(notification);
        }
    }, 300);
}

// Add modal styles to document
const modalStyles = document.createElement('style');
modalStyles.textContent = `
    .modal-overlay {
        background: rgba(0, 0, 0, 0.8);
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    
    .modal-content {
        background: white;
        border-radius: 15px;
        padding: 40px;
        text-align: center;
        max-width: 500px;
        width: 100%;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }
    
    .success-icon {
        font-size: 4rem;
        color: #27ae60;
        margin-bottom: 20px;
    }
    
    .modal-content h2 {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
    }
    
    .modal-content p {
        color: #666;
        line-height: 1.6;
        margin-bottom: 30px;
        font-size: 1.1rem;
    }
    
    .modal-actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .modal-actions button {
        padding: 12px 24px;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #2c5aa0, #1e3d72);
        color: white;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(44, 90, 160, 0.3);
    }
    
    .btn-secondary {
        background: #6c757d;
        color: white;
    }
    
    .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
    }
    
    @media (max-width: 480px) {
        .modal-actions {
            flex-direction: column;
        }
        
        .modal-actions button {
            width: 100%;
        }
    }
`;
document.head.appendChild(modalStyles);