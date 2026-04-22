<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Tp_Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\NewNotification;
use Illuminate\Validation\Rule;

class ShipmentController extends Controller
{
    /**
     * Store a newly created shipment in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeShipment(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'sname' => 'required|string|max:255',                     // Sender Name
            'saddress' => 'required|string|max:255',                  // Sender Address
            'take_off_point' => 'required|string|max:255',            // Origin Office
            'name' => 'required|string|max:255',                      // Receiver Name
            'email' => 'required|email|max:255',                      // Receiver Email
            'phone' => 'required|string|max:20',                      // Receiver Phone
            'address' => 'required|string|max:255',                   // Receiver Address
            'final_destination' => 'required|string|max:255',         // Destination Office
            'qty' => 'required|numeric|min:1',                        // Quantity
            'description' => 'required|string',                       // Parcel Description
            'cost' => 'required|numeric|min:0',                       // Shipping Cost
            'clearance_cost' => 'required|numeric|min:0',             // Clearance Cost
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Shipment Photo
            'video' => 'nullable|mimes:mp4,mpeg,mov,avi,webm|max:20480', // Shipment Video (20MB max)
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the shipment record using the User model
        // Note: We're using the User model as it appears to store shipment data
        $shipment = new User();
        $shipment->sname = $request->sname;
        $shipment->saddress = $request->saddress;
        $shipment->take_off_point = $request->take_off_point;
         $shipment->location = $request->take_off_point;

        $shipment->name = $request->name;
        $shipment->email = $request->email;
        $shipment->phone = $request->phone;
        $shipment->address = $request->address;
        $shipment->final_destination = $request->final_destination;
        $shipment->qty = $request->qty;
        $shipment->description = $request->description;
        $shipment->cost = $request->cost;
        $shipment-> weight = $request->weight;
        $shipment->freight_type = $request->freight_type;
        $shipment->plan = $request->payment_method;


         $shipment->date_shipped = $request->date_shipped;
          $shipment->expected_delivery = $request->expected_delivery;

        $shipment->clearance_cost = $request->clearance_cost;

        // Handle photo upload if provided
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('shipment_photos'), $imageName);
            $shipment->photo = 'shipment_photos/' . $imageName;
        }

        // Handle video upload if provided
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time() . '_video_' . $video->getClientOriginalName();
            $video->move(public_path('shipment_videos'), $videoName);
            $shipment->video = 'shipment_videos/' . $videoName;
        }

        // Generate unique tracking number
        $trackingNumber = $this->generateTrackingNumber();
        $shipment->trackingnumber = $trackingNumber;

        // Set initial status to "Order Confirmed"
        $shipment->status = "Order Confirmed";

        // Save the shipment
        $shipment->save();

        // Create the initial tracking record
        $this->createTrackingRecord($shipment->id, $request->take_off_point, "Order Confirmed", "Your shipment has been confirmed and is being processed.");

        // Send email notification to the receiver
        $this->sendReceiverNotification($shipment);

        // Redirect with success message and shipment details
        return redirect()->route('admin.shipments.view', $shipment->id)
            ->with('success', 'Shipment created successfully. Tracking Number: ' . $trackingNumber);
    }

    /**
     * Generate a unique tracking number
     *
     * @return string
     */
    private function generateTrackingNumber()
    {
        // Get settings
        $settings = Settings::where('id', '1')->first();

        // Extract first two letters of site name and convert to uppercase
        $sitePrefix = strtoupper(substr($settings->site_name, 0, 2));

        // Format: SITEINITIALS-RANDOMNUMBER-RANDOMSTRING
        $prefix = $sitePrefix;
        $year = rand(1000, 9999); // Generate a random 4-digit number instead of year
        $randomString = strtoupper(Str::random(8));

        $trackingNumber = "{$prefix}-{$year}-{$randomString}";

        // Check if tracking number already exists
        while (User::where('trackingnumber', $trackingNumber)->exists()) {
            $randomString = strtoupper(Str::random(8));
            $trackingNumber = "{$prefix}-{$year}-{$randomString}";
        }

        return $trackingNumber;
    }

