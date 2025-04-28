<?php
session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Stack Login & Register Form With User & Admin Page | Codehal</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="container">
    <div class="form-box <?= isActiveForm('login', $activeForm); ?> " id="login-form">
        <form action="login_register.php" method="POST">
            <h1>Login</h1>
            <?= showError($errors['login']) ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Login</button>
            <p class="login-register-text">Don't have an account? <a href="#" onclick="showForm('register-form')" id="register-link">Register Here</a></p>
        </form>
    </div>
    <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
        <form action="login_register.php" method="POST">
            <h1>Register</h1>
            <?= showError($errors['register']) ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="">--select role--</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit" class="btn">Register</button>
            <p class="login-register-text">Already have an account? <a href="#" onclick="showForm('login-form')" id="login-link">Login Here</a></p>
        </form>
           
    </div>


    <script src="script.js"></script>
</body>

</html>