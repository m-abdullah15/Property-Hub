// Properties page functionality

document.addEventListener('DOMContentLoaded', function() {
    // Initialize properties page
    initializeFilters();
    initializeViewToggle();
    initializePagination();
    initializePropertyActions();
    
    // Load properties from URL parameters if coming from search
    loadPropertiesFromURL();
});

// Initialize filters functionality
function initializeFilters() {
    const filtersForm = document.getElementById('filtersForm');
    
    if (filtersForm) {
        filtersForm.addEventListener('submit', function(e) {
            e.preventDefault();
            applyFilters();
        });
        
        // Apply filters on change for better UX
        const filterInputs = filtersForm.querySelectorAll('select');
        filterInputs.forEach(input => {
            input.addEventListener('change', debounce(applyFilters, 500));
        });
    }
}

// Apply filters to properties
function applyFilters() {
    const formData = new FormData(document.getElementById('filtersForm'));
    const filters = {};
    
    for (let [key, value] of formData.entries()) {
        if (value) {
            filters[key] = value;
        }
    }
    
    // Update URL with filters
    const searchParams = new URLSearchParams(filters);
    const newURL = `${window.location.pathname}?${searchParams.toString()}`;
    window.history.pushState({}, '', newURL);
    
    // Filter properties
    filterProperties(filters);
    
    // Update results count
    updateResultsCount();
}

// Filter properties based on criteria
function filterProperties(filters) {
    const propertyCards = document.querySelectorAll('.property-card');
    let visibleCount = 0;
    
    propertyCards.forEach(card => {
        let shouldShow = true;
        
        // Apply location filter
        if (filters.location) {
            const location = card.querySelector('.property-location').textContent.toLowerCase();
            if (!location.includes(filters.location.replace('-', ' '))) {
                shouldShow = false;
            }
        }
        
        // Apply property type filter
        if (filters.property_type) {
            const title = card.querySelector('.property-title').textContent.toLowerCase();
            if (!title.includes(filters.property_type)) {
                shouldShow = false;
            }
        }
        
        // Apply price range filter
        if (filters.price_range) {
            const priceText = card.querySelector('.property-price').textContent;
            const price = extractPrice(priceText);
            if (!isPriceInRange(price, filters.price_range)) {
                shouldShow = false;
            }
        }
        
        // Apply bedrooms filter
        if (filters.bedrooms) {
            const bedroomsText = card.querySelector('.feature i.fa-bed').parentElement.textContent;
            const bedrooms = parseInt(bedroomsText.match(/\d+/)[0]);
            if (bedrooms < parseInt(filters.bedrooms)) {
                shouldShow = false;
            }
        }
        
        // Show/hide card
        if (shouldShow) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });
    
    // Apply sorting
    if (filters.sort) {
        sortProperties(filters.sort);
    }
}

// Extract price from price text
function extractPrice(priceText) {
    const match = priceText.match(/\$([0-9,]+)/);
    return match ? parseInt(match[1].replace(/,/g, '')) : 0;
}

// Check if price is in range
function isPriceInRange(price, range) {
    if (range === '1000000+') {
        return price >= 1000000;
    }
    
    const [min, max] = range.split('-').map(p => parseInt(p));
    return price >= min && price <= max;
}

// Sort properties
function sortProperties(sortBy) {
    const grid = document.getElementById('propertiesGrid');
    const cards = Array.from(grid.querySelectorAll('.property-card:not([style*="display: none"])'));
    
    cards.sort((a, b) => {
        switch (sortBy) {
            case 'price-low':
                return extractPrice(a.querySelector('.property-price').textContent) - 
                       extractPrice(b.querySelector('.property-price').textContent);
            case 'price-high':
                return extractPrice(b.querySelector('.property-price').textContent) - 
                       extractPrice(a.querySelector('.property-price').textContent);
            case 'bedrooms':
                const bedroomsA = parseInt(a.querySelector('.feature i.fa-bed').parentElement.textContent.match(/\d+/)[0]);
                const bedroomsB = parseInt(b.querySelector('.feature i.fa-bed').parentElement.textContent.match(/\d+/)[0]);
                return bedroomsB - bedroomsA;
            default:
                return 0;
        }
    });
    
    // Re-append sorted cards
    cards.forEach(card => grid.appendChild(card));
}

// Initialize view toggle functionality
function initializeViewToggle() {
    const viewButtons = document.querySelectorAll('.view-btn');
    const propertiesGrid = document.getElementById('propertiesGrid');
    
    viewButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            viewButtons.forEach(b => b.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Toggle grid view
            const view = this.dataset.view;
            if (view === 'list') {
                propertiesGrid.classList.add('list-view');
            } else {
                propertiesGrid.classList.remove('list-view');
            }
        });
    });
}