    /**
     * Create tracking record for shipment
     *
     * @param int $userId
     * @param string $location
     * @param string $status
     * @param string $comment
     * @param string|null $datetime
     * @return void
     */
    private function createTrackingRecord($userId, $location, $status, $comment, $datetime = null)
    {
        $trackingData = [
            'user' => $userId,
            'address' => $location,
            'city' => '',  // Can be populated if needed
            'country' => '',  // Can be populated if needed
            'status' => $status,
            'comment' => $comment
        ];

        // If a specific datetime is provided, set the created_at timestamp
        if ($datetime) {
            $trackingData['created_at'] = $datetime;
            $trackingData['updated_at'] = $datetime;
        }

        Tp_Transaction::create($trackingData);
    }

    /**
     * Send email notification to the receiver
     *
     * @param User $shipment
     * @return void
     */
    private function sendReceiverNotification($shipment)
    {
        $settings = Settings::where('id', '1')->first();

        // Generate email content
        $emailContent = $this->generateEmailContent($shipment, $settings);
        $subject = "Package Received - Tracking #" . $shipment->trackingnumber;

        // Send email to receiver
        Mail::to($shipment->email)->send(new NewNotification(
            $emailContent,
            $subject,
            $shipment->name
        ));
    }

    /**
     * Generate content for the email
     *
     * @param User $shipment
     * @param Settings $settings
     * @return string
     */
    private function generateEmailContent($shipment, $settings)
    {
        // Build clean content for the email template
        $message = "
        <p>We are pleased to inform you that a package has been received and is ready for delivery to you.</p>

        <div style='background-color: #e0f2fe; padding: 15px; border-left: 4px solid #0369a1; margin: 20px 0; border-radius: 4px;'>
            <h3 style='margin-top: 0; color: #0369a1;'>📦 Tracking Information</h3>
            <p style='margin: 8px 0;'><strong>Tracking Number:</strong> {$shipment->trackingnumber}</p>
            <p style='margin: 8px 0;'><strong>Status:</strong> <span style='color: #0369a1; font-weight: bold;'>{$shipment->status}</span></p>
        </div>

        <div style='background-color: #f9f9f9; padding: 15px; border-radius: 4px; margin: 20px 0;'>
            <h3 style='margin-top: 0; color: #333;'>📋 Shipment Details</h3>
            <table style='width: 100%; border-collapse: collapse;'>
                <tr>
                    <td style='padding: 8px 0; border-bottom: 1px solid #ddd; font-weight: bold;'>Sender:</td>
                    <td style='padding: 8px 0; border-bottom: 1px solid #ddd;'>{$shipment->sname}</td>
                </tr>
                <tr>
                    <td style='padding: 8px 0; border-bottom: 1px solid #ddd; font-weight: bold;'>Origin:</td>
                    <td style='padding: 8px 0; border-bottom: 1px solid #ddd;'>{$shipment->take_off_point}</td>
                </tr>
                <tr>
                    <td style='padding: 8px 0; border-bottom: 1px solid #ddd; font-weight: bold;'>Destination:</td>
                    <td style='padding: 8px 0; border-bottom: 1px solid #ddd;'>{$shipment->final_destination}</td>
                </tr>
                <tr>
                    <td style='padding: 8px 0; border-bottom: 1px solid #ddd; font-weight: bold;'>Description:</td>
                    <td style='padding: 8px 0; border-bottom: 1px solid #ddd;'>{$shipment->description}</td>
                </tr>
                <tr>
                    <td style='padding: 8px 0; border-bottom: 1px solid #ddd; font-weight: bold;'>Quantity:</td>
                    <td style='padding: 8px 0; border-bottom: 1px solid #ddd;'>{$shipment->qty}</td>
                </tr>
                <tr>
                    <td style='padding: 8px 0; font-weight: bold;'>Shipping Cost:</td>
                    <td style='padding: 8px 0;'>{$settings->s_currency} " . number_format($shipment->cost, 2) . "</td>
                </tr>
            </table>
        </div>

        <p>You can track your shipment anytime by visiting our tracking page:</p>
        <div style='text-align: center; margin: 20px 0;'>
            <a href='{$settings->site_address}'
               style='display: inline-block; padding: 12px 24px; background-color: #0369a1; color: white; text-decoration: none; border-radius: 6px; font-weight: bold;'>
                🔍 Track Your Package
            </a>
        </div>

        <p>Thank you for choosing {$settings->site_name} for your shipping needs. We'll keep you updated as your package moves through our delivery network.</p>
        ";

        return $message;
    }

