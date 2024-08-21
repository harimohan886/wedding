<?php

namespace App\Http\Controllers\Admin\WeddingPrograms;

use App\Http\Controllers\Controller;
use App\Models\WeddingProgram;
use App\Models\WeddingProgramImage;
use App\Models\WeddingProgramReview;
use App\Models\WeddingProgramVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class WeddingProgramsController extends Controller
{
    public function index(Request $request)
    {
        $query = WeddingProgram::query();
        $name = $request->input('name');
        $status = $request->input('status');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', 'like', '%' . $request->input('status') . '%');
        }
        $weddingPrograms = $query->paginate(10)->appends($request->all());

        return view('admin.wedding-program.wedding-program', compact('weddingPrograms', 'name', 'status'));
    }

    public function createWeddingProgram(Request $request)
    {
        return view('admin.wedding-program.add-wedding-program');
    }

    public function storeWeddingProgram(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'admin/uploads/wedding/';
            if (!file_exists(public_path($uploadPath))) {
                mkdir(public_path($uploadPath), 0777, true);
            }
            chmod(public_path($uploadPath), 0777);

            $uploadData = parent::uploadImage($uploadPath, $request->file('image'));
            $validatedData['image'] = $uploadData['uploaded_path'];
        }

        $validatedData['slug'] = Str::slug($validatedData['name']);
        $weddingProgram = WeddingProgram::create($validatedData);
        if ($weddingProgram) {
            return redirect()->back()->with('success', 'Wedding Program Created Successfully..');
        } else {
            return redirect()->back()->with('error', 'Wedding Program Creation Failed.');
        }
    }

    public function editWeddingProgram($id)
    {
        $weddingProgram = WeddingProgram::find($id);
        return view('admin.wedding-program.edit-wedding-program', compact('weddingProgram'));
    }

    public function updateWeddingProgram(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);
        $weddingProgram = WeddingProgram::find($id);

        if ($request->hasFile('image')) {
            if (File::exists(public_path($weddingProgram->image))) {
                File::delete(public_path($weddingProgram->image));
            }

            $uploadPath = 'admin/uploads/wedding/';
            if (!file_exists(public_path($uploadPath))) {
                mkdir(public_path($uploadPath), 0777, true);
            }
            chmod(public_path($uploadPath), 0777);

            $uploadData = parent::uploadImage($uploadPath, $request->file('image'));
            $validatedData['image'] = $uploadData['uploaded_path'];
        }

        $weddingProgram->update($validatedData);

        if ($weddingProgram) {
            return redirect()->route('wedding-programs-list')->with('success', 'Wedding Program Updated Successfully.');
        } else {
            return redirect()->route('wedding-programs-list')->with('error', 'Wedding Program Updation Failed.');
        }
    }

    public function updateWeddingProgramStatus(Request $request)
    {
        if ($request->id && isset($request->status)) {
            try {
                $weddingProgram = WeddingProgram::findOrFail($request->id);
                $weddingProgram->update(['status' => $request->status]);
                return [
                    'status' => 'success',
                    'msg' => 'Record updated successfully.',
                ];
            } catch (\Exception $e) {
                return [
                    'status' => 'failed',
                    'msg' => 'Error updating record: ' . $e->getMessage(),
                ];
            }
        } else {
            return [
                'status' => 'failed',
                'msg' => 'Invalid or missing data for update.',
            ];
        }
    }

    public function deleteWeddingProgram($id)
    {
        $weddingProgram = WeddingProgram::find($id);
        if ($weddingProgram) {
            $weddingProgram->delete();

            session()->flash('success', 'Wedding program deleted successfully');
        } else {
            session()->flash('error', 'Wedding program not found');
        }

        return redirect()->back();
    }




    public function getWeddingProgramItems($wedding_program_id)
    {
        $weddingProgram = WeddingProgram::find($wedding_program_id);
        $weddingProgramImages = WeddingProgramImage::where('wedding_programs_id', $wedding_program_id)->get();
        $weddingProgramVideos = WeddingProgramVideo::where('wedding_programs_id', $wedding_program_id)->get();
        $weddingProgramReviews = WeddingProgramReview::where('wedding_programs_id', $wedding_program_id)->get();

        return view('admin.wedding-program.wedding-program-items', compact(
            'weddingProgramImages',
            'weddingProgramVideos',
            'weddingProgramReviews',
            'weddingProgram'
        ));
    }



    public function uploadWeddingProgramImage(Request $request)
    {
        $validatedData = $request->validate([
            'wedding_programs_id' => 'required',
            'image.*' => 'required|image'
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'admin/uploads/wedding/';
            if (!file_exists(public_path($uploadPath))) {
                mkdir(public_path($uploadPath), 0777, true);
            }
            chmod(public_path($uploadPath), 0777);

            foreach ($request->file('image') as $image) {
                $uploadData = parent::uploadImage($uploadPath, $image);
                WeddingProgramImage::create([
                    'wedding_programs_id' => $validatedData['wedding_programs_id'],
                    'image_url' => $uploadData['uploaded_path'],
                    'image' => $uploadData['image_name']
                ]);
            }

            return redirect()->back()->with('success', 'Wedding Program Images Uploaded Successfully..');
        } else {
            return redirect()->back()->with('error', 'Wedding Program Image Upload Failed.');
        }
    }

    public function deleteWeddingProgramImage(Request $request)
    {
        $imageId = $request->input('weddingProgramImageId');
        $weddingProgramImage = WeddingProgramImage::find($imageId);

        if (!$weddingProgramImage) {
            return response()->json(['success' => false, 'message' => 'Image not found']);
        }

        $imagePath = public_path($weddingProgramImage->image_url);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
            $weddingProgramImage->delete();
            return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Image not found']);
        }
    }


    public function uploadWeddingProgramVideo(Request $request)
    {
        $validatedData = $request->validate([
            'wedding_programs_id' => 'required|exists:wedding_programs,id',
            'video.*' => 'required|file|mimes:mp4,avi,mov,flv,wmv|max:51200'
        ]);

        if ($request->hasFile('video')) {
            $uploadPath = 'admin/uploads/wedding/';
            if (!file_exists(public_path($uploadPath))) {
                mkdir(public_path($uploadPath), 0777, true);
            }

            foreach ($request->file('video') as $video) {
                $uploadData = parent::uploadVideo($uploadPath, $video);

                WeddingProgramVideo::create([
                    'wedding_programs_id' => $validatedData['wedding_programs_id'],
                    'video_url' => $uploadData['uploaded_path'],
                    'video' => $uploadData['video_name']
                ]);
            }
            return redirect()->back()->with('success', 'Wedding Program Videos Uploaded Successfully.');
        } else {
            return redirect()->back()->with('error', 'No videos were uploaded.');
        }
    }

    public function deleteWeddingProgramVideo(Request $request)
    {
        $videoId = $request->input('weddingProgramVideoId');
        $weddingProgramVideo = WeddingProgramVideo::find($videoId);

        if (!$weddingProgramVideo) {
            return response()->json(['success' => false, 'message' => 'Video not found']);
        }

        $videoPath = public_path($weddingProgramVideo->video_url);
        if (File::exists($videoPath)) {
            File::delete($videoPath);
            $weddingProgramVideo->delete();
            return response()->json(['success' => true, 'message' => 'Video deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Video not found']);
        }
    }



    public function storeWeddingProgramReview(Request $request)
    {
        $validatedData = $request->validate([
            'wedding_programs_id' => 'required',
            'name' => 'required|string|max:255',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('profile')) {
            $uploadPath = 'admin/uploads/wedding/';
            if (!file_exists(public_path($uploadPath))) {
                mkdir(public_path($uploadPath), 0777, true);
            }
            chmod(public_path($uploadPath), 0777);

            $uploadData = parent::uploadImage($uploadPath, $request->file('profile'));

            $validatedData['image_url'] = $uploadData['uploaded_path'];
            $validatedData['profile'] = $uploadData['image_name'];
        }

        $weddingProgramReview = WeddingProgramReview::create($validatedData);
        if ($weddingProgramReview) {
            return redirect()->back()->with('success', 'Wedding Program Review Created Successfully..');
        } else {
            return redirect()->back()->with('error', 'Wedding Program Review Creation Failed.');
        }
    }

    public function updateWeddingProgramReview(Request $request, $wedding_program_id, $wedding_program_review_id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|boolean',
        ]);

        $review = WeddingProgramReview::where('id', $wedding_program_review_id)
            ->where('wedding_programs_id', $wedding_program_id)
            ->firstOrFail();

        if ($request->hasFile('profile')) {
            $oldImagePath = public_path($review->image_url);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $uploadPath = 'admin/uploads/wedding/';
            $uploadData = parent::uploadImage($uploadPath, $request->file('profile'));
            $validatedData['image_url'] = $uploadData['uploaded_path'];
            $validatedData['profile'] = $uploadData['image_name'];
        }

        $review->update($validatedData);

        return redirect()->back()->with('success', 'Wedding Program Review Updated Successfully.');
    }

    public function updateWeddingProgramReviewStatus(Request $request, $wedding_program_id, $wedding_program_review_id)
    {
        $validatedData = $request->validate([
            'status' => 'required|boolean',
        ]);

        $review = WeddingProgramReview::where('id', $wedding_program_review_id)
            ->where('wedding_programs_id', $wedding_program_id)
            ->firstOrFail();

        $review->status = $validatedData['status'];
        $review->save();

        return response()->json([
            'status' => 'success',
            'msg' => 'Status updated successfully.'
        ]);
    }

    public function deleteWeddingProgramReview($wedding_program_id, $wedding_program_review_id)
    {
        $review = WeddingProgramReview::where('id', $wedding_program_review_id)
            ->where('wedding_programs_id', $wedding_program_id)
            ->firstOrFail();

        if (File::exists(public_path($review->image_url))) {
            File::delete(public_path($review->image_url));
        }

        $review->delete();

        return redirect()->back()->with('success', 'Wedding Program Review Deleted Successfully.');
    }
}
