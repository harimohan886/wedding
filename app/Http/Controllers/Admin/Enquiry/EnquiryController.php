<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\PageManagement;
use Illuminate\Support\Facades\Http;

class EnquiryController extends Controller
{
    public function packageEnquiry(Request $request)
    {
        $filter_name = $request->filter_name;
        $filter_number = $request->filter_number;
        $filter_booking_date = $request->filter_booking_date;
        $filter_booking_created = $request->filter_booking_created;

        $customers = Enquiry::query();

        if (isset($filter_name)) {
            $customers = $customers->where('traveller_name', 'like', '%' . $filter_name . '%');
        }

        if (isset($filter_number)) {
            $customers = $customers->where('mobile_no', 'like', '%' . $filter_number . '%');
        }

        if (isset($filter_booking_date)) {
            $customers = $customers->where('booking_date', 'like', '%' . $filter_booking_date . '%');
        }

        if (isset($filter_booking_created)) {
            $customers = $customers->where('created_at', 'like', '%' . $filter_booking_created . '%');
        }

        $customers = $customers->where('type', 'package')->orderBy('created_at', 'asc')->paginate(20);

        return view('admin.enquiry.package-enquiry', compact('customers', 'filter_name', 'filter_number', 'filter_booking_date', 'filter_booking_created'));
    }

    public function packageEnquiryDelete($id)
    {
        $customer = Enquiry::find($id);

        if ($customer) {
            $customer->delete();

            session()->flash('success', 'Package Enquiry deleted successfully');
        } else {
            session()->flash('error', 'Package Enquiry not found');
        }

        return redirect()->back();
    }

    public function hotelEnquiry(Request $request)
    {
        $filter_name = $request->filter_name;
        $filter_number = $request->filter_number;
        $filter_booking_date = $request->filter_booking_date;
        $filter_booking_created = $request->filter_booking_created;

        $customers = Enquiry::query();

        if (isset($filter_name)) {
            $customers = $customers->where('traveller_name', 'like', '%' . $filter_name . '%');
        }

        if (isset($filter_number)) {
            $customers = $customers->where('mobile_no', 'like', '%' . $filter_number . '%');
        }

        if (isset($filter_booking_date)) {
            $customers = $customers->where('booking_date', 'like', '%' . $filter_booking_date . '%');
        }

        if (isset($filter_booking_created)) {
            $customers = $customers->where('created_at', 'like', '%' . $filter_booking_created . '%');
        }

        $customers = $customers->where('type', 'hotel')->orderBy('created_at', 'asc')->paginate(20);

        return view('admin.enquiry.hotel-enquiry', compact('customers', 'filter_name', 'filter_number', 'filter_booking_date', 'filter_booking_created'));
    }

    public function hotelEnquiryDelete($id)
    {
        $customer = Enquiry::find($id);

        if ($customer) {
            $customer->delete();

            session()->flash('success', 'Hotel Enquiry deleted successfully');
        } else {
            session()->flash('error', 'Hotel Enquiry not found');
        }

        return redirect()->back();
    }

    public function generalEnquiry(Request $request)
    {
        $filter_name = $request->filter_name;
        $filter_number = $request->filter_number;
        $filter_booking_date = $request->filter_booking_date;
        $filter_booking_created = $request->filter_booking_created;

        $customers = Enquiry::query();

        if (isset($filter_name)) {
            $customers = $customers->where('name', 'like', '%' . $filter_name . '%');
        }

        if (isset($filter_number)) {
            $customers = $customers->where('mobile_no', 'like', '%' . $filter_number . '%');
        }

        if (isset($filter_booking_date)) {
            $customers = $customers->where('event_date', 'like', '%' . $filter_booking_date . '%');
        }

        if (isset($filter_booking_created)) {
            $customers = $customers->where('created_at', 'like', '%' . $filter_booking_created . '%');
        }

        $customers = $customers->where('type', 'general')->orderBy('created_at', 'asc')->paginate(20);

        return view('admin.enquiry.general-enquiry', compact('customers', 'filter_name', 'filter_number', 'filter_booking_date', 'filter_booking_created'));
    }