    /**
     * Update shipment status and create a tracking record
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateShipmentStatus(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'shipment_id' => 'required|exists:users,id',
            'status' => 'required|string|in:Order Confirmed,Picked by Courier,Security Checking,Border Check,Missing Document,On The Way,Custom Hold,Pending Payment,Payment Received,Additional Fee Applied,Money Laundering,Delivered',
            'comment' => 'required|string',
            'location' => 'required|string',
            'status_datetime' => 'nullable|date|before_or_equal:now',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the shipment status
        $shipment = User::findOrFail($request->shipment_id);
        $shipment->status = $request->status;
        $shipment->save();

        // Create a new tracking record
        $this->createTrackingRecord(
            $shipment->id,
            $request->location,
            $request->status,
            $request->comment,
            $request->status_datetime
        );


            User::where('id', $request->shipment_id)
                ->update([

                    'location' => $request->location,
                    'percentage_complete' => $request['percentage_complete'],

                ]);


        // If status is "Delivered", send a delivery confirmation email
        if ($request->status === 'Delivered') {
            $this->sendDeliveryConfirmation($shipment);
        } else {
            // Send status update notification
            $this->sendStatusUpdateNotification($shipment, $request->status, $request->comment);
        }

        return redirect()->back()->with('success', 'Shipment status updated successfully');
    }

    /**
     * Send delivery confirmation email
     *
     * @param User $shipment
     * @return void
     */
    private function sendDeliveryConfirmation($shipment)
    {
        $settings = Settings::where('id', '1')->first();

        // Email subject
        $subject = "Package Delivered - Tracking #" . $shipment->trackingnumber;

        // Generate the email content
        $emailContent = "
        <div style='text-align: center; margin: 20px 0;'>
            <div style='font-size: 64px; color: #059669; margin-bottom: 20px;'>✅</div>
            <h2 style='color: #059669; margin: 0;'>Your Package Has Been Delivered!</h2>
        </div>

        <p>We're pleased to inform you that your package has been successfully delivered.</p>

        <div style='background-color: #d1fae5; padding: 15px; border-left: 4px solid #059669; margin: 20px 0; border-radius: 4px;'>
            <h3 style='margin-top: 0; color: #059669;'>📦 Delivery Confirmation</h3>
            <p style='margin: 8px 0;'><strong>Tracking Number:</strong> {$shipment->trackingnumber}</p>
            <p style='margin: 8px 0;'><strong>Delivery Date:</strong> " . date('F d, Y') . "</p>
            <p style='margin: 8px 0;'><strong>Recipient:</strong> {$shipment->name}</p>
            <p style='margin: 8px 0;'><strong>Delivery Address:</strong> {$shipment->address}</p>
        </div>

        <div style='background-color: #f0f9ff; padding: 15px; border-radius: 4px; margin: 20px 0;'>
            <h3 style='margin-top: 0; color: #333;'>📋 Package Summary</h3>
            <p style='margin: 8px 0;'><strong>From:</strong> {$shipment->sname} ({$shipment->take_off_point})</p>
            <p style='margin: 8px 0;'><strong>Description:</strong> {$shipment->description}</p>
            <p style='margin: 8px 0;'><strong>Quantity:</strong> {$shipment->qty}</p>
        </div>

        <p>Thank you for choosing {$settings->site_name} for your shipping needs. We hope you were satisfied with our service.</p>

        <p>If you have any questions about your delivery or need further assistance, please don't hesitate to contact our customer service team.</p>

        <div style='background-color: #f8f9fa; padding: 15px; border-radius: 4px; margin: 20px 0; text-align: center;'>
            <p style='margin: 0; color: #6b7280; font-size: 14px;'>
                <strong>Need help?</strong> Contact us at {$settings->contact_email}
            </p>
        </div>
        ";

        // Send email to receiver
        Mail::to($shipment->email)->send(new NewNotification(
            $emailContent,
            $subject,
            $shipment->name
        ));
    }

