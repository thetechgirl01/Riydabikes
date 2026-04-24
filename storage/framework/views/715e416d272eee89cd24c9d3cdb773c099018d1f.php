<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name')); ?> - Notification</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #0369a1;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .email-body {
            padding: 30px;
        }
        .greeting {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #1f2937;
        }
        .content {
            margin-bottom: 25px;
        }
        .attachment-image {
            text-align: center;
            margin: 20px 0;
        }
        .attachment-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }
        .email-footer {
            background-color: #f3f4f6;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }
        .footer-text {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }
        .company-name {
            font-weight: 600;
            color: #0369a1;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1><?php echo e(config('app.name')); ?></h1>
        </div>

        <div class="email-body">
            <div class="greeting">
                <?php echo e($salutaion ? $salutaion : "Hello"); ?> <?php echo e($recipient); ?>,
            </div>

            <?php if($attachment != null): ?>
                <div class="attachment-image">
                    <img src="<?php echo e($message->embed(asset('storage/'. $attachment))); ?>" alt="Attachment">
                </div>
            <?php endif; ?>

            <div class="content">
                <?php echo $body; ?>

            </div>
        </div>

        <div class="email-footer">
            <p class="footer-text">
                Thanks,<br>
                <span class="company-name"><?php echo e(config('app.name')); ?></span>
            </p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/emails/NewNotification.blade.php ENDPATH**/ ?>