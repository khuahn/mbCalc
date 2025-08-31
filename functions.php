<?php
function auth_user($username, $password) {
    $lines = file('users.txtdb', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($stored_user, $stored_hash) = explode('|', trim($line));
        if ($stored_user === $username && password_verify($password, $stored_hash)) {
            return true;
        }
    }
    return false;
}

function generate_csrf() {
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function verify_csrf($token) {
    return isset($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $token);
}
