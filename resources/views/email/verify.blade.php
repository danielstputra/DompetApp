<!DOCTYPE html>
<html lang="en">
<body>
<p>Dear {{ $user->fullname }}</p>
<p>Your account has been created, please activate your account by clicking this link</p>
<p><a href="{{ route('user.verify', $user->email_token) }}">
	{{ route('user.verify', $user->email_token) }}
</a></p>
<p>Thanks</p>
</body>
</html> 