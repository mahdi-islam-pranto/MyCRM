<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\LeadModel;
use App\Models\AccountModel;
use App\Models\ContactModel;
use App\Models\DealModel;



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


    public function convert_lead($id , Request $req){
        $lead = LeadModel::find($id);
        if($lead == ""){
            return redirect('/manage_leads');
        }

        $submit = $req['submit'];
        if($submit == 'submit') {
            $req->validate([
                'ammount' => 'required',
                'deal_name' => 'required',
                'closing_date' => 'required',
                'deal_stage' => 'required',
                
            ]);

            // create account
            $account = new AccountModel();
            $account -> account_name = $lead -> company;
            $account -> phone = $lead -> phone;
            
            $account -> save();
            $account_id = $account -> id;

            // create contact
            $contact = new ContactModel();
            $contact -> contact_name = $lead -> first_name . " " . $lead -> last_name;
            $contact -> email = $lead -> email;
            $contact -> phone = $lead -> phone;
            $contact -> account_id = $account_id;
            $contact -> save();
            $contact_id = $contact -> id;

            // create deal
            $deal = new DealModel();
            $deal -> ammount = $req['ammount'];
            $deal -> deal_name = $req['deal_name'];
            $deal -> closing_date = $req['closing_date'];
            $deal -> deal_stage = $req['deal_stage'];
            $deal -> account_id = $account_id;
            $deal -> contact_id = $contact_id;
            $deal -> save();


            // delete old lead
            $lead -> delete();

            return redirect('/manage_deals');
            
            
        }

        $data['lead_details'] = $lead;
        return view('convert_lead')->with($data);
        
    }


    public function manage_accounts(){
        $data['accounts'] = AccountModel::all();
        return view('manage_accounts')->with($data);
    }


    public function manage_deals(){
        $data['deals'] = DealModel::all();
        return view('manage_deals')->with($data);
    }


    public function manage_contacts(){
        $data['contacts'] = ContactModel::all();
        return view('manage_contacts')->with($data);
    }


    public function delete_contact($id){
        $contact = ContactModel::find($id);
        if($contact == ""){
            return redirect('/manage_contacts');
        }else{
            $contact->delete();
            return redirect('/manage_contacts');
        }
        
    }

    public function delete_account($id){
        $account = AccountModel::find($id);
        if($account == ""){
            return redirect('/manage_accounts');
        }else{
            $account->delete();
            return redirect('/manage_accounts');
        }
        
    }


    public function delete_deals($id){
        $deal = DealModel::find($id);
        if($deal == ""){
            return redirect('/manage_deals');
        }else{
            $deal->delete();
            return redirect('/manage_deals');
        }
        
    }


    

}