    /**
     * Send status update notification
     *
     * @param User $shipment
     * @param string $status
     * @param string $comment
     * @return void
     */
    private function sendStatusUpdateNotification($shipment, $status, $comment)
    {
        $settings = Settings::where('id', '1')->first();

        // Email subject
        $subject = "Shipment Status Update - Tracking #" . $shipment->trackingnumber;

        // Set status colors and icons
        $statusInfo = [
            'Order Confirmed' => ['color' => '#0369a1', 'icon' => '✅', 'bg' => '#e0f2fe'],
            'Picked by Courier' => ['color' => '#2563eb', 'icon' => '📦', 'bg' => '#dbeafe'],
            'Security Checking' => ['color' => '#4f46e5', 'icon' => '🔍', 'bg' => '#e0e7ff'],
            'Border Check' => ['color' => '#7c3aed', 'icon' => '🛂', 'bg' => '#ede9fe'],
            'Missing Document' => ['color' => '#dc2626', 'icon' => '📄', 'bg' => '#fee2e2'],
            'On The Way' => ['color' => '#0891b2', 'icon' => '🚚', 'bg' => '#cffafe'],
            'Custom Hold' => ['color' => '#d97706', 'icon' => '⏸️', 'bg' => '#fef3c7'],
            'Pending Payment' => ['color' => '#ea580c', 'icon' => '💳', 'bg' => '#ffedd5'],
            'Payment Received' => ['color' => '#059669', 'icon' => '✅', 'bg' => '#d1fae5'],
            'Additional Fee Applied' => ['color' => '#e11d48', 'icon' => '💰', 'bg' => '#ffe4e6'],
            'Money Laundering' => ['color' => '#991b1b', 'icon' => '⚠️', 'bg' => '#fee2e2'],
            'Delivered' => ['color' => '#059669', 'icon' => '✅', 'bg' => '#d1fae5']
        ];

        $statusConfig = $statusInfo[$status] ?? ['color' => '#0369a1', 'icon' => '📋', 'bg' => '#e0f2fe'];

        // Generate the email content
        $emailContent = "
        <p>Your shipment status has been updated. Here are the latest details:</p>

        <div style='text-align: center; margin: 20px 0;'>
            <div style='font-size: 48px; margin-bottom: 10px;'>{$statusConfig['icon']}</div>
            <span style='display: inline-block; padding: 8px 16px; background-color: {$statusConfig['color']}; color: white; border-radius: 20px; font-weight: bold; font-size: 16px;'>
                {$status}
            </span>
        </div>

        <div style='background-color: {$statusConfig['bg']}; padding: 15px; border-left: 4px solid {$statusConfig['color']}; margin: 20px 0; border-radius: 4px;'>
            <h3 style='margin-top: 0; color: {$statusConfig['color']};'>📦 Tracking Information</h3>
            <p style='margin: 8px 0;'><strong>Tracking Number:</strong> {$shipment->trackingnumber}</p>
            <p style='margin: 8px 0;'><strong>Current Status:</strong> {$status}</p>
            <p style='margin: 8px 0;'><strong>Last Updated:</strong> " . date('F d, Y \a\t g:i A') . "</p>
        </div>

        <div style='background-color: #f0f9ff; padding: 15px; border-radius: 4px; margin: 20px 0;'>
            <h3 style='margin-top: 0; color: #333;'>💬 Update Details</h3>
            <p style='margin: 0; font-style: italic; color: #555;'>\"{$comment}\"</p>
        </div>

        <div style='background-color: #f9f9f9; padding: 15px; border-radius: 4px; margin: 20px 0;'>
            <h3 style='margin-top: 0; color: #333;'>📋 Shipment Summary</h3>
            <p style='margin: 8px 0;'><strong>From:</strong> {$shipment->sname} ({$shipment->take_off_point})</p>
            <p style='margin: 8px 0;'><strong>To:</strong> {$shipment->name} ({$shipment->final_destination})</p>
            <p style='margin: 8px 0;'><strong>Description:</strong> {$shipment->description}</p>
        </div>

        <div style='text-align: center; margin: 20px 0;'>
            <a href='{$settings->site_address}?trackingnumber={$shipment->trackingnumber}'
               style='display: inline-block; padding: 12px 24px; background-color: {$statusConfig['color']}; color: white; text-decoration: none; border-radius: 6px; font-weight: bold;'>
                🔍 Track Your Package
            </a>
        </div>

        <p>Thank you for choosing {$settings->site_name} for your shipping needs. We'll continue to keep you updated as your package progresses.</p>
        ";

        // Send email to receiver
        Mail::to($shipment->email)->send(new NewNotification(
            $emailContent,
            $subject,
            $shipment->name
        ));
    }

