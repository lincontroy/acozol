<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎉 You Earned a Commission from Acozol!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
        .email-container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .email-header {
            background-color: #4caf50;
            color: #ffffff;
            text-align: center;
            padding: 20px 10px;
        }
        .email-header h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .email-header p {
            font-size: 18px;
        }
        .email-body {
            padding: 30px 20px;
        }
        .email-body h2 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #4caf50;
        }
        .email-body p {
            font-size: 16px;
            margin-bottom: 15px;
        }
        .email-footer {
            background-color: #4caf50;
            color: #ffffff;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            font-size: 16px;
            color: #ffffff;
            background-color: #4caf50;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .footer-note {
            font-size: 12px;
            color: #777;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="email-header">
            <h1>🎉 Congratulations, {{ $order['upline_username'] }}! 🎉</h1>
            <p>You’ve Earned a Commission from Acozol</p>
        </div>

        <!-- Body Section -->
        <div class="email-body">
            <h2>You've Earned Ksh {{ number_format($order['amount'], 2) }}!</h2>
            <p>Hi {{ $order['upline_username'] }},</p>
            <p>We’re excited to inform you that you’ve received a referral bonus of <strong>Ksh {{ number_format($order['amount'], 2) }}</strong> from <strong>{{ $order['username'] }}</strong> as part of Acozol's referral program. 🎉</p>
            
            <p>Don’t miss out! Login to your account to withdraw your bonus.</p>

            <a href="https://acozolfortune.com/user/login" class="btn">Login to Withdraw</a>
        </div>

        <!-- Footer Section -->
        <div class="email-footer">
            <p>Thank you for being part of Acozolfortune!</p>
            <p class="footer-note">This is an automated message. Please do not reply.</p>
        </div>
    </div>
</body>
</html>
