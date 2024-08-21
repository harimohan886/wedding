<?php

namespace App\Http\Controllers\Front\FooterPage;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\PageManagement;
use App\Models\Setting;
use App\Models\FormField;
use App\Models\Venue;
use App\Models\WeddingFunctions;
use App\Models\WeddingProgram;
use App\Models\WeddingServices;
use App\Models\WeddingProgramImage;
use App\Models\WeddingProgramReview;
use App\Models\WeddingProgramVideo;
use Illuminate\Support\Facades\Log;

class FooterPageManagementController extends Controller
{
    public function index()
    {
        try {
            $vanues = Venue::where('status', true)->get();
            $weddingFunctions = WeddingFunctions::where('status', true)->get();
            $weddingServices = WeddingServices::where('status', true)->get();
            $maximum_budget = (int) FormField::where('field', 'maximum_budget')->value('value');
            $maximum_guest = (int) FormField::where('field', 'maximum_guest')->value('value');
            $maximum_rooms = (int) FormField::where('field', 'maximum_rooms')->value('value');
            $maximum_ratings = (int) FormField::where('field', 'maximum_ratings')->value('value');

            $homepage = PageManagement::where('type', 'home')->first();
            $latestNews = Setting::where('type', 'news')->first();
            $latestNews['image'] = "admin/uploads/" . $latestNews->image;
            return view('front.home.index', compact(
                'homepage',
                'latestNews',
                'vanues',
                'weddingFunctions',
                'weddingServices',
                'maximum_budget',
                'maximum_guest',
                'maximum_rooms',
                'maximum_ratings'
            ));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function aboutUs()
    {
        $aboutUs = PageManagement::where('type', 'about')->first();
        return view('front.about.about', compact('aboutUs'));
    }

    public function galleryPage()
    {
        $weddingPrograms = WeddingProgram::where('status', true)->get();
        return view('front.gallery.gallery', compact('weddingPrograms'));
    }

    public function galleryPageDetail($slug)
    {
        $weddingProgram = WeddingProgram::where('slug', $slug)->first();
        $weddingProgramImages = WeddingProgramImage::where('wedding_programs_id', $weddingProgram->id)->where('status', true)->get();
        $weddingProgramVideos = WeddingProgramVideo::where('wedding_programs_id', $weddingProgram->id)->where('status', true)->get();
        $weddingProgramReviews = WeddingProgramReview::where('wedding_programs_id', $weddingProgram->id)->where('status', true)->paginate(3);

        return view('front.gallery.gallerydetail', compact(
            'weddingProgramImages',
            'weddingProgramVideos',
            'weddingProgramReviews',
            'weddingProgram'
        ));
    }

    public function aboutJimCorbett()
    {
        $jungle = PageManagement::where('type', 'jungle')->first();
        return view('front.about.aboutjimcorbett', compact('jungle'));
    }

    public function frequentlyAskedQuestions()
    {
        $frequentlyAskedQuestions = PageManagement::where('type', 'faq')->first();
        return view('front.faq.faq', compact('frequentlyAskedQuestions'));
    }

    public function contactUs()
    {
        $contact = PageManagement::where('type', 'contact')->first();
        $contactDetails = Setting::where('type', 'contact')->select('value')->first();
        return view('front.contact.contact', compact('contact', 'contactDetails'));
    }

    public function privacyPolicy()
    {
        $privacyPolicy = PageManagement::where('type', 'privacy')->first();
        return view('front.footer.privacy', compact('privacyPolicy'));
    }

    public function termAndConditions()
    {
        $termAndConditions = PageManagement::where('type', 'term')->first();
        return view('front.footer.termsandcondition', compact('termAndConditions'));
    }


    public function newsAndBlogs()
    {
        $newsess = News::where('status', 1)->get();
        return view('frontend.news.news', compact('newsess'));
    }
}
