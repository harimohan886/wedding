<?php

namespace App\Http\Controllers\Admin\FormFields;

use App\Http\Controllers\Controller;
use App\Models\FormField;
use App\Models\Venue;
use App\Models\WeddingFunctions;
use App\Models\WeddingServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FormFieldsController extends Controller
{
    public function showFormFields()
    {
        $vanues = Venue::all();
        $weddingFunctions = WeddingFunctions::all();
        $weddingServices = WeddingServices::all();

        $maximum_budget = FormField::where('field', 'maximum_budget')->first();
        $maximum_guest = FormField::where('field', 'maximum_guest')->first();
        $maximum_rooms = FormField::where('field', 'maximum_rooms')->first();
        $maximum_ratings = FormField::where('field', 'maximum_ratings')->first();


        return view('admin.form-fields.form-fields', compact(
            'vanues',
            'weddingFunctions',
            'weddingServices',
            'maximum_budget',
            'maximum_guest',
            'maximum_rooms',
            'maximum_ratings'
        ));
    }

    public function saveFormFields(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'field' => 'required',
                'value' => 'required'
            ]);

            $saveForm = FormField::create($validatedData);
            if ($saveForm) {
                return redirect()->back()->with('success', 'Form fields updated successfully.');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to save form fields. Please try again.');
        }
    }

    public function updateFormFields(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'field' => 'required',
                'value' => 'required'
            ]);

            $saveForm = FormField::find($id);
            $saveForm->update($validatedData);
            if ($saveForm) {
                return redirect()->back()->with('success', 'Form fields updated successfully.');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to save form fields. Please try again.');
        }
    }


    public function createVenue()
    {
        return view('admin.form-fields.venue.venue-create');
    }

    public function storeVenue(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string'
            ]);

            $venue = Venue::create($validatedData);
            if ($venue) {
                return redirect()->back()->with('success', 'Venue created successfully.');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to save venue. Please try again.');
        }
    }

    public function editVenue($id)
    {
        $vanue = Venue::find($id);
        return view('admin.form-fields.venue.venue-edit', compact('vanue'));
    }

    public function updateVenue(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string'
            ]);

            $venue = Venue::find($id);
            $venue->update($validatedData);
            if ($venue) {
                return redirect()->back()->with('success', 'Venue updated successfully.');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to save venue. Please try again.');
        }
    }

    public function updateVenueStatus(Request $request)
    {
        if ($request->id && isset($request->status)) {
            try {
                $venue = Venue::findOrFail($request->id);
                $venue->update(['status' => $request->status]);

                return response()->json([
                    'status' => 'success',
                    'msg' => 'Venue status updated successfully.',
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'failed',
                    'msg' => 'Error updating record: ' . $e->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'status' => 'failed',
                'msg' => 'Invalid or missing data for update.',
            ]);
        }
    }

    public function venueDelete($id)
    {
        $venue = Venue::find($id);
        if ($venue) {
            $venue->delete();
            session()->flash('success', 'Venue deleted successfully.');
        } else {
            session()->flash('error', 'Venue not found!');
        }
        return redirect()->back();
    }
















    public function createWeddingFunction()
    {
        return view('admin.form-fields.wedding-function.wedding-function-create');
    }

    public function storeWeddingFunction(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string'
            ]);

            $weddingFunctions = WeddingFunctions::create($validatedData);
            if ($weddingFunctions) {
                return redirect()->back()->with('success', 'Wedding Function created successfully.');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to save wedding function. Please try again.');
        }
    }

    public function editWeddingFunction($id)
    {
        $weddingFunctions = WeddingFunctions::find($id);
        return view('admin.form-fields.wedding-function.wedding-function-edit', compact('weddingFunctions'));
    }

    public function updateWeddingFunction(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string'
            ]);

            $weddingFunctions = WeddingFunctions::find($id);
            $weddingFunctions->update($validatedData);
            if ($weddingFunctions) {
                return redirect()->back()->with('success', 'Wedding Function updated successfully.');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to save wedding function. Please try again.');
        }
    }

    public function updateWeddingFunctionStatus(Request $request)
    {
        if ($request->id && isset($request->status)) {
            try {
                $weddingFunctions = WeddingFunctions::findOrFail($request->id);
                $weddingFunctions->update(['status' => $request->status]);

                return response()->json([
                    'status' => 'success',
                    'msg' => 'Wedding function status updated successfully.',
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'failed',
                    'msg' => 'Error updating record: ' . $e->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'status' => 'failed',
                'msg' => 'Invalid or missing data for update.',
            ]);
        }
    }

    public function deleteWeddingFunction($id)
    {
        $weddingFunctions = WeddingFunctions::find($id);
        if ($weddingFunctions) {
            $weddingFunctions->delete();
            session()->flash('success', 'Wedding Function deleted successfully.');
        } else {
            session()->flash('error', 'Wedding Function not found!');
        }
        return redirect()->back();
    }
























    public function createWeddingService()
    {
        return view('admin.form-fields.wedding-service.wedding-service-create');
    }

    public function storeWeddingService(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string'
            ]);

            $weddingServices = WeddingServices::create($validatedData);
            if ($weddingServices) {
                return redirect()->back()->with('success', 'Wedding services created successfully.');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to save venue. Please try again.');
        }
    }

    public function editWeddingService($id)
    {
        $weddingServices = WeddingServices::find($id);
        return view('admin.form-fields.wedding-service.wedding-service-edit', compact('weddingServices'));
    }

    public function updateWeddingService(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string'
            ]);

            $weddingServices = WeddingServices::find($id);
            $weddingServices->update($validatedData);
            if ($weddingServices) {
                return redirect()->back()->with('success', 'Wedding services updated successfully.');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to save wedding services. Please try again.');
        }
    }

    public function updateWeddingServiceStatus(Request $request)
    {
        if ($request->id && isset($request->status)) {
            try {
                $weddingServices = WeddingServices::findOrFail($request->id);
                $weddingServices->update(['status' => $request->status]);

                return response()->json([
                    'status' => 'success',
                    'msg' => 'Wedding services status updated successfully.',
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'failed',
                    'msg' => 'Error updating record: ' . $e->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'status' => 'failed',
                'msg' => 'Invalid or missing data for update.',
            ]);
        }
    }

    public function deleteWeddingService($id)
    {
        $weddingServices = WeddingServices::find($id);
        if ($weddingServices) {
            $weddingServices->delete();
            session()->flash('success', 'Wedding services deleted successfully.');
        } else {
            session()->flash('error', 'Wedding services not found!');
        }
        return redirect()->back();
    }
}
