<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #38c172;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 6px 6px 0 0;
            margin-bottom: 20px;
        }
        .content {
            padding: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #777;
            font-size: 12px;
        }
        .amount {
            font-size: 24px;
            font-weight: bold;
            color: #38c172;
        }
        .info-box {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 4px;
            padding: 15px;
            margin: 15px 0;
        }
        .steps {
            margin: 20px 0;
        }
        .step {
            margin-bottom: 10px;
            padding-left: 20px;
            position: relative;
        }
        .step:before {
            content: "✓";
            color: #38c172;
            position: absolute;
            left: 0;
        }
        .note {
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Deposit Confirmation</h1>
        </div>
        <div class="content">
            <p>Dear <?php echo e($user->name); ?>,</p>
            
            <p>Thank you for your deposit. We have received your request and are processing it. Here are the details of your deposit:</p>
            
            <div class="info-box">
                <p><strong>Amount:</strong> <span class="amount"><?php echo e($user->currency); ?><?php echo e(number_format($deposit->amount, 2)); ?></span></p>
                <p><strong>Payment Method:</strong> <?php echo e($deposit->payment_mode); ?></p>
                <p><strong>Date:</strong> <?php echo e($deposit->created_at->format('M d, Y H:i')); ?></p>
                <p><strong>Status:</strong> Pending</p>
            </div>
            
            <p>What happens next:</p>
            
            <div class="steps">
                <div class="step">Your payment proof has been uploaded</div>
                <div class="step">Our team will verify your payment</div>
                <div class="step">Your account will be credited once confirmed</div>
                <div class="step">You'll receive a confirmation email when complete</div>
            </div>
            
            <div class="note">
                <p><strong>Note:</strong> The verification process typically takes 1-24 hours to complete. Please be patient while we process your deposit.</p>
            </div>
            
            <p>If you have any questions, please don't hesitate to contact our support team.</p>
            
            <p>Best regards,<br>Your Company Support Team</p>
        </div>
        <div class="footer">
            <p>&copy; <?php echo e(date('Y')); ?> Your Company. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ship\resources\views/emails/user-deposit-notification.blade.php ENDPATH**/ ?>