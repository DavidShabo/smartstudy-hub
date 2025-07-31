<?php
// SmartStudy Hub - Services Page
// Displays all available tutoring services with filtering and search

session_start();
include_once(__DIR__ . '/../config/config.php');

// Get search and filter parameters
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$price_min = isset($_GET['price_min']) ? floatval($_GET['price_min']) : 0;
$price_max = isset($_GET['price_max']) ? floatval($_GET['price_max']) : 1000;

// Build query
$where_conditions = ["status = 'active'"];
$params = [];
$types = '';

if (!empty($search)) {
    $where_conditions[] = "(name LIKE ? OR description LIKE ? OR category LIKE ?)";
    $search_param = "%$search%";
    $params[] = $search_param;
    $params[] = $search_param;
    $params[] = $search_param;
    $types .= 'sss';
}

if (!empty($category)) {
    $where_conditions[] = "category = ?";
    $params[] = $category;
    $types .= 's';
}

if ($price_min > 0) {
    $where_conditions[] = "price >= ?";
    $params[] = $price_min;
    $types .= 'd';
}

if ($price_max < 1000) {
    $where_conditions[] = "price <= ?";
    $params[] = $price_max;
    $types .= 'd';
}

$where_clause = implode(' AND ', $where_conditions);
$sql = "SELECT * FROM services WHERE $where_clause ORDER BY name ASC";

// Execute query
$services = [];
if (!empty($params)) {
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query($sql);
}

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $services[] = $row;
    }
}

// Get categories for filter
$categories = [];
$cat_sql = "SELECT DISTINCT category FROM services WHERE status = 'active' ORDER BY category";
$cat_result = $conn->query($cat_sql);
if ($cat_result) {
    while ($row = $cat_result->fetch_assoc()) {
        $categories[] = $row['category'];
    }
}

// Include header
include_once(__DIR__ . '/../includes/header.php');
?>

<div class="container">
    <!-- Page Header -->
    <div class="page-header">
        <h1><i class="fas fa-graduation-cap"></i> Tutoring Services</h1>
        <p>Discover our comprehensive range of tutoring services designed to help you succeed academically</p>
    </div>

    <!-- Search and Filter Section -->
    <div class="filter-section">
        <div class="filter-card">
            <form method="GET" class="filter-form">
                <div class="filter-grid">
                    <div class="filter-group">
                        <label for="search" class="form-label">
                            <i class="fas fa-search"></i> Search Services
                        </label>
                        <input 
                            type="text" 
                            id="search" 
                            name="search" 
                            class="form-control" 
                            placeholder="Search by subject, tutor, or description"
                            value="<?php echo htmlspecialchars($search); ?>"
                        >
                    </div>
                    
                    <div class="filter-group">
                        <label for="category" class="form-label">
                            <i class="fas fa-tags"></i> Category
                        </label>
                        <select id="category" name="category" class="form-control">
                            <option value="">All Categories</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?php echo htmlspecialchars($cat); ?>" 
                                        <?php echo $category === $cat ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($cat); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="price_min" class="form-label">
                            <i class="fas fa-dollar-sign"></i> Min Price
                        </label>
                        <input 
                            type="number" 
                            id="price_min" 
                            name="price_min" 
                            class="form-control" 
                            placeholder="0"
                            min="0"
                            step="0.01"
                            value="<?php echo $price_min > 0 ? $price_min : ''; ?>"
                        >
                    </div>
                    
                    <div class="filter-group">
                        <label for="price_max" class="form-label">
                            <i class="fas fa-dollar-sign"></i> Max Price
                        </label>
                        <input 
                            type="number" 
                            id="price_max" 
                            name="price_max" 
                            class="form-control" 
                            placeholder="1000"
                            min="0"
                            step="0.01"
                            value="<?php echo $price_max < 1000 ? $price_max : ''; ?>"
                        >
                    </div>
                </div>
                
                <div class="filter-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-filter"></i> Apply Filters
                    </button>
                    <a href="/public/services.php" class="btn btn-outline">
                        <i class="fas fa-times"></i> Clear Filters
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Summary -->
    <div class="results-summary">
        <div class="results-info">
            <h3>Found <?php echo count($services); ?> service<?php echo count($services) !== 1 ? 's' : ''; ?></h3>
            <?php if (!empty($search) || !empty($category) || $price_min > 0 || $price_max < 1000): ?>
                <p class="text-muted">Filtered results</p>
            <?php endif; ?>
        </div>
        
        <div class="sort-options">
            <label for="sort" class="form-label">Sort by:</label>
            <select id="sort" class="form-control" onchange="sortServices(this.value)">
                <option value="name">Name A-Z</option>
                <option value="name_desc">Name Z-A</option>
                <option value="price">Price Low-High</option>
                <option value="price_desc">Price High-Low</option>
                <option value="category">Category</option>
            </select>
        </div>
    </div>

    <!-- Services Grid -->
    <div class="services-grid" id="services-grid">
        <?php if (empty($services)): ?>
            <div class="no-results">
                <div class="no-results-content">
                    <i class="fas fa-search"></i>
                    <h3>No services found</h3>
                    <p>Try adjusting your search criteria or browse all services.</p>
                    <a href="/public/services.php" class="btn btn-primary">
                        <i class="fas fa-list"></i> View All Services
                    </a>
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($services as $service): ?>
                <div class="service-card" data-service-id="<?php echo $service['id']; ?>">
                    <div class="service-image">
                        <img src="/assets/images/services/<?php echo strtolower(str_replace(' ', '-', $service['name'])); ?>.jpg" 
                             alt="<?php echo htmlspecialchars($service['name']); ?>"
                             onerror="this.src='/assets/images/services/default.jpg'">
                        <div class="service-overlay">
                            <div class="service-actions">
                                <a href="/public/service.php?id=<?php echo $service['id']; ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> View Details
                                </a>
                                <a href="/public/book_session.php?service_id=<?php echo $service['id']; ?>" class="btn btn-outline btn-sm">
                                    <i class="fas fa-calendar"></i> Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="service-content">
                        <div class="service-header">
                            <h3><?php echo htmlspecialchars($service['name']); ?></h3>
                            <span class="service-category"><?php echo htmlspecialchars($service['category']); ?></span>
                        </div>
                        
                        <p class="service-description">
                            <?php echo htmlspecialchars(substr($service['description'], 0, 100)); ?>
                            <?php if (strlen($service['description']) > 100): ?>...<?php endif; ?>
                        </p>
                        
                        <div class="service-meta">
                            <div class="service-price">
                                <span class="price-amount">$<?php echo number_format($service['price'], 2); ?></span>
                                <span class="price-unit">/hour</span>
                            </div>
                            
                            <div class="service-duration">
                                <i class="fas fa-clock"></i>
                                <span><?php echo $service['duration']; ?> min</span>
                            </div>
                        </div>
                        
                        <div class="service-footer">
                            <div class="service-rating">
                                <div class="stars">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="fas fa-star <?php echo $i <= 4 ? 'active' : ''; ?>"></i>
                                    <?php endfor; ?>
                                </div>
                                <span class="rating-text">(4.2)</span>
                            </div>
                            
                            <a href="/public/service.php?id=<?php echo $service['id']; ?>" class="btn btn-primary">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if (count($services) > 12): ?>
        <div class="pagination-container">
            <nav class="pagination">
                <a href="#" class="page-link disabled">
                    <i class="fas fa-chevron-left"></i> Previous
                </a>
                <div class="page-numbers">
                    <a href="#" class="page-link active">1</a>
                    <a href="#" class="page-link">2</a>
                    <a href="#" class="page-link">3</a>
                    <span class="page-ellipsis">...</span>
                    <a href="#" class="page-link">10</a>
                </div>
                <a href="#" class="page-link">
                    Next <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    <?php endif; ?>