    /**
     * Update an existing shipment in the database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateShipment(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,id',
            'trackingnumber' => [
                'required',
                'string',
                'max:255',
                // Ensure tracking number is unique except for this shipment
                Rule::unique('users', 'trackingnumber')->ignore($request->id)
            ],
            'sname' => 'required|string|max:255',                     // Sender Name
            'saddress' => 'required|string|max:255',                  // Sender Address
            'take_off_point' => 'required|string|max:255',            // Origin Office
            'name' => 'required|string|max:255',                      // Receiver Name
            'email' => 'required|email|max:255',                      // Receiver Email
            'phone' => 'required|string|max:20',                      // Receiver Phone
            'address' => 'required|string|max:255',                   // Receiver Address
            'final_destination' => 'required|string|max:255',         // Destination Office
            'qty' => 'required|numeric|min:1',                        // Quantity
            'description' => 'required|string',                       // Parcel Description
            'cost' => 'required|numeric|min:0',                       // Shipping Cost
            'clearance_cost' => 'required|numeric|min:0',             // Clearance Cost
            'status' => 'required|string|in:Order Confirmed,Picked by Courier,Security Checking,Border Check,Missing Document,On The Way,Custom Hold,Pending Payment,Payment Received,Additional Fee Applied,Money Laundering,Delivered',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Shipment Photo
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find and update the shipment
        $shipment = User::findOrFail($request->id);

        // Check if status changed
        $statusChanged = $shipment->status !== $request->status;
        $oldStatus = $shipment->status;

        // Check if tracking number changed
        $trackingChanged = $shipment->trackingnumber !== $request->trackingnumber;
        $oldTracking = $shipment->trackingnumber;

        // If tracking number is changed, check if it already exists in another record
        if ($trackingChanged) {
            $existingShipment = User::where('trackingnumber', $request->trackingnumber)
                ->where('id', '!=', $shipment->id)
                ->first();

            if ($existingShipment) {
                return redirect()->back()->withErrors([
                    'trackingnumber' => 'The tracking number already exists. Please use a different tracking number.'
                ])->withInput();
            }
        }

        // Update shipment data
        $shipment->trackingnumber = $request->trackingnumber; // Update tracking number
        $shipment->sname = $request->sname;
        $shipment->saddress = $request->saddress;
        $shipment->take_off_point = $request->take_off_point;
        $shipment->name = $request->name;
        $shipment->email = $request->email;
        $shipment->phone = $request->phone;
        $shipment->address = $request->address;
        $shipment->final_destination = $request->final_destination;
        $shipment->qty = $request->qty;
        $shipment->description = $request->description;
        $shipment->cost = $request->cost;
        $shipment->clearance_cost = $request->clearance_cost;
        $shipment->status = $request->status;

        // Handle photo upload if provided
        if ($request->hasFile('photo')) {
            // Remove old photo if exists
            if ($shipment->photo && file_exists(public_path($shipment->photo))) {
                unlink(public_path($shipment->photo));
            }

            $image = $request->file('photo');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('shipment_photos'), $imageName);
            $shipment->photo = 'shipment_photos/' . $imageName;
        }

        // Save the shipment
        $shipment->save();

        // If status was changed, create a tracking record
        if ($statusChanged) {
            $this->createTrackingRecord(
                $shipment->id,
                $shipment->final_destination,
                $request->status,
                "Status updated from {$oldStatus} to {$request->status} by admin."
            );
        }

        // If tracking number was changed, log it in tracking history
        if ($trackingChanged) {
            $this->createTrackingRecord(
                $shipment->id,
                $shipment->final_destination,
                $shipment->status,
                "Tracking number updated from {$oldTracking} to {$request->trackingnumber} by admin."
            );
        }

        // Redirect with success message
        return redirect()->route('admin.shipments.view', $shipment->id)
            ->with('success', 'Shipment updated successfully.');
    }

    /**
     * Show the shipment status update form
     *
     * @param int $id Shipment ID
     * @return \Illuminate\Http\Response
     */
    public function showUpdateStatusForm($id)
    {
        // Find the shipment
        $shipment = User::findOrFail($id);

        // Get shipment tracking history
        $tracks = Tp_Transaction::where('user', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Get settings
        $settings = Settings::where('id', '1')->first();

        return view('admin.update-shipment-status', [
            'shipment' => $shipment,
            'tracks' => $tracks,
            'settings' => $settings,
            'title' => 'Update Shipment Status'
        ]);
    }


     /**
     * Delete a shipment
     *
     * @param int $id Shipment ID
     * @return \Illuminate\Http\Response
     */
    public function deleteShipment($id)
    {
        try {
            // Find the shipment
            $shipment = User::findOrFail($id);

            // Get tracking number for confirmation message
            $trackingNumber = $shipment->trackingnumber;

            // Delete related tracking records first
            Tp_Transaction::where('user', $id)->delete();

            // Delete the shipment
            $shipment->delete();

            return redirect()->route('admin.shipments')
                ->with('success', "Shipment {$trackingNumber} has been successfully deleted.");

        } catch (\Exception $e) {
            return redirect()->route('admin.shipments')
                ->with('error', 'Failed to delete shipment. Please try again.');
        }
    }

    /**
     * List all shipments for admin
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function listShipments(Request $request)
    {
        // Get search parameters
        $search = $request->input('search');
        $status = $request->input('status');

        // Query builder for shipments
        $query = User::whereNotNull('trackingnumber');

        // Apply search filter if provided
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('trackingnumber', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('sname', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Filter by status if provided
        if ($status) {
            $query->where('status', $status);
        }

        // Get paginated results
        $shipments = $query->orderBy('created_at', 'desc')
            ->paginate(15);

        // Get settings
        $settings = Settings::where('id', '1')->first();

        return view('admin.shipments', [
            'shipments' => $shipments,
            'settings' => $settings,
            'search' => $search,
            'status' => $status,
            'title' => 'Manage Shipments'
        ]);
    }

    /**
     * Show shipment details
     *
     * @param int $id Shipment ID
     * @return \Illuminate\Http\Response
     */
    public function viewShipment($id)
    {
        // Find the shipment
        $shipment = User::findOrFail($id);

        // Get shipment tracking history
        $tracks = Tp_Transaction::where('user', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Get settings
        $settings = Settings::where('id', '1')->first();

        return view('admin.view-shipment', [
            'shipment' => $shipment,
            'tracks' => $tracks,
            'settings' => $settings,
            'title' => 'Shipment Details'
        ]);
    }

    /**
     * Show shipment deposits for admin
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function shipmentDeposits(Request $request)
    {
        // Get search parameters
        $search = $request->input('search');
        $status = $request->input('status');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        // Get deposits from the database
        $query = DB::table('deposits')
                ->leftJoin('users', 'deposits.user', '=', 'users.id')
                ->select('deposits.*', 'users.name', 'users.email', 'users.trackingnumber');

        // Apply filters if provided
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('users.trackingnumber', 'like', "%{$search}%")
                  ->orWhere('users.name', 'like', "%{$search}%")
                  ->orWhere('users.email', 'like', "%{$search}%")
                  ->orWhere('deposits.payment_mode', 'like', "%{$search}%");
            });
        }

        if ($status) {
            $query->where('deposits.status', $status);
        }

        if ($dateFrom && $dateTo) {
            $query->whereBetween('deposits.created_at', [$dateFrom . ' 00:00:00', $dateTo . ' 23:59:59']);
        } elseif ($dateFrom) {
            $query->where('deposits.created_at', '>=', $dateFrom . ' 00:00:00');
        } elseif ($dateTo) {
            $query->where('deposits.created_at', '<=', $dateTo . ' 23:59:59');
        }

        // Get paginated results
        $deposits = $query->orderBy('deposits.created_at', 'desc')
                         ->paginate(15);

        // Get statistics for the dashboard
        $totalDeposits = DB::table('deposits')->count();
        $pendingDeposits = DB::table('deposits')->where('status', 'pending')->count();
        $approvedDeposits = DB::table('deposits')->where('status', 'approved')->count();
        $rejectedDeposits = DB::table('deposits')->where('status', 'rejected')->count();

        // Calculate totals
        $totalAmount = DB::table('deposits')->where('status', 'approved')->sum('amount');

        // Get settings
        $settings = Settings::where('id', '1')->first();

        return view('admin.shipment-deposits', [
            'deposits' => $deposits,
            'settings' => $settings,
            'search' => $search,
            'status' => $status,
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
            'totalDeposits' => $totalDeposits,
            'pendingDeposits' => $pendingDeposits,
            'approvedDeposits' => $approvedDeposits,
            'rejectedDeposits' => $rejectedDeposits,
            'totalAmount' => $totalAmount,
            'title' => 'Shipment Deposits'
        ]);
    }

    /**
     * Process a deposit
     *
     * @param int $id Deposit ID
     * @return \Illuminate\Http\Response
     */
    public function processDeposit($id)
    {
        try {
            // Update deposit status
            DB::table('deposits')->where('id', $id)->update([
                'status' => 'Processed',
                'updated_at' => now()
            ]);

            // Get deposit details
            $deposit = DB::table('deposits')->where('id', $id)->first();

            // Notify user if needed
            // Implementation depends on your system's notification mechanism

            return redirect()->route('admin.shipment.deposits')
                ->with('success', 'Deposit processed successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.shipment.deposits')
                ->with('error', 'Error processing deposit: ' . $e->getMessage());
        }
    }

    /**
     * View deposit details
     *
     * @param int $id Deposit ID
     * @return \Illuminate\Http\Response
     */
    public function viewDeposit($id)
    {
        try {
            // Get deposit details
            $deposit = DB::table('deposits')
                ->join('users', 'deposits.user', '=', 'users.id')
                ->select('deposits.*', 'users.name', 'users.email', 'users.trackingnumber')
                ->where('deposits.id', $id)
                ->first();

            if (!$deposit) {
                return redirect()->route('admin.shipment.deposits')
                    ->with('error', 'Deposit not found');
            }

            // Get settings
            $settings = Settings::where('id', '1')->first();

            return view('admin.view-deposit', [
                'deposit' => $deposit,
                'settings' => $settings,
                'title' => 'View Deposit Details'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.shipment.deposits')
                ->with('error', 'Error viewing deposit: ' . $e->getMessage());
        }
    }

    /**
     * View deposit payment proof image
     *
     * @param int $id Deposit ID
     * @return \Illuminate\Http\Response
     */
    public function viewDepositImage($id)
    {
        try {
            // Get deposit details
            $deposit = DB::table('deposits')->where('id', $id)->first();

            if (!$deposit || !$deposit->proof) {
                return redirect()->route('admin.shipment.deposits')
                    ->with('error', 'Deposit proof not found');
            }

            // Get settings
            $settings = Settings::where('id', '1')->first();

            return view('admin.view-deposit-image', [
                'deposit' => $deposit,
                'settings' => $settings,
                'title' => 'View Payment Proof'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.shipment.deposits')
                ->with('error', 'Error viewing deposit image: ' . $e->getMessage());
        }
    }

    /**
     * Delete a deposit
     *
     * @param int $id Deposit ID
     * @return \Illuminate\Http\Response
     */
    public function deleteDeposit($id)
    {
        try {
            // Get deposit details
            $deposit = DB::table('deposits')->where('id', $id)->first();

            if (!$deposit) {
                return redirect()->route('admin.shipment.deposits')
                    ->with('error', 'Deposit not found');
            }

            // Delete deposit proof if exists
            if ($deposit->proof && file_exists(public_path($deposit->proof))) {
                unlink(public_path($deposit->proof));
            }

            // Delete deposit record
            DB::table('deposits')->where('id', $id)->delete();

            return redirect()->route('admin.shipment.deposits')
                ->with('success', 'Deposit deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.shipment.deposits')
                ->with('error', 'Error deleting deposit: ' . $e->getMessage());
        }
    }

    /**
     * Export deposits data
     *
     * @param string $format Export format (csv, excel, pdf)
     * @return \Illuminate\Http\Response
     */
    public function exportDeposits($format)
    {
        try {
            // Get all deposits
            $deposits = DB::table('deposits')
                ->join('users', 'deposits.user', '=', 'users.id')
                ->select('deposits.*', 'users.name', 'users.email', 'users.trackingnumber')
                ->orderBy('deposits.created_at', 'desc')
                ->get();

            // Format data for export
            $exportData = [];
            foreach ($deposits as $deposit) {
                $exportData[] = [
                    'ID' => $deposit->id,
                    'Tracking Number' => $deposit->trackingnumber,
                    'User' => $deposit->name,
                    'Email' => $deposit->email,
                    'Amount' => $deposit->amount,
                    'Payment Method' => $deposit->payment_mode,
                    'Status' => $deposit->status,
                    'Date' => date('Y-m-d H:i:s', strtotime($deposit->created_at))
                ];
            }

            // Export based on format
            if ($format == 'csv') {
                // CSV export logic
                return response()->streamDownload(function() use ($exportData) {
                    $handle = fopen('php://output', 'w');

                    // Add headers
                    fputcsv($handle, array_keys($exportData[0]));

                    // Add data rows
                    foreach ($exportData as $row) {
                        fputcsv($handle, $row);
                    }

                    fclose($handle);
                }, 'shipment_deposits.csv');
            } elseif ($format == 'excel') {
                // Excel export logic - would typically use Maatwebsite/Laravel-Excel package
                // This is a placeholder for the actual implementation
                return redirect()->route('admin.shipment.deposits')
                    ->with('error', 'Excel export not implemented yet');
            } elseif ($format == 'pdf') {
                // PDF export logic - would typically use domPDF or similar package
                // This is a placeholder for the actual implementation
                return redirect()->route('admin.shipment.deposits')
                    ->with('error', 'PDF export not implemented yet');
            } else {
                return redirect()->route('admin.shipment.deposits')
                    ->with('error', 'Invalid export format');
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.shipment.deposits')
                ->with('error', 'Error exporting deposits: ' . $e->getMessage());
        }
    }

    /**
     * Update a tracking record
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id Track record ID
     * @return \Illuminate\Http\Response
     */
    public function updateTrackRecord(Request $request, $id)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'status' => 'required|string|in:Order Confirmed,Picked by Courier,Security Checking,Border Check,Missing Document,On The Way,Custom Hold,Pending Payment,Payment Received,Additional Fee Applied,Money Laundering,Delivered',
            'address' => 'required|string|max:255',
            'comment' => 'required|string|max:1000',
            'track_datetime' => 'nullable|date|before_or_equal:now',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Find the track record
            $track = Tp_Transaction::findOrFail($id);

            // Update the record
            $updateData = [
                'status' => $request->status,
                'address' => $request->address,
                'comment' => $request->comment,
            ];

            // If datetime is provided, update the created_at timestamp
            if ($request->track_datetime) {
                $updateData['created_at'] = $request->track_datetime;
                $updateData['updated_at'] = now();
            }

            $track->update($updateData);

            return response()->json([
                'success' => true,
                'message' => 'Track record updated successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating track record: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a tracking record
     *
     * @param int $id Track record ID
     * @return \Illuminate\Http\Response
     */
    public function deleteTrackRecord($id)
    {
        try {
            // Find the track record
            $track = Tp_Transaction::findOrFail($id);

            // Store the shipment ID for redirect
            $shipmentId = $track->user;

            // Delete the record
            $track->delete();

            return response()->json([
                'success' => true,
                'message' => 'Track record deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting track record: ' . $e->getMessage()
            ], 500);
        }
    }
}
