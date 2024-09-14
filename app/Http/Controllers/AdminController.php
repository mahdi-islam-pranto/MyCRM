<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\LeadModel;



class AdminController extends Controller
{
    public function login(Request $req)
    {
        $submit = $req['submit'];
        if ($submit == 'submit') {
            $req->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

                if (Auth::attempt($req->only('email', 'password'))) {
                    return redirect('/home');
                }else{
                    return redirect('/login')->withError("Incorrect email or password");
                }

        }
        return view('login');
    }


    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }

    public function add_lead( Request $req)
    {
        $submit = $req['submit'];
        if($submit == 'submit') {
            $req->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'title' => 'required',
                'company' => 'required',
                'phone' => 'required',
            ]);

            $lead = new LeadModel();
            $lead -> first_name = $req['first_name'];
            $lead -> last_name = $req['last_name'];
            $lead -> title = $req['title'];
            $lead -> company = $req['company'];
            $lead -> phone = $req['phone'];
            $lead -> email = $req['email'];
            $lead -> lead_source = $req['lead_source'];
            $lead -> lead_status = $req['lead_status'];
            $lead -> address = $req['address'];
            $lead -> description = $req['description'];
            $lead -> save();

            return redirect('/manage_leads');

        }
        return view('/add_lead');
    }

    public function manage_leads(){
        $data['leads'] = LeadModel::all();
        return view('manage_leads')->with($data);
    }

    public function delete_lead($id){
        $lead = LeadModel::find($id);
        if($lead == ""){
            return redirect('/manage_leads');
        }else{
            $lead->delete();
            return redirect('/manage_leads');
        }
        
    }


    public function edit_lead($id, Request $req){
        $lead = LeadModel::find($id);
        if($lead == ""){
            return redirect('/manage_leads');
        }

        $submit = $req['submit'];
        if($submit == 'submit') {
            $req->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'title' => 'required',
                'company' => 'required',
                'phone' => 'required',
            ]);

           
            $lead -> first_name = $req['first_name'];
            $lead -> last_name = $req['last_name'];
            $lead -> title = $req['title'];
            $lead -> company = $req['company'];
            $lead -> phone = $req['phone'];
            $lead -> email = $req['email'];
            $lead -> lead_source = $req['lead_source'];
            $lead -> lead_status = $req['lead_status'];
            $lead -> address = $req['address'];
            $lead -> description = $req['description'];
            $lead -> save();

            return redirect('/manage_leads');

        }


        $data['lead_details'] = $lead;
        return view('edit_lead')->with($data);
        
    }



    public function view_lead($id, Request $req){
        $lead = LeadModel::find($id);
        if($lead == ""){
            return redirect('/manage_leads');
        }
        $data['lead_details'] = $lead;
        return view('view_lead')->with($data);
        
    }


    public function convert_lead($id){
        $lead = LeadModel::find($id);
        if($lead == ""){
            return redirect('/manage_leads');
        }
        $data['lead_details'] = $lead;
        return view('convert_lead')->with($data);
        
    }


}