    public function generalEnquiryDelete($id)
    {
        $customer = Enquiry::find($id);

        if ($customer) {
            $customer->delete();

            session()->flash('success', 'Contact Enquiry deleted successfully');
        } else {
            session()->flash('error', 'Contact Enquiry not found');
        }

        return redirect()->back();
    }

    public function chambalEnquiry(Request $request)
    {
        $filter_name = $request->filter_name;
        $filter_number = $request->filter_number;
        $filter_booking_date = $request->filter_booking_date;
        $filter_booking_created = $request->filter_booking_created;

        $customers = Enquiry::query();

        if (isset($filter_name)) {
            $customers = $customers->where('traveller_name', 'like', '%' . $filter_name . '%');
        }

        if (isset($filter_number)) {
            $customers = $customers->where('mobile_no', 'like', '%' . $filter_number . '%');
        }

        if (isset($filter_booking_date)) {
            $customers = $customers->where('booking_date', 'like', '%' . $filter_booking_date . '%');
        }

        if (isset($filter_booking_created)) {
            $customers = $customers->where('created_at', 'like', '%' . $filter_booking_created . '%');
        }

        $customers = $customers->where('type', 'hotel')->orderBy('created_at', 'asc')->paginate(20);

        return view('admin.enquiry.chambal-enquiry', compact('customers', 'filter_name', 'filter_number', 'filter_booking_date', 'filter_booking_created'));
    }

    public function chambalEnquiryDelete($id)
    {
        $customer = Enquiry::find($id);

        if ($customer) {
            $customer->delete();

            session()->flash('success', 'Chambal Enquiry deleted successfully');
        } else {
            session()->flash('error', 'Chambal Enquiry not found');
        }

        return redirect()->back();
    }

    public function contactus(Request $request)
    {
        $contact = PageManagement::Where('type', 'contact')->first();

        return view('frontend.contact.contactus', compact('contact'));
    }

    public function contactusStore(Request $request)
    {
        // dd($request->all());
        $user = new Enquiry();
        $user->traveller_name = $request->name;
        $user->email_id = $request->email;
        $user->mobile_no = $request->phone;
        // $user->booking_date     = $request->booking_date;
        // $user->hotel_id         = $request->destination;
        $user->message = $request->message;
        $user->type = 'general';
        $user->save();

        $meta = '';
        if (isset($request->name) && $request->name != '') {
            $meta .= ',Name : ' . $request->name;
        }
        if (isset($request->email) && $request->email != '') {
            $meta .= ',Email : ' . $request->email;
        }
        if (isset($request->phone) && $request->phone != '') {
            $meta .= ',phone : ' . $request->phone;
        }
        if (isset($request->message) && $request->message != '') {
            $meta .= ',Message : ' . $request->message;
        }

        Http::post(env('CRM_LEAD_URL') . '/save-lead', [
            'name' => $request->name,
            'mobile' => $request->phone,
            'email' => $request->email,
            'website' => 'girlion.in',
            'meta' => $meta,
            'date' => $request->booking_date,
            'time' => date('H:i:s'),
            'source' => 'website',
            'assigned_to' => 2,
        ]);

        return [
            'status' => 'success',
            'message' => 'Your query submitted successfully....',
        ];
    }

    public function saveEnquiry(Request $request)
    {
        $meta = '';
        if (isset($request->type) && $request->type != '') {
            $meta .= 'Type : ' . $request->type;
        }
        if (isset($request->hotel_name) && $request->hotel_name != '') {
            $meta .= 'Hotel Name : ' . $request->hotel_name;
        }
        if (isset($request->message) && $request->message != '') {
            $meta .= 'Message : ' . $request->message;
        }

        Http::post(env('CRM_LEAD_URL_MAIN') . '/save-lead', [
            'name' => $request->name,
            'mobile' => $request->phone,
            'email' => $request->email ?? '',
            'website' => 'girlion.in',
            'custom_data' => $meta,
        ]);

        return response()->json(['success' => 'user  register']);
    }
}
