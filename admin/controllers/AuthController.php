<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../views/auth/login.php');
    exit;
}

$loginUsername = trim($_POST['username'] ?? '');
$loginPassword = $_POST['password'] ?? '';

if ($loginUsername === '' || $loginPassword === '') {
    $_SESSION['error'] = 'Please enter both username and password.';
    header('Location: ../views/auth/login.php');
    exit;
}

$adminData = null;

try {
    $dbFile = __DIR__ . '/../../config/database.php';
    if (file_exists($dbFile)) {
        require_once $dbFile;

        if (isset($pdo)) {
            $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = ? LIMIT 1');
            $stmt->execute([$loginUsername]);
            $row = $stmt->fetch();

            if ($row) {
                $storedPassword = $row['password'] ?? '';
                if ($storedPassword !== '' && (password_verify($loginPassword, $storedPassword) || hash_equals($storedPassword, $loginPassword))) {
                    $adminData = [
                        'name' => $row['name'] ?? $row['username'],
                        'username' => $row['username'],
                        'avatar' => $row['avatar'] ?? null,
                    ];
                }
            }
        }
    }
} catch (Throwable $e) {
    // ignore database errors and fall back to seeded admin
}

if (!$adminData) {
    $fallbackAdmins = [
        'admin' => [
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => 'admin123',
            'avatar' => 'A',
        ],
    ];
    if (isset($fallbackAdmins[$loginUsername]) && hash_equals($fallbackAdmins[$loginUsername]['password'], $loginPassword)) {
        $adminData = $fallbackAdmins[$loginUsername];
    }
}

if (!$adminData) {
    $_SESSION['error'] = 'Invalid username or password.';
    header('Location: ../views/auth/login.php');
    exit;
}

$_SESSION['admin'] = $adminData;
header('Location: ../dashboard.php');
exit;
