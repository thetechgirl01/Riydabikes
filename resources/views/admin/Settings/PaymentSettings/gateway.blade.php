<div class="row">
    <div class="col-md-12">
        <form action="javascript:void(0)" method="POST" id="gatewayform">
            @csrf
            @method('PUT')

            <h4 class="text-primary"><i class="fa fa-credit-card"></i> Paystack</h4>
            <small>From <a href="https://dashboard.paystack.com" target="_blank">https://dashboard.paystack.com</a>. Set callback URL: <strong>{{ $settings->site_address }}/dashboard/paystackcallback</strong></small>

            <div class="form-group mt-3">
                <h5>Paystack Public Key</h5>
                <input type="text" name="paystack_public_key" class="form-control" value="{{ $paystack->paystack_public_key }}">
            </div>
            <div class="form-group">
                <h5>Paystack Secret Key</h5>
                <input type="text" name="paystack_secret_key" class="form-control" value="{{ $paystack->paystack_secret_key }}">
            </div>
            <div class="form-group">
                <h5>Paystack URL</h5>
                <input type="text" name="paystack_url" class="form-control" value="{{ $paystack->paystack_url }}" readonly>
            </div>
            <div class="form-group">
                <h5>Paystack Account Email</h5>
                <input type="text" name="paystack_email" class="form-control" value="{{ $paystack->paystack_email }}">
            </div>

            <hr class="mt-4">

            <h4 class="text-primary"><i class="fa fa-credit-card"></i> Flutterwave</h4>
            <small>From <a href="https://dashboard.flutterwave.com/login" target="_blank">https://dashboard.flutterwave.com/login</a></small>

            <div class="form-group mt-3">
                <h5>Flutterwave Public Key</h5>
                <input type="text" name="flw_public_key" class="form-control" value="{{ $moresettings->flw_public_key }}">
            </div>
            <div class="form-group">
                <h5>Flutterwave Secret Key</h5>
                <input type="text" name="flw_secret_key" class="form-control" value="{{ $moresettings->flw_secret_key }}">
            </div>
            <div class="form-group">
                <h5>Flutterwave Secret Hash</h5>
                <input type="text" name="flw_secret_hash" class="form-control" value="{{ $moresettings->flw_secret_hash }}">
            </div>

            <div class="alert alert-info mt-3">
                <i class="fa fa-info-circle"></i>
                Leave keys empty to disable a gateway. Customers will see "Coming Soon" on disabled gateways at checkout.
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save Gateway Settings</button>
        </form>
    </div>
</div>