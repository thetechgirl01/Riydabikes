<div id="paypal-button-container"></div>
<script
    src=" https://www.paypal.com/sdk/js?client-id=<?php echo e($settings->pp_ci); ?>&currency=<?php echo e(strtoupper($settings->s_currency)); ?>">
</script>
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: <?php echo e($amount); ?>

                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name);
                // Call your server to save the transaction
                return fetch("dashboard/paypalverify/<?php echo e($amount); ?>", {
                    method: 'post',
                    headers: {
                        'content-type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify({
                        orderID: data.orderID
                    })
                });
            });
        }
    }).render('#paypal-button-container');
</script>
<?php /**PATH /home/remedycodes/public_html/pro.remedycodes.online/resources/views/includes/paypal.blade.php ENDPATH**/ ?>