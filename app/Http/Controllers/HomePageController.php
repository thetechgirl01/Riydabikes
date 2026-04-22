<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Plans;
use App\Models\Agent;
use App\Models\User_plans;
use App\Models\Admin;
use App\Models\Faq;
use App\Models\Images;
use App\Models\Testimony;
use App\Models\Content;
use App\Models\Asset;
use Illuminate\Support\Facades\Validator;
use App\Models\Mt4Details;
use App\Models\Deposit;
use App\Models\Wdmethod;
use App\Models\Withdrawal;
use App\Models\Cp_transaction;
use App\Models\TermsPrivacy;
use App\Models\Tp_Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Mail\NewNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index(){
        $settings=Settings::where('id', '=', '1')->first();
        //sum total deposited
        $total_deposits = DB::table('deposits')->select(DB::raw("SUM(amount) as total"))->
        where('status','Processed')->get();

        //sum total withdrawals
        $total_withdrawals = DB::table('withdrawals')->select(DB::raw("SUM(amount) as total"))->
        where('status','Processed')->get();


        return view('home.index')->with(array(
            'settings' => $settings,
            'total_users' => User::count(),
            'plans' => Plans::all(),
            'total_deposits' => $total_deposits,
            'total_withdrawals' => $total_withdrawals,
            'faqs'=> Faq::orderby('id', 'desc')->get(),
            'test'=> Testimony::orderby('id', 'desc')->get(),
            'withdrawals' => Withdrawal::orderby('id','DESC')->take(7)->get(),
            'deposits' => Deposit::orderby('id','DESC')->take(7)->get(),
            'title' => $settings->site_title,
            'mplans' => Plans::where('type','Main')->get(),
            'pplans' => Plans::where('type','Promo')->get(),
        ));
    }

    //Licensing and registration route
    public function licensing(){

        return view('home.licensing')
        ->with(array(
            'mplans' => Plans::where('type','Main')->get(),
            'pplans' => Plans::where('type','Promo')->get(),
            'title' => 'Licensing, regulation and registration',
            'settings' => Settings::where('id', '=', '1')->first(),
        ));
    }

    //Terms of service route
    public function terms(){

        return view('home.terms')
        ->with(array(
            'mplans' => Plans::where('type','Main')->get(),
            'title' => 'Terms of Service',
            'settings' => Settings::where('id', '=', '1')->first(),
        ));
    }


    public function track(){

        return view('home.track-order')
        ->with(array(

            'title' => 'Trackng Your order',
            'settings' => Settings::where('id', '=', '1')->first(),
        ));
    }

    public function quote_request(){

        return view('home.request-quote')
        ->with(array(

            'title' => 'Request A quote',
            'settings' => Settings::where('id', '=', '1')->first(),
        ));
    }

    public function  diplomatic(){

        return view('home.diplomatic')
        ->with(array(

            'title' => 'Diplomatic Bag and Secure Logistics',
            'settings' => Settings::where('id', '=', '1')->first(),
        ));
    }




    public function  services(){

        return view('home.services')
        ->with(array(

            'title' => 'Our Services',
            'settings' => Settings::where('id', '=', '1')->first(),
        ));
    }




    public function printnow($id){


        $user = User::where('id', $id)->first();



        return view('home.printinvoice', [

            'title' => " Print Invoice",
            'user' => $user,
            'settings' => Settings::where('id', '=', '1')->first(),
        ]);

        }
    public function trackingresult(Request $request){

        $trackingnumber = trim($request->trackingnumber);
        $courier =  User::where('trackingnumber', $trackingnumber)->first();
      if(empty($courier->trackingnumber)){
        return redirect()->back()->with('error','Error!! Tracking number does not exist');
      }
        return view('home.track-result')
        ->with(array(
            'tracks'=> Tp_Transaction::where('user',$courier->id)->orderByDesc('id')
            ->get(),
            'title' => 'Tracking Result',
            'courier' =>  $courier,
            'settings' => Settings::where('id', '=', '1')->first(),
            'latesttrack'=>Tp_Transaction::where('user',$courier->id)->orderBy('created_at', 'desc')->first(),
        ));
    }


    //Privacy policy route
    public function privacy(){
        $terms = TermsPrivacy::find(1);
        if ($terms->useterms == 'no') {
           return redirect()->back();
        }
        return view('home.privacy')
        ->with(array(
            'mplans' => Plans::where('type','Main')->get(),
            'title' => 'Privacy Policy',
            'settings' => Settings::where('id', '=', '1')->first(),
        ));
    }

    //FAQ route
    public function faq(){

        return view('home.faq')
        ->with(array(
            'title' => 'FAQs',
            'faqs'=> Faq::orderby('id', 'desc')->get(),
            'settings' => Settings::where('id', '=', '1')->first(),
        ));
    }



     //license route
    public function license(){

        return view('home.license')
        ->with(array(
            'title' => 'License',
            'faqs'=> Faq::orderby('id', 'desc')->get(),
            'settings' => Settings::where('id', '=', '1')->first(),
        ));
    }


  //license route
    public function security(){

        return view('home.security')
        ->with(array(
            'title' => 'security',
            'faqs'=> Faq::orderby('id', 'desc')->get(),
            'settings' => Settings::where('id', '=', '1')->first(),
        ));
    }


    //about route
    public function about(){

        return view('home.about')
        ->with(array(
            'mplans' => Plans::where('type','Main')->get(),

            'title' => 'About',
            'settings' => Settings::where('id', '=', '1')->first(),
        ));
    }

    //Contact route
    public function contact(){
        return view('home.contact')
        ->with(array(
            'mplans' => Plans::where('type','Main')->get(),
                'pplans' => Plans::where('type','Promo')->get(),

            'title' => 'Contact',
            'settings' => Settings::where('id', '=', '1')->first(),
        ));
    }



    //send contact message to admin email
    public function sendcontact(Request $request){

        $settings=Settings::where('id','1')->first();
        $objDemo = new \stdClass();
        $objDemo->message = substr(wordwrap($request['message'],70),0,350);
        $objDemo->sender = "$settings->site_name";
        $objDemo->date = \Carbon\Carbon::Now();
        $objDemo->subject = "$request->subject,  my email $request->email";
        Mail::bcc($settings->contact_email)->send(new NewNotification($objDemo));
        return redirect()->back()
        ->with('success', ' Your message was sent successfully!');
    }
}
