<!DOCTYPE html>
<html>
<head>
    <title>Reset Your Password</title>
</head>
<body>
<p>Click the link below to reset your password:</p>
<a href="{{ route('password.reset', ['token' => $token])  }}">Reset Password</a>
</body>
</html>

