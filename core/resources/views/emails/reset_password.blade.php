<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px;">
    <div style="max-width: 600px; background-color: #ffffff; padding: 20px; border-radius: 8px; margin: 0 auto;">
        <h2 style="text-align: center; color: #333;">Password Reset Request</h2>

        <p>Hello,</p>

        <p>We received a request to reset your password. Here is your password reset code:</p>

        <h1 style="text-align: center; background-color: #f4f4f9; padding: 10px 0; color: #333;">
            {{ $data['code'] }}
        </h1>

        <p>Additional Information:</p>
        <ul>
            <li><strong>Operating System:</strong> {{ $data['operating_system'] }}</li>
            <li><strong>Browser:</strong> {{ $data['browser'] }}</li>
            <li><strong>IP Address:</strong> {{ $data['ip'] }}</li>
            <li><strong>Time:</strong> {{ $data['time'] }}</li>
        </ul>

        <p>If you did not request this change, you can safely ignore this email.</p>

        <p>Thank you for using our service!</p>

        <p style="text-align: center;">&copy; {{ date('Y') }} EbbayMart</p>
    </div>
</body>
</html>
