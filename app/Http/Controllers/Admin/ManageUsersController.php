<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Plans;
use App\Models\Agent;
use App\Models\User_plans;
use App\Models\Tp__transaction;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\Tp_Transaction;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewNotification;
use App\Models\Kyc;
use App\Models\Mt4Details;
use App\Traits\PingServer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;

class ManageUsersController extends Controller
{
    use PingServer;

    // See user wallet balances
    public function loginactivity($id)
    {

        $user = User::where('id', $id)->first();

        return view('admin.Users.loginactivity', [
            'activities' => Activity::where('user', $id)->orderByDesc('id')->get(),
            'title' => "$user->name login activities",
            'user' => $user,
        ]);
    }

    public function showUsers($id)
    {
        $user = User::where('id', $id)->first();
        $ref = User::whereNull('ref_by')->where('id', '!=', $id)->get();

        return view('admin.Users.referral', [
            'title' => "Add users to $user->name referral list",
            'user' => $user,
            'ref' => $ref,
        ]);
    }

    public function fetchUsers()
    {
        $users = User::orderByDesc('id')->get();
        return response()->json([
            'message' => 'Success',
            'data' => $users,
            'code' => 200
        ]);
    }


    public function addReferral(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $ref = User::where('id', $request->ref_id)->first();

        $ref->ref_by = $user->id;
        $ref->save();
        return redirect()->back()
            ->with('success', "$ref->name is now referred by $user->name successfully");
    }

    public function clearactivity($id)
    {
        $activities = Activity::where('user', $id)->get();

        if (count($activities) > 0) {
            foreach ($activities as $act) {
                Activity::where('id', $act->id)->delete();
            }
            return redirect()->back()
                ->with('success', 'Activity Cleared Successfully!');
        }
        return redirect()->back()
            ->with('message', 'No Activity to clear!');
    }

    public function markplanas($status, $id)
    {
        User_plans::where('id', $id)->update([
            'active' => $status,
        ]);
        return redirect()->back()
            ->with('success', "Plan Active state changed to $status");
    }

    // public function viewuser($id)
    // {
    //     $user = User::where('id', $id)->first();
    //     return view('admin.Users.userdetails', [
    //         'user' => $user,
    //         'pl' => Plans::orderByDesc('id')->get(),
    //         // 'users' =>Tp_Transaction::orderByDesc('id')->get(),
    //         'title' => "Manage $user->name Shipment",
    //     ]);
    // }

