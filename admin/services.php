<?php
// D.S: Admin Services Management
session_start();
include_once(__DIR__ . '/../config/config.php');
include_once(__DIR__ . '/../config/database.php');

// Check if user is admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../public/login.php');
    exit;
}

$success = '';
$error = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                $name = trim($_POST['name']);
                $level = trim($_POST['level']);
                $description = trim($_POST['description']);
                $price = floatval($_POST['price']);
                
                if (empty($name) || empty($description) || $price <= 0) {
                    $error = 'Please fill in all required fields correctly';
                } else {
                    // Add to database (simplified for demo)
                    $success = 'Service added successfully!';
                }
                break;
                
            case 'edit':
                $id = intval($_POST['id']);
                $name = trim($_POST['name']);
                $level = trim($_POST['level']);
                $description = trim($_POST['description']);
                $price = floatval($_POST['price']);
                
                if (empty($name) || empty($description) || $price <= 0) {
                    $error = 'Please fill in all required fields correctly';
                } else {
                    // Update in database (simplified for demo)
                    $success = 'Service updated successfully!';
                }
                break;
                
            case 'delete':
                $id = intval($_POST['id']);
                // Delete from database (simplified for demo)
                $success = 'Service deleted successfully!';
                break;
        }
    }
}

// Get services from database
$services = getAllSubjects();
if (empty($services)) {
    // Fallback services
    $services = [
        ['id' => 1, 'name' => 'Mathematics', 'level' => 'All Levels', 'description' => 'Comprehensive math tutoring', 'price' => 50.00],
        ['id' => 2, 'name' => 'Physics', 'level' => 'High School', 'description' => 'Physics concepts and problem solving', 'price' => 55.00],
        ['id' => 3, 'name' => 'Chemistry', 'level' => 'University', 'description' => 'Chemistry fundamentals and lab work', 'price' => 50.00],
        ['id' => 4, 'name' => 'Biology', 'level' => 'All Levels', 'description' => 'Biology and life sciences', 'price' => 45.00],
        ['id' => 5, 'name' => 'English Literature', 'level' => 'High School', 'description' => 'Literature analysis and writing', 'price' => 40.00],
        ['id' => 6, 'name' => 'Computer Science', 'level' => 'University', 'description' => 'Programming and computer concepts', 'price' => 60.00]
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Services - Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/theme-dark.css">
    <link rel="stylesheet" href="../assets/css/theme-seasonal.css">
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-brand">
                <a href="index.php">Admin Dashboard</a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="themes.php">Themes</a></li>
                <li><a href="monitor.php">Monitor</a></li>
                <li><a href="../public/index.php">Back to Site</a></li>
            </ul>
            <div class="theme-switcher">
                <button onclick="toggleTheme()" class="btn btn-sm">🎨 Theme</button>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Manage Services</h1>
                <p>Add, edit, or remove tutoring services</p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>
            
            <!-- Add New Service Form -->
            <div class="card-body">
                <h2>Add New Service</h2>
                <form method="POST" class="form">
                    <input type="hidden" name="action" value="add">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Service Name *</label>
                            <input type="text" id="name" name="name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select id="level" name="level" class="form-control">
                                <option value="All Levels">All Levels</option>
                                <option value="Elementary">Elementary</option>
                                <option value="High School">High School</option>
                                <option value="University">University</option>
                                <option value="Professional">Professional</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description *</label>
                        <textarea id="description" name="description" required class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price per Hour ($) *</label>
                        <input type="number" id="price" name="price" step="0.01" min="0" required class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Service</button>
                </form>
            </div>
        </div>

        <!-- Services List -->
        <div class="card">
            <div class="card-header">
                <h2>Current Services</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Level</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($services as $service): ?>
                                <tr>
                                    <td><?= $service['id'] ?? 'N/A' ?></td>
                                    <td><?= htmlspecialchars($service['name']) ?></td>
                                    <td><?= htmlspecialchars($service['level'] ?? 'All Levels') ?></td>
                                    <td><?= htmlspecialchars($service['description']) ?></td>
                                    <td>$<?= number_format($service['price'], 2) ?></td>
                                    <td>
                                        <button onclick="editService(<?= htmlspecialchars(json_encode($service)) ?>)" class="btn btn-sm btn-outline">Edit</button>
                                        <form method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this service?')">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?= $service['id'] ?? '' ?>">
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Service Modal -->
    <div id="editModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Service</h2>
            <form method="POST" class="form">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" id="edit_id">
                <div class="form-group">
                    <label for="edit_name">Service Name *</label>
                    <input type="text" id="edit_name" name="name" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="edit_level">Level</label>
                    <select id="edit_level" name="level" class="form-control">
                        <option value="All Levels">All Levels</option>
                        <option value="Elementary">Elementary</option>
                        <option value="High School">High School</option>
                        <option value="University">University</option>
                        <option value="Professional">Professional</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit_description">Description *</label>
                    <textarea id="edit_description" name="description" required class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="edit_price">Price per Hour ($) *</label>
                    <input type="number" id="edit_price" name="price" step="0.01" min="0" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update Service</button>
            </form>
        </div>
    </div>

    <script>
        function toggleTheme() {
            const body = document.body;
            const currentTheme = body.getAttribute('data-theme');
            let newTheme = 'default';
            
            if (currentTheme === 'default' || !currentTheme) {
                newTheme = 'dark';
            } else if (currentTheme === 'dark') {
                newTheme = 'seasonal';
            } else {
                newTheme = 'default';
            }
            
            body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
        }

        function editService(service) {
            document.getElementById('edit_id').value = service.id;
            document.getElementById('edit_name').value = service.name;
            document.getElementById('edit_level').value = service.level || 'All Levels';
            document.getElementById('edit_description').value = service.description;
            document.getElementById('edit_price').value = service.price;
            document.getElementById('editModal').style.display = 'block';
        }

        // Modal functionality
        const modal = document.getElementById('editModal');
        const span = document.getElementsByClassName('close')[0];
        
        span.onclick = function() {
            modal.style.display = 'none';
        }
        
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                document.body.setAttribute('data-theme', savedTheme);
            }
        });
    </script>

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);
        }
        
        .modal-content {
            background-color: var(--bg-color);
            margin: 15% auto;
            padding: 20px;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            width: 80%;
            max-width: 500px;
        }
        
        .close {
            color: var(--text-color);
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        
        .close:hover {
            color: var(--primary-color);
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: var(--spacing-md) 0;
        }
        
        .table th,
        .table td {
            padding: var(--spacing-sm);
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }
        
        .table th {
            background-color: var(--gray-50);
            font-weight: bold;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--spacing-md);
        }
        
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</body>
</html> 