<?php
function generate_csrf(): string {
  if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(16));
  }
  return $_SESSION['csrf'];
}

function verify_csrf(string $token): bool {
  return isset($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $token);
}

function auth_user(string $username, string $password): bool {
  $file = __DIR__ . '/users.txtdb';
  if (!is_readable($file)) return false;
  $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  foreach ($lines as $line) {
    // Format: username:password_hash
    [$u, $hash] = array_pad(explode(':', trim($line), 2), 2, null);
    if ($u !== null && hash_equals($u, $username) && $hash && password_verify($password, $hash)) {
      return true;
    }
  }
  return false;
}
