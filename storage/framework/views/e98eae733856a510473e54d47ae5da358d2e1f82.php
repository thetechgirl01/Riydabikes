<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment Invoice - <?php echo e($shipment->trackingnumber); ?></title>
    <style>
        @page  {
            size: A4;
            margin: 0;
        }
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f5f5f5;
        }
        .invoice-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .invoice-title {
            font-size: 24px;
            margin: 0;
        }
        .invoice-subtitle {
            font-size: 16px;
            margin: 5px 0 0;
            font-weight: normal;
        }
        .invoice-body {
            padding: 20px;
        }
        .invoice-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .invoice-info-item {
            flex: 1;
        }
        .invoice-info-item h3 {
            margin-top: 0;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }
        .tracking-info {
            text-align: center;
            margin: 20px 0;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
            border: 1px dashed #ccc;
        }
        .tracking-number {
            font-family: monospace;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 1px;
            margin: 10px 0;
        }
        .tracking-status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            font-weight: bold;
            margin-top: 10px;
        }
        .status-confirmed {
            background-color: #3498db;
            color: white;
        }
        .status-picked {
            background-color: #3498db;
            color: white;
        }
        .status-way {
            background-color: #3498db;
            color: white;
        }
        .status-hold {
            background-color: #f39c12;
            color: white;
        }
        .status-delivered {
            background-color: #2ecc71;
            color: white;
        }
        .shipment-details {
            border: 1px solid #eee;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .shipment-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .shipment-details th {
            background-color: #f5f5f5;
            text-align: left;
            padding: 10px;
        }
        .shipment-details td {
            padding: 10px;
            border-top: 1px solid #eee;
        }
        .cost-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .cost-table th {
            text-align: left;
            padding: 10px;
            background-color: #f5f5f5;
        }
        .cost-table td {
            padding: 10px;
            border-top: 1px solid #eee;
        }
        .cost-table tr.total {
            background-color: #f9f9f9;
            font-weight: bold;
        }
        .cost-table tr.total td {
            border-top: 2px solid #333;
        }
        .text-right {
            text-align: right;
        }
        .invoice-footer {
            text-align: center;
            padding: 20px;
            margin-top: 20px;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #777;
        }
        .barcode {
            text-align: center;
            margin: 20px 0;
        }
        .company-logo {
            max-width: 200px;
            margin-bottom: 10px;
        }
        .stamp {
            position: relative;
            display: inline-block;
            padding: 15px 20px;
            color: #de4c4c;
            font-size: 20px;
            font-weight: bold;
            border: 3px solid #de4c4c;
            border-radius: 10px;
            transform: rotate(-15deg);
            opacity: 0.8;
            margin: 30px;
        }
        @media  print {
            body {
                background-color: white;
            }
            .invoice-container {
                box-shadow: none;
            }
            .no-print {
                display: none;
            }
            .invoice-footer {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1 class="invoice-title"><?php echo e($settings->site_name); ?> Logistics</h1>
            <h2 class="invoice-subtitle">Shipment Invoice</h2>
        </div>
        
        <div class="invoice-body">
            <div class="tracking-info">
                <div class="barcode">
                    <img src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo e($shipment->trackingnumber); ?>&code=Code128" alt="<?php echo e($shipment->trackingnumber); ?>">
                </div>
                <div class="tracking-number"><?php echo e($shipment->trackingnumber); ?></div>
                <div class="tracking-status status-<?php echo e(strtolower(str_replace(' ', '-', $shipment->status))); ?>">
                    <?php echo e($shipment->status); ?>

                </div>
            </div>
            
            <div class="invoice-info">
                <div class="invoice-info-item">
                    <h3>Sender Information</h3>
                    <p><strong>Name:</strong> <?php echo e($shipment->sname); ?></p>
                    <p><strong>Address:</strong> <?php echo e($shipment->saddress); ?></p>
                    <p><strong>Origin:</strong> <?php echo e($shipment->take_off_point); ?></p>
                </div>
                
                <div class="invoice-info-item">
                    <h3>Receiver Information</h3>
                    <p><strong>Name:</strong> <?php echo e($shipment->name); ?></p>
                    <p><strong>Email:</strong> <?php echo e($shipment->email); ?></p>
                    <p><strong>Phone:</strong> <?php echo e($shipment->phone); ?></p>
                    <p><strong>Address:</strong> <?php echo e($shipment->address); ?></p>
                    <p><strong>Destination:</strong> <?php echo e($shipment->final_destination); ?></p>
                </div>
            </div>
            
            <div class="shipment-details">
                <table>
                    <thead>
                        <tr>
                            <th>Package Information</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Quantity</td>
                            <td><?php echo e($shipment->qty); ?></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><?php echo e($shipment->description); ?></td>
                        </tr>
                        <tr>
                            <td>Date Created</td>
                            <td><?php echo e($shipment->created_at->format('F d, Y')); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <table class="cost-table">
                <thead>
                    <tr>
                        <th>Cost Description</th>
                        <th class="text-right">Amount (<?php echo e($settings->s_currency); ?>)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Shipping Cost</td>
                        <td class="text-right"><?php echo e(number_format($shipment->cost, 2)); ?></td>
                    </tr>
                    <tr>
                        <td>Clearance Cost</td>
                        <td class="text-right"><?php echo e(number_format($shipment->clearance_cost, 2)); ?></td>
                    </tr>
                    <tr class="total">
                        <td>Total</td>
                        <td class="text-right"><?php echo e(number_format($shipment->cost + $shipment->clearance_cost, 2)); ?></td>
                    </tr>
                </tbody>
            </table>
            
            <?php if($shipment->status == 'Delivered'): ?>
            <div style="text-align: right; margin-top: 40px;">
                <div class="stamp">DELIVERED</div>
            </div>
            <?php endif; ?>
        </div>
        
        <div class="invoice-footer">
            <p>Thank you for choosing <?php echo e($settings->site_name); ?> for your shipping needs.</p>
            <p><?php echo e($settings->site_address); ?> | <?php echo e($settings->contact_email); ?></p>
            <p>&copy; <?php echo e(date('Y')); ?> <?php echo e($settings->site_name); ?>. All rights reserved.</p>
        </div>
    </div>
    
    <div class="no-print" style="text-align: center; margin: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; background: #2c3e50; color: white; border: none; cursor: pointer; font-size: 16px;">
            Print Invoice
        </button>
    </div>
</body>
</html>
<?php /**PATH /home/elitemaxpro/shypdirect.elitemaxpro.click/resources/views/admin/print-shipment.blade.php ENDPATH**/ ?>