// Initialize pagination
function initializePagination() {
    const pageNumbers = document.querySelectorAll('.page-number');
    const prevBtn = document.querySelector('.page-btn:first-child');
    const nextBtn = document.querySelector('.page-btn:last-child');
    
    pageNumbers.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all page numbers
            pageNumbers.forEach(p => p.classList.remove('active'));
            
            // Add active class to clicked page
            this.classList.add('active');
            
            // Update pagination buttons state
            updatePaginationState();
            
            // Scroll to top of properties section
            document.querySelector('.properties-section').scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    
    // Previous/Next button functionality
    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            const activePage = document.querySelector('.page-number.active');
            const prevPage = activePage.previousElementSibling;
            if (prevPage && prevPage.classList.contains('page-number')) {
                activePage.classList.remove('active');
                prevPage.classList.add('active');
                updatePaginationState();
            }
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            const activePage = document.querySelector('.page-number.active');
            const nextPage = activePage.nextElementSibling;
            if (nextPage && nextPage.classList.contains('page-number')) {
                activePage.classList.remove('active');
                nextPage.classList.add('active');
                updatePaginationState();
            }
        });
    }
}

// Update pagination button states
function updatePaginationState() {
    const activePage = document.querySelector('.page-number.active');
    const prevBtn = document.querySelector('.page-btn:first-child');
    const nextBtn = document.querySelector('.page-btn:last-child');
    const pageNumbers = document.querySelectorAll('.page-number');
    
    // Update previous button
    if (activePage === pageNumbers[0]) {
        prevBtn.disabled = true;
    } else {
        prevBtn.disabled = false;
    }
    
    // Update next button
    if (activePage === pageNumbers[pageNumbers.length - 1]) {
        nextBtn.disabled = true;
    } else {
        nextBtn.disabled = false;
    }
}

// Initialize property actions (favorites, share, contact)
function initializePropertyActions() {
    // Favorite buttons
    const favoriteButtons = document.querySelectorAll('.action-btn[title="Add to Favorites"]');
    favoriteButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleFavorite(this);
        });
    });
    
    // Share buttons
    const shareButtons = document.querySelectorAll('.action-btn[title="Share"]');
    shareButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            shareProperty(this);
        });
    });
    
    // Contact agent buttons
    const contactButtons = document.querySelectorAll('.contact-btn');
    contactButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            contactAgent(this);
        });
    });
}

// Toggle favorite status
function toggleFavorite(button) {
    const icon = button.querySelector('i');
    
    if (icon.classList.contains('far')) {
        // Add to favorites
        icon.classList.remove('far');
        icon.classList.add('fas');
        button.style.color = '#e74c3c';
        showNotification('Property added to favorites!', 'success');
    } else {
        // Remove from favorites
        icon.classList.remove('fas');
        icon.classList.add('far');
        button.style.color = '';
        showNotification('Property removed from favorites!', 'info');
    }
}

// Share property
function shareProperty(button) {
    const propertyCard = button.closest('.property-card');
    const propertyTitle = propertyCard.querySelector('.property-title').textContent;
    const propertyPrice = propertyCard.querySelector('.property-price').textContent;
    
    if (navigator.share) {
        navigator.share({
            title: propertyTitle,
            text: `Check out this property: ${propertyTitle} - ${propertyPrice}`,
            url: window.location.href
        });
    } else {
        // Fallback: copy to clipboard
        const shareText = `Check out this property: ${propertyTitle} - ${propertyPrice}\n${window.location.href}`;
        navigator.clipboard.writeText(shareText).then(() => {
            showNotification('Property link copied to clipboard!', 'success');
        });
    }
}

// Contact agent
function contactAgent(button) {
    const propertyCard = button.closest('.property-card');
    const agentName = propertyCard.querySelector('.agent-info span').textContent;
    const propertyTitle = propertyCard.querySelector('.property-title').textContent;
    
    // In a real application, this would open a contact form or redirect to contact page
    showNotification(`Contacting ${agentName} about "${propertyTitle}"...`, 'info');
    
    // Simulate contact action
    setTimeout(() => {
        showNotification('Contact request sent successfully!', 'success');
    }, 1500);
}

// Load properties based on URL parameters
function loadPropertiesFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    
    if (urlParams.toString()) {
        // Populate filter form with URL parameters
        urlParams.forEach((value, key) => {
            const input = document.querySelector(`[name="${key}"]`);
            if (input) {
                input.value = value;
            }
        });
        
        // Apply filters
        const filters = {};
        urlParams.forEach((value, key) => {
            filters[key] = value;
        });
        
        filterProperties(filters);
        updateResultsCount();
    }
}

// Update results count
function updateResultsCount() {
    const visibleCards = document.querySelectorAll('.property-card:not([style*="display: none"])');
    const resultsCount = document.getElementById('results-count');
    
    if (resultsCount) {
        const count = visibleCards.length;
        resultsCount.textContent = `${count} Properties Found`;
    }
}

// Show notification
function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
        <span>${message}</span>
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
        transform: translateX(100%);
        transition: transform 0.3s ease;
    `;
    
    // Add to page
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Debounce function for performance
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}