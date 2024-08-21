<?php

namespace App\Http\Controllers\Front\Enquiry;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{
    public function enquiryGeneral(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile_no' => 'required|numeric',
            'venue' => 'nullable|string',
            'event_date' => 'nullable|date',
            'budget' => 'nullable|numeric|min:100000|max:10000000',
            'guests' => 'nullable|numeric|min:50|max:5000',
            'rooms' => 'nullable|numeric|min:0|max:100',
            'rating' => 'nullable|numeric|min:1|max:5',
            'functions.*' => 'nullable|string',
            'services.*' => 'nullable|string'
        ]);

        if ($request->functions) {
            $validatedData['functions'] = json_encode($validatedData['functions'] ?? []);
        }
        if ($request->services) {
            $validatedData['services'] = json_encode($validatedData['services'] ?? []);
        }
        // dd($validatedData);
        try {
            Enquiry::create($validatedData);
            return redirect()->back()->with(['success' => 'Enquiry submitted successfully!']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function saveEnquiry(Request $request)
    {
        $meta = '';
        if (isset($request->type) && $request->type != '') {
            $meta .= 'Type : ' . ucfirst($request->type);
        }

        Http::post(env('CRM_LEAD_URL_MAIN') . '/save-lead', [
            'name'          =>  $request->name,
            'mobile'        =>  $request->mobile_no,
            'email'         =>  $request->email,
            'website'       => 'ranthamboretigerreserve.in',
            'custom_data'   =>  $meta,
        ]);

        return response()->json([
            'success' => 'user  register'
        ]);
    }
}
