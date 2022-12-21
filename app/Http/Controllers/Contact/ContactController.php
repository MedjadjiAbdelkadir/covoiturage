<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller{

    public function store(Request $request){

        $validated = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);  // End The Rules Of Validation

        $contact = new Contact();

        $contact->create([
            'full_name'=> $request->full_name ,
            'email'=> $request->email ,
            'phone'=> $request->phone ,
            'message'=> $request->message
        ]);    // Add Data in Data Base

        $reply ='Your message has been sent to our support team, your message will be reviewed and your concern will be answered as soon as possible' ;
        return redirect()->back()->with(['receiptMessage'=>$reply]) ;


    } // End Store Function

} // End ContactController Controller