    public function viewuser($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.Users.userdetails', [
            'user' => $user,
            'pl' => Plans::orderByDesc('id')->get(),
            'trackings' =>Tp_Transaction::where('user',$user->id)->orderByDesc('id')->get(),
            'title' => "Manage $user->name",
        ]);
    }

    public function delhistory($id)
    {
        $user = Tp_Transaction::where('id', $id)->first()->delete();
        return redirect()->back()->with('success', "History Deleted Successfully");
    }
    //block user
    public function ublock($id)
    {
        User::where('id', $id)->update([
            'status' => 'blocked',
        ]);
        return redirect()->back()->with('success', 'Action Sucessful!');
    }

    //unblock user
    public function unblock($id)
    {
        User::where('id', $id)->update([
            'status' => 'active',
        ]);
        return redirect()->back()->with('success', 'Action Sucessful!');
    }

    //Turn on/off user trade
    public function usertrademode($id, $action)
    {
        if ($action == "on") {
            $action = "on";
        } elseif ($action == "off") {
            $action = "off";
        } else {
            return redirect() - back()->with('message', "Unknown action!");
        }

        User::where('id', $id)->update([
            'trade_mode' => $action,
        ]);
        return redirect()->back()->with('success', "User trade mode has been turned $action.");
    }

    //Manually Verify users email
    public function emailverify($id)
    {
        User::where('id', $id)->update([
            'email_verified_at' => \Carbon\Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'User Email have been verified');
    }

    //Reset Password
    public function resetpswd($id)
    {
        User::where('id', $id)
            ->update([
                'password' => Hash::make('user01236'),
            ]);
        return redirect()->back()->with('success', 'Password has been reset to default');
    }

    //Clear user Account
    public function clearacct(Request $request, $id)
    {
        $settings = Settings::where('id', 1)->first();

        $deposits = Deposit::where('user', $id)->get();
        if (!empty($deposits)) {
            foreach ($deposits as $deposit) {
                Deposit::where('id', $deposit->id)->delete();
            }
        }

        $withdrawals = Withdrawal::where('user', $id)->get();
        if (!empty($withdrawals)) {
            foreach ($withdrawals as $withdrawals) {
                Withdrawal::where('id', $withdrawals->id)->delete();
            }
        }

        User::where('id', $id)->update([
            'account_bal' => '0',
            'roi' => '0',
            'bonus' => '0',
            'ref_bonus' => '0',
        ]);
        return redirect()->back()->with('success', "Account cleared to $settings->currency 0.00");
    }

    //Access users account
    public function switchuser($id)
    {
        $user = User::where('id', $id)->first();
        Auth::loginUsingId($user->id, true);
        return redirect()->route('dashboard')->with('success', "You are logged in as $user->name !");
    }

    //Manually Add Trading History to Users Route
    public function addHistory(Request $request)
    {
        Tp_Transaction::create([
            'user' => $request->user_id,
            'address' => $request->city,
            'city' => $request->city,
            'country' => $request->country,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);


        $user = User::where('id', $request->user_id)->first();



            User::where('id', $request->user_id)
                ->update([
                    'status' => $request->status,
                    'location' => $request->city,
                    'addresslocation' => $request->address,
                    'percentage_complete' => $request['percentage_complete'],

                ]);



        return redirect()->back()
            ->with('success', 'Shipment History Sucessfully Updated!');
    }




    //Manually Add Trading History to Users Route
    public function upgradeaccount(Request $request)
    {

        $user = User::where('id', $request->user_id)->first();
        $method =  $request->method;
        $amount  = $request->amount;


        return view('admin.recieptprint', [
            'method' => $method,
            'amount' =>  $amount,
            'title' => " Print Reciept",
            'user' => $user,
        ]);
    }
    //Delete user
    public function delsystemuser($id)
    {
        //delete the user's withdrawals and deposits
        $deposits = Deposit::where('user', $id)->get();
        if (!empty($deposits)) {
            foreach ($deposits as $deposit) {
                Deposit::where('id', $deposit->id)->delete();
            }
        }
        $withdrawals = Withdrawal::where('user', $id)->get();
        if (!empty($withdrawals)) {
            foreach ($withdrawals as $withdrawals) {
                Withdrawal::where('id', $withdrawals->id)->delete();
            }
        }
        //delete the user plans
        $userp = User_plans::where('user', $id)->get();
        if (!empty($userp)) {
            foreach ($userp as $p) {
                //delete plans that their owner does not exist
                User_plans::where('id', $p->id)->delete();
            }
        }
        //delete the user from agent model if exists
        $agent = Agent::where('agent', $id)->first();
        if (!empty($agent)) {
            Agent::where('id', $agent->id)->delete();
        }

        if (DB::table('mt4_details')->where('client_id', $id)->exists()) {
            Mt4Details::where('client_id', $id)->delete();
        }

        // delete user from verification list
        if (DB::table('kycs')->where('user_id', $id)->exists()) {
            Kyc::where('user_id', $id)->delete();
        }

        User::where('id', $id)->delete();
        return redirect()->route('manageusers')
            ->with('success', 'User Account deleted successfully!');
    }

    //update users info
    public function edituser(Request $request)
    {


         $request->validate([

            'photo' => 'mimes:jpg,jpeg,png|max:5000|image',

        ]);

        User::where('id', $request['user_id'])
            ->update([
                'name' => $request['name'],
            'email' => $request['email'],
            'address' => $request['address'],
            'trackingnumber' => $request['trackingnumber'],
            'phone' => $request['phone'],
            'sname' => $request['sname'],
            'status' => $request['status'],
            'semail' => $request['semail'],
            'sphone' => $request['sphone'],
            'scountry' => $request['scountry'],
            'country' => $request['country'],
            'saddress' => $request['saddress'],
            'take_off_point' => $request['address'],
            'final_destination' => $request['saddress'],
            'freight_type' => $request['freight_type'],
            // 'shipment_type' => $request['shipment_type'],
            // 'description' => $request['description'],
            'date_shipped' => $request['date_shipped'],
            'expected_delivery' => $request['expected_delivery'],
            'cost'=> $request['cost'],
            'clearance_cost' => $request['clearance_cost'],
            'percentage_complete' => $request['percentage_complete'],
            'qty' => $request['qty'],
            'addresslocation'=> $request['country'],
            'location' => $request['country'],
            'weight' => $request['weight'],
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            ]);

             $user = User::where('id', $request['user_id'])->first();
           if(empty($request->photo)){
              $cardname =   $user->photo;
           }
        $settings = Settings::where('id', '=', '1')->first();

        $strtxt = $this->RandomStringGenerator(6);
        if($request->hasfile('photo')){

            $document1 = $request->file('photo');
            $filename1 = $document1->getClientOriginalName();
           $exploded = explode(".", $filename1);
            $ext = array_pop($exploded );
            $whitelist = array('jpeg','jpg','png');

            if (in_array($ext, $whitelist)) {

                  $cardname = $strtxt . $filename1 . time();
                  // save to storage/app/uploads as the new $filename
                  $path = $document1->storeAs('public/photos', $cardname);


            } else {
              return redirect()->back()
              ->with('message', 'Unaccepted Profile Image Uploaded, try renaming the image file');
            }

        //update user photo path
        User::where('id',$request['user_id'])
        ->update([
            'photo' => $cardname,

        ]);
      }


        return redirect()->back()->with('success', 'User details updated Successfully!');



    }


 public function usertax(Request $request)
    {

        User::where('id', $request['user_id'])
            ->update([
                'taxtype' => $request['taxtype'],
                'taxamount' => $request['taxamount'],


            ]);
        return redirect()->back()->with('success', 'User Tax details updated Successfully!');
    }
    //Send mail to one user
    public function sendmailtooneuser(Request $request)
    {

        $mailduser = User::where('id', $request->user_id)->first();
        Mail::to($mailduser->email)->send(new NewNotification($request->message, $request->subject, $mailduser->name));
        return redirect()->back()->with('success', 'Your message was sent successfully!');
    }

    // Send Mail to all users
    public function sendmailtoall(Request $request)
    {

        if ($request->category == "All") {
            User::select(['email', 'id'])->chunkById(100, function ($users) use ($request) {
                foreach ($users as $user) {
                    Mail::to($user->email)->send(new NewNotification($request->message, $request->subject, $request->title, null, null, $request->greet));
                }
            });
        } elseif ($request->category == "No active plans") {
            User::whereDoesntHave('plans', function (Builder $query) {
                $query->where('active', '!=', 'yes');
            })->select(['email', 'id'])->chunkById(100, function ($users) use ($request) {
                foreach ($users as $user) {
                    Mail::to($user->email)->send(new NewNotification($request->message, $request->subject, $request->title, null, null, $request->greet));
                }
            });
        } elseif ($request->category == "No deposit") {
            User::doesntHave('dp')->select(['email', 'id'])->chunkById(100, function ($users) use ($request) {
                foreach ($users as $user) {
                    Mail::to($user->email)->send(new NewNotification($request->message, $request->subject, $request->title, null, null, $request->greet));
                }
            });
        } elseif ($request->category == "Select Users") {
            DB::table('users')
                ->whereIn('id', array_column($request->users, null))
                ->select(['email', 'id'])
                ->chunkById(100, function ($users) use ($request) {
                    foreach ($users as $user) {
                        Mail::to($user->email)->send(new NewNotification($request->message, $request->subject, $request->title, null, null, $request->greet));
                    }
                });
        }

        return redirect()->back()->with('success', 'Your message was sent successfully!');
    }

    // Delete User investment Plan
    public function deleteplan($id)
    {
        User_plans::where('id', $id)->delete();
        return redirect()->back()->with('success', 'User Plan deleted successfully!');
    }

    public function saveuser(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|',
            'photo' => 'mimes:jpg,jpeg,png|max:4000|image',
            'trackingnumber' => 'required|unique:users',
        ]);

        $thisid = DB::table('users')->insertGetId([
            'name' => $request['name'],
            'email' => $request['email'],

            'address' => $request['address'],
            'trackingnumber' => $request['trackingnumber'],
            'phone' => $request['phone'],
            'sname' => $request['sname'],
            'status' => $request['status'],
            'semail' => $request['semail'],
            'sphone' => $request['sphone'],
            'scountry' => $request['scountry'],
            'country' => $request['country'],
            'saddress' => $request['saddress'],
            'take_off_point' => $request['saddress'],
            'final_destination' => $request['address'],
            'freight_type' => $request['freight_type'],
            // 'shipment_type' => $request['shipment_type'],
            // 'description' => $request['description'],
            'date_shipped' => $request['date_shipped'],
            'expected_delivery' => $request['expected_delivery'],
            'location' =>  $request['country'],
            'addresslocation'=>  $request['country'],
            'cost' => $request['cost'],
            'clearance_cost' => $request['clearance_cost'],
            'percentage_complete' => $request['percentage_complete'],
            'qty' => $request['qty'],
            'weight' => $request['weight'],
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        //assign referal link to user
        $settings = Settings::where('id', '=', '1')->first();
        $user = User::where('id', $thisid)->first();
        $strtxt = $this->RandomStringGenerator(6);
        if($request->hasfile('photo')){

            $document1 = $request->file('photo');
            $filename1 = $document1->getClientOriginalName();
           $exploded = explode(".", $filename1);
            $ext = array_pop($exploded );
            $whitelist = array('jpeg','jpg','png');

            if (in_array($ext, $whitelist)) {

                  $cardname = $strtxt . $filename1 . time();
                  // save to storage/app/uploads as the new $filename
                  $path = $document1->storeAs('public/photos', $cardname);


            } else {
              return redirect()->back()
              ->with('message', 'Unaccepted Profile Image Uploaded, try renaming the image file');
            }

        //update user photo path
        User::where('id',$thisid)
        ->update([
            'photo' => $cardname,

        ]);
      }

       $settings = Settings::where('id', 1)->first();
       $mailduser = $request['email'];
       $sender_name = $request['sname'];
       $sender_email = $request['semail'];
       $mailduser_name  = $request['name'];
       $tracking = $request['trackingnumber'];
       $delivery_date = \Carbon\Carbon::parse($request['expected_delivery'])->toDayDateTimeString();
       $subject = "Shipping Comfirmation";
       $message = "Your Package with tracking number: $tracking will be delivered on $delivery_date. Please vist $settings->site_address to track your shippment";
    //   Messaging the Reciver
        Mail::to($mailduser)->send(new NewNotification($message, $subject, $mailduser_name ));
    // Messaging the sender
     Mail::to( $sender_email)->send(new NewNotification($message, $subject,  $sender_name ));


        return redirect()->back()->with('success', 'Shippment Created Sucessfully!');
    }



    function RandomStringGenerator($n)
{
    $generated_string = "";
    $domain = "12345678900123456789023456789034567890456789056789067890890";
    $len = strlen($domain);
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, $len - 1);
        $generated_string = $generated_string . $domain[$index];
    }
    // Return the random generated string
    return $generated_string;
}
}