</div>

<style>
/* Page Header */
.page-header {
    text-align: center;
    margin-bottom: var(--spacing-2xl);
    padding: var(--spacing-xl) 0;
}

.page-header h1 {
    font-size: var(--font-size-4xl);
    margin-bottom: var(--spacing-md);
    color: var(--text-primary);
}

.page-header p {
    font-size: var(--font-size-lg);
    color: var(--text-secondary);
    max-width: 600px;
    margin: 0 auto;
}

/* Filter Section */
.filter-section {
    margin-bottom: var(--spacing-2xl);
}

.filter-card {
    background: var(--white);
    border-radius: var(--radius-lg);
    padding: var(--spacing-xl);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-primary);
}

.filter-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--spacing-lg);
    margin-bottom: var(--spacing-lg);
}

.filter-group {
    display: flex;
    flex-direction: column;
}

.filter-actions {
    display: flex;
    gap: var(--spacing-md);
    justify-content: center;
}

/* Results Summary */
.results-summary {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--spacing-xl);
    padding: var(--spacing-lg);
    background: var(--bg-secondary);
    border-radius: var(--radius-md);
}

.results-info h3 {
    margin-bottom: var(--spacing-xs);
    color: var(--text-primary);
}

.sort-options {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
}

.sort-options .form-control {
    width: auto;
    min-width: 150px;
}

/* Services Grid */
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: var(--spacing-lg);
    margin-bottom: var(--spacing-2xl);
}

.service-card {
    background: var(--white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-normal);
    border: 1px solid var(--border-primary);
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary-color);
}

.service-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform var(--transition-normal);
}

.service-card:hover .service-image img {
    transform: scale(1.1);
}

.service-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity var(--transition-normal);
}

.service-card:hover .service-overlay {
    opacity: 1;
}

.service-actions {
    display: flex;
    gap: var(--spacing-sm);
}

.service-content {
    padding: var(--spacing-lg);
}

.service-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: var(--spacing-md);
}

.service-header h3 {
    margin: 0;
    color: var(--text-primary);
    font-size: var(--font-size-lg);
}

.service-category {
    background: var(--primary-color);
    color: var(--white);
    padding: var(--spacing-xs) var(--spacing-sm);
    border-radius: var(--radius-sm);
    font-size: var(--font-size-xs);
    font-weight: 500;
}

