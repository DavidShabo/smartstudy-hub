<?php
// SmartStudy Hub - Login Page
// Handles user authentication with proper security measures

session_start();
include_once(__DIR__ . '/../config/config.php');

// Redirect if already logged in
if (isset($_SESSION['user'])) {
    header('Location: profile.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    // Basic validation
    if (empty($email) || empty($password)) {
        $error = 'Please fill in all fields.';
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND status = 'active'");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Verify password (using password_verify for better security)
            if (password_verify($password, $user['password']) || md5($password) === $user['password']) {
                // Update last login time
                $updateStmt = $conn->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
                $updateStmt->bind_param("i", $user['id']);
                $updateStmt->execute();
                
                $_SESSION['user'] = $user;
                header('Location: profile.php');
                exit;
            } else {
                $error = 'Invalid email or password.';
            }
        } else {
            $error = 'Invalid email or password.';
        }
        
        $stmt->close();
    }
}

// Include header
include_once(__DIR__ . '/../includes/header.php');
?>

<div class="container">
    <div class="row justify-center">
        <div class="col-md-6 col-lg-4">
            <div class="card login-card">
                <div class="card-header text-center">
                    <h2><i class="fas fa-sign-in-alt"></i> Login</h2>
                    <p class="text-muted">Welcome back to SmartStudy Hub</p>
                </div>
                
                <div class="card-body">
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($success); ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" data-validate>
                        <div class="form-group">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i> Email Address
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="form-control" 
                                placeholder="Enter your email"
                                value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                                required
                                autocomplete="email"
                            >
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock"></i> Password
                            </label>
                            <div class="password-input-group">
                                <input 
                                    type="password" 
                                    id="password" 
                                    name="password" 
                                    class="form-control" 
                                    placeholder="Enter your password"
                                    required
                                    autocomplete="current-password"
                                >
                                <button type="button" class="password-toggle" onclick="togglePassword()">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" id="remember" name="remember" class="form-check-input">
                                <label for="remember" class="form-check-label">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <a href="forgot-password.php" class="text-muted">
                            <i class="fas fa-question-circle"></i> Forgot your password?
                        </a>
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="text-center">
                        <p class="text-muted">Don't have an account?</p>
                        <a href="register.php" class="btn btn-outline btn-block">
                            <i class="fas fa-user-plus"></i> Create Account
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Demo Accounts -->
            <div class="card mt-3">
                <div class="card-header">
                    <h6><i class="fas fa-info-circle"></i> Demo Accounts</h6>
                </div>
                <div class="card-body">
                    <div class="demo-accounts">
                        <div class="demo-account">
                            <strong>Admin:</strong> admin@smartstudy.com / admin123
                        </div>
                        <div class="demo-account">
                            <strong>Student:</strong> student@example.com / password123
                        </div>
                        <div class="demo-account">
                            <strong>Tutor:</strong> tutor@example.com / password123
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleBtn = document.querySelector('.password-toggle i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleBtn.classList.remove('fa-eye');
        toggleBtn.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleBtn.classList.remove('fa-eye-slash');
        toggleBtn.classList.add('fa-eye');
    }
}

// Auto-fill demo accounts
document.addEventListener('DOMContentLoaded', function() {
    const demoAccounts = document.querySelectorAll('.demo-account');
    demoAccounts.forEach(account => {
        account.addEventListener('click', function() {
            const text = this.textContent;
            const [email, password] = text.split(' / ');
            const emailPart = email.split(': ')[1];
            
            document.getElementById('email').value = emailPart;
            document.getElementById('password').value = password;
        });
    });
});
</script>

<style>
.login-card {
    margin-top: 2rem;
    box-shadow: var(--shadow-lg);
    border: none;
    border-radius: var(--radius-lg);
}

.login-card .card-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    color: var(--white);
    border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    padding: var(--spacing-xl);
}

.login-card .card-header h2 {
    margin-bottom: var(--spacing-sm);
    color: var(--white);
}

.password-input-group {
    position: relative;
    display: flex;
    align-items: center;
}

.password-toggle {
    position: absolute;
    right: var(--spacing-sm);
    background: none;
    border: none;
    color: var(--gray-500);
    cursor: pointer;
    padding: var(--spacing-xs);
    border-radius: var(--radius-sm);
    transition: color var(--transition-fast);
}

.password-toggle:hover {
    color: var(--primary-color);
}

.btn-block {
    width: 100%;
    padding: var(--spacing-md);
    font-size: var(--font-size-lg);
    font-weight: 600;
}

.demo-accounts {
    font-size: var(--font-size-sm);
}

.demo-account {
    padding: var(--spacing-sm);
    margin-bottom: var(--spacing-xs);
    background-color: var(--gray-50);
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: background-color var(--transition-fast);
    border: 1px solid var(--gray-200);
}

.demo-account:hover {
    background-color: var(--gray-100);
    border-color: var(--primary-color);
}

.demo-account strong {
    color: var(--primary-color);
}

.form-check {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
}

.form-check-input {
    margin: 0;
}

.form-check-label {
    margin: 0;
    cursor: pointer;
}

@media (max-width: 768px) {
    .login-card {
        margin-top: 1rem;
    }
    
    .col-md-6 {
        padding: 0 var(--spacing-sm);
    }
}
</style>

<?php
// Include footer
include_once(__DIR__ . '/../includes/footer.php');
?>
