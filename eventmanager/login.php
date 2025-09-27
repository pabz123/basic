<?php
session_start();
include 'db_connect.php';

$message = '';
$alertClass = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check admin first
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $adminResult = $stmt->get_result();

    if ($adminResult->num_rows === 1) {
        $admin = $adminResult->fetch_assoc();

        // Check hashed or plain password
        if (password_verify($password, $admin['password']) || $password === $admin['password']) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['username'] = $username;
            header("Location: admin.php");
            exit;
        }
    }

    // Then check users
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $userResult = $stmt->get_result();

    if ($userResult->num_rows === 1) {
        $user = $userResult->fetch_assoc();

        if (password_verify($password, $user['password']) || $password === $user['password']) {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['username'] = $username;
            header("Location: user.php");
            exit;
        }
    }

    // If neither matched
    $message = "Invalid username or password.";
    $alertClass = "alert-danger";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login - Event Management System</title>
    <link rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <style>
        body {
            background: linear-gradient(120deg, #4361ee, #3a0ca3);
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background: #fff;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            max-width: 450px;
            width: 100%;
        }

        .card h2 {
            text-align: center;
            color: #3a0ca3;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 0.7rem;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .btn {
            width: 100%;
            background: #4895ef;
            color: #fff;
            padding: 0.8rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .btn:hover {
            background: #3a0ca3;
        }

        .alert {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            text-align: center;
            margin-bottom: 1rem;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .btn-success {
            background-color: #3cb043;
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
        }

        .btn-success:hover {
            background-color: #2e9c37;
        }
    </style>
</head>
<body>
    <section class="card">
        <h2><i class="fas fa-sign-in-alt"></i> Login to Your Account</h2>

        <?php if ($message): ?>
            <div class="alert <?php echo $alertClass; ?>"><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <div class="form-group">
                <label for="username"><i class="fas fa-user"></i> Username</label>
                <input type="text" id="username" name="username" required placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i> Login</button>
        </form>

        <p style="text-align: center; margin-top: 1.5rem;">
            Don’t have an account? <a href="signup.php" class="btn-success">Sign up here</a>
        </p>
    </section>
</body>
</html>