.service-description {
    color: var(--text-secondary);
    line-height: 1.6;
    margin-bottom: var(--spacing-md);
}

.service-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--spacing-md);
}

.service-price {
    display: flex;
    align-items: baseline;
    gap: var(--spacing-xs);
}

.price-amount {
    font-size: var(--font-size-xl);
    font-weight: 700;
    color: var(--primary-color);
}

.price-unit {
    color: var(--text-secondary);
    font-size: var(--font-size-sm);
}

.service-duration {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
    color: var(--text-secondary);
    font-size: var(--font-size-sm);
}

.service-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: var(--spacing-md);
    border-top: 1px solid var(--border-primary);
}

.service-rating {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
}

.stars {
    display: flex;
    gap: 2px;
}

.stars .fa-star {
    color: var(--gray-300);
    font-size: var(--font-size-sm);
}

.stars .fa-star.active {
    color: var(--accent-color);
}

.rating-text {
    color: var(--text-secondary);
    font-size: var(--font-size-sm);
}

/* No Results */
.no-results {
    grid-column: 1 / -1;
    text-align: center;
    padding: var(--spacing-2xl);
}

.no-results-content i {
    font-size: 4rem;
    color: var(--gray-400);
    margin-bottom: var(--spacing-lg);
}

.no-results-content h3 {
    margin-bottom: var(--spacing-md);
    color: var(--text-primary);
}

.no-results-content p {
    color: var(--text-secondary);
    margin-bottom: var(--spacing-lg);
}

/* Pagination */
.pagination-container {
    display: flex;
    justify-content: center;
    margin-top: var(--spacing-2xl);
}

.pagination {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
}

.page-numbers {
    display: flex;
    gap: var(--spacing-xs);
}

.page-link {
    padding: var(--spacing-sm) var(--spacing-md);
    border: 1px solid var(--border-primary);
    border-radius: var(--radius-sm);
    color: var(--text-primary);
    text-decoration: none;
    transition: all var(--transition-fast);
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
}

.page-link:hover {
    background-color: var(--primary-color);
    color: var(--white);
    border-color: var(--primary-color);
}

.page-link.active {
    background-color: var(--primary-color);
    color: var(--white);
    border-color: var(--primary-color);
}

.page-link.disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.page-ellipsis {
    padding: var(--spacing-sm) var(--spacing-md);
    color: var(--text-secondary);
}

/* Responsive Design */
@media (max-width: 768px) {
    .filter-grid {
        grid-template-columns: 1fr;
    }
    
    .filter-actions {
        flex-direction: column;
    }
    
    .results-summary {
        flex-direction: column;
        gap: var(--spacing-md);
        text-align: center;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
    }
    
    .service-footer {
        flex-direction: column;
        gap: var(--spacing-md);
        align-items: stretch;
    }
    
    .service-actions {
        flex-direction: column;
    }
}
</style>

<script>
// Sort services
function sortServices(sortBy) {
    const servicesGrid = document.getElementById('services-grid');
    const services = Array.from(servicesGrid.querySelectorAll('.service-card'));
    
    services.sort((a, b) => {
        const aName = a.querySelector('h3').textContent.toLowerCase();
        const bName = b.querySelector('h3').textContent.toLowerCase();
        const aPrice = parseFloat(a.querySelector('.price-amount').textContent.replace('$', ''));
        const bPrice = parseFloat(b.querySelector('.price-amount').textContent.replace('$', ''));
        const aCategory = a.querySelector('.service-category').textContent.toLowerCase();
        const bCategory = b.querySelector('.service-category').textContent.toLowerCase();
        
        switch(sortBy) {
            case 'name':
                return aName.localeCompare(bName);
            case 'name_desc':
                return bName.localeCompare(aName);
            case 'price':
                return aPrice - bPrice;
            case 'price_desc':
                return bPrice - aPrice;
            case 'category':
                return aCategory.localeCompare(bCategory);
            default:
                return 0;
        }
    });
    
    // Re-append sorted services
    services.forEach(service => servicesGrid.appendChild(service));
}

// Auto-submit form on filter change
document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.querySelector('.filter-form');
    const searchInput = document.getElementById('search');
    const categorySelect = document.getElementById('category');
    
    // Debounced search
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            filterForm.submit();
        }, 500);
    });
    
    // Auto-submit on category change
    categorySelect.addEventListener('change', function() {
        filterForm.submit();
    });
});

// Service card interactions
document.addEventListener('DOMContentLoaded', function() {
    const serviceCards = document.querySelectorAll('.service-card');
    
    serviceCards.forEach(card => {
        card.addEventListener('click', function(e) {
            // Don't trigger if clicking on buttons or links
            if (e.target.tagName === 'A' || e.target.tagName === 'BUTTON' || 
                e.target.closest('a') || e.target.closest('button')) {
                return;
            }
            
            const serviceId = this.dataset.serviceId;
            if (serviceId) {
                window.location.href = `/public/service.php?id=${serviceId}`;
            }
        });
    });
});
</script>

<?php
// Include footer
include_once(__DIR__ . '/../includes/footer.php');
?>