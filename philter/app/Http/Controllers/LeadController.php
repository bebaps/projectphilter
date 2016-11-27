<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Auth;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /****************************************
     * View all Leads
     ****************************************/
    public function index()
    {
        $leads = Auth::user()->projects;

        return view('all-leads', ['leads' => $leads]);
    }

    /****************************************
     * Show a form to create a new Lead
     ****************************************/
    public function create()
    {
        return view('new-lead');
    }

    /****************************************
     * Save a new Lead in the database
     ****************************************/
    public function store(Request $request)
    {
        $lead = new Lead;

        $lead->lead_name        = $request->input('lead_name');
        $lead->lead_company     = $request->input('lead_company');
        $lead->lead_email       = $request->input('lead_email');
        $lead->lead_phone       = $request->input('lead_phone');
        $lead->lead_address     = $request->input('lead_address');
        $lead->lead_city        = $request->input('lead_city');
        $lead->lead_state       = $request->input('lead_state');
        $lead->lead_zip         = $request->input('lead_zip');
        $lead->lead_type        = $request->input('lead_type');
        $lead->lead_focus       = $request->input('lead_focus');
        $lead->lead_involvement = $request->input('lead_involvement');
        $lead->lead_boss        = $request->input('lead_boss');

        $lead->save();

        return redirect('leads');
    }

    /****************************************
     * Show an individual Lead
     ****************************************/
    public function show($id)
    {
        $user = Auth::user();
        $lead = Auth::user()->projects->find($id);

        return view('lead', ['lead' => $lead, 'user' => $user]);
    }

    /****************************************
     * Show the form to edit a Lead
     ****************************************/
    public function edit($id)
    {
        $lead = Lead::findOrFail($id);

        return view('edit-lead', ['lead' => $lead]);
    }

    /****************************************
     * Update the Lead in the database
     ****************************************/
    public function update(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);

        $lead->lead_name        = $request->input('lead_name');
        $lead->lead_company     = $request->input('lead_company');
        $lead->lead_email       = $request->input('lead_email');
        $lead->lead_phone       = $request->input('lead_phone');
        $lead->lead_address     = $request->input('lead_address');
        $lead->lead_city        = $request->input('lead_city');
        $lead->lead_state       = $request->input('lead_state');
        $lead->lead_zip         = $request->input('lead_zip');
        $lead->lead_type        = $request->input('lead_type');
        $lead->lead_focus       = $request->input('lead_focus');
        $lead->lead_involvement = $request->input('lead_involvement');
        $lead->lead_boss        = $request->input('lead_boss');

        $lead->save();

        return redirect('leads');
    }

    /****************************************
     * Delete a Lead from the database
     ****************************************/
    public function destroy($id)
    {
        Lead::destroy($id);

        return redirect('leads');
    }
}
