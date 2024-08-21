<?php

namespace App\Http\Controllers\Admin\PageManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageManagement;
use App\Models\longWeekend;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PageManagementController extends Controller
{
    public function homeIndex(Request $request)
    {
        $home_page = PageManagement::where('type', 'home')->first();
        $home_page->path = isset($home_page->image) ? asset('/admin/page-management/' . $home_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.home', compact('home_page'));
    }

    public function homeStore(Request $request)
    {
        $home_page_exists = PageManagement::where('type', 'home')->exists();
        if ($home_page_exists) {

            PageManagement::where('type', 'home')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                    'section_2' => $request->section_2,
                    'section_3' => $request->section_3,
                    'section_4' => $request->section_4,
                    'section_5' => $request->section_5,
                    'section_6' => $request->section_6,
                    'section_7' => $request->section_7,
                    'section_8' => $request->section_8,
                    'section_9' => $request->section_9,
                    'section_10' => $request->section_10,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'home' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'home' . '_')) {
                        File::delete($file);
                    }
                }

                $image->move($removePath, $filename);

                PageManagement::where('type', 'home')->update(['image' => $filename]);
            }
        } else {
            $home_page                   = new PageManagement();
            $home_page->type             = 'home';
            $home_page->title            = $request->title;
            $home_page->banner_image_alt = $request->banner_image_alt;
            $home_page->meta_title       = $request->meta_title;
            $home_page->meta_description = $request->meta_description;
            $home_page->section_1        = $request->section_1;
            $home_page->section_2        = $request->section_2;
            $home_page->section_3        = $request->section_3;
            $home_page->section_4        = $request->section_4;
            $home_page->section_5        = $request->section_5;
            $home_page->section_6        = $request->section_6;
            $home_page->section_7        = $request->section_7;
            $home_page->section_8        = $request->section_8;
            $home_page->section_9        = $request->section_9;
            $home_page->section_10       = $request->section_10;

            $home_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'home' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }

                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);

                $home_page->image = $filename;
                $home_page->save();
            }
        }
        return redirect()->route('page.mangement.home.index')->with('success', 'Home Page updated successfully');
    }

    public function jungleIndex(Request $request)
    {
        $jungle_page = PageManagement::where('type', 'jungle')->first();
        $jungle_page->path = isset($jungle_page->image) ? asset('/admin/page-management/' . $jungle_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.jungle', compact('jungle_page'));
    }

    public function jungleStore(Request $request)
    {

        $jungle_page_exists = PageManagement::where('type', 'jungle')->exists();
        if ($jungle_page_exists) {

            PageManagement::where('type', 'jungle')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                    'section_2' => $request->section_2,
                    'section_3' => $request->section_3,
                    'section_4' => $request->section_4,
                    'section_5' => $request->section_5,
                    'section_6' => $request->section_6,
                    'section_7' => $request->section_7,
                    'section_8' => $request->section_8,
                    'section_9' => $request->section_9,
                    'section_10' => $request->section_10,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'jungle' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'jungle' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'jungle')->update(['image' => $filename]);
            }
        } else {
            $jungle_page                   = new PageManagement();
            $jungle_page->type             = 'jungle';
            $jungle_page->title            = $request->title;
            $jungle_page->banner_image_alt = $request->banner_image_alt;
            $jungle_page->meta_title       = $request->meta_title;
            $jungle_page->meta_description = $request->meta_description;
            $jungle_page->section_1        = $request->section_1;
            $jungle_page->section_2        = $request->section_2;
            $jungle_page->section_3        = $request->section_3;
            $jungle_page->section_4        = $request->section_4;
            $jungle_page->section_5        = $request->section_5;
            $jungle_page->section_6        = $request->section_6;
            $jungle_page->section_7        = $request->section_7;
            $jungle_page->section_8        = $request->section_8;
            $jungle_page->section_9        = $request->section_9;
            $jungle_page->section_10       = $request->section_10;

            $jungle_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'jungle' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $jungle_page->image = $filename;
                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $jungle_page->save();
            }
            $jungle_page->save();
        }
        return redirect()->route('page.mangement.jungle.index')->with('success', 'Jungle Page updated successfully');
    }

    public function devaliaIndex(Request $request)
    {
        $devalia_page = PageManagement::where('type', 'devalia')->first();
        $devalia_page->path = isset($devalia_page->image) ? asset('/admin/page-management/' . $devalia_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.devalia', compact('devalia_page'));
    }

    public function devaliaStore(Request $request)
    {

        $devalia_page_exists = PageManagement::where('type', 'devalia')->exists();
        if ($devalia_page_exists) {

            PageManagement::where('type', 'devalia')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                    'section_2' => $request->section_2,
                    'section_3' => $request->section_3,
                    'section_4' => $request->section_4,
                    'section_5' => $request->section_5,
                    'section_6' => $request->section_6,
                    'section_7' => $request->section_7,
                    'section_8' => $request->section_8,
                    'section_9' => $request->section_9,
                    'section_10' => $request->section_10,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'devalia' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'devalia' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'devalia')->update(['image' => $filename]);
            }
        } else {
            $devalia_page                   = new PageManagement();
            $devalia_page->type             = 'devalia';
            $devalia_page->title            = $request->title;
            $devalia_page->banner_image_alt = $request->banner_image_alt;
            $devalia_page->meta_title       = $request->meta_title;
            $devalia_page->meta_description = $request->meta_description;
            $devalia_page->section_1        = $request->section_1;
            $devalia_page->section_2        = $request->section_2;
            $devalia_page->section_3        = $request->section_3;
            $devalia_page->section_4        = $request->section_4;
            $devalia_page->section_5        = $request->section_5;
            $devalia_page->section_6        = $request->section_6;
            $devalia_page->section_7        = $request->section_7;
            $devalia_page->section_8        = $request->section_8;
            $devalia_page->section_9        = $request->section_9;
            $devalia_page->section_10       = $request->section_10;

            $devalia_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'devalia' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $devalia_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $devalia_page->save();
            }
            $devalia_page->save();
        }
        return redirect()->route('page.mangement.devalia.index')->with('success', 'Devalia Page updated successfully');
    }

    public function kankaiIndex(Request $request)
    {
        $kankai_page = PageManagement::where('type', 'kankai')->first();
        $kankai_page->path = isset($kankai_page->image) ? asset('/admin/page-management/' . $kankai_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.kankai', compact('kankai_page'));
    }

    public function kankaiStore(Request $request)
    {

        $kankai_page_exists = PageManagement::where('type', 'kankai')->exists();
        if ($kankai_page_exists) {

            PageManagement::where('type', 'kankai')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                    'section_2' => $request->section_2,
                    'section_3' => $request->section_3,
                    'section_4' => $request->section_4,
                    'section_5' => $request->section_5,
                    'section_6' => $request->section_6,
                    'section_7' => $request->section_7,
                    'section_8' => $request->section_8,
                    'section_9' => $request->section_9,
                    'section_10' => $request->section_10,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'kankai' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'kankai' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'kankai')->update(['image' => $filename]);
            }
        } else {
            $kankai_page                   = new PageManagement();
            $kankai_page->type             = 'kankai';
            $kankai_page->title            = $request->title;
            $kankai_page->banner_image_alt = $request->banner_image_alt;
            $kankai_page->meta_title       = $request->meta_title;
            $kankai_page->meta_description = $request->meta_description;
            $kankai_page->section_1        = $request->section_1;
            $kankai_page->section_2        = $request->section_2;
            $kankai_page->section_3        = $request->section_3;
            $kankai_page->section_4        = $request->section_4;
            $kankai_page->section_5        = $request->section_5;
            $kankai_page->section_6        = $request->section_6;
            $kankai_page->section_7        = $request->section_7;
            $kankai_page->section_8        = $request->section_8;
            $kankai_page->section_9        = $request->section_9;
            $kankai_page->section_10       = $request->section_10;

            $kankai_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'kankai' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $kankai_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $kankai_page->save();
            }
            $kankai_page->save();
        }
        return redirect()->route('page.mangement.kankai.index')->with('success', 'Kankai Page updated successfully');
    }

    public function girnarIndex(Request $request)
    {
        $girnar_page = PageManagement::where('type', 'girnar')->first();
        $girnar_page->path = isset($girnar_page->image) ? asset('/admin/page-management/' . $girnar_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.girnar', compact('girnar_page'));
    }

    public function girnarStore(Request $request)
    {

        $girnar_page_exists = PageManagement::where('type', 'girnar')->exists();
        if ($girnar_page_exists) {

            PageManagement::where('type', 'girnar')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                    'section_2' => $request->section_2,
                    'section_3' => $request->section_3,
                    'section_4' => $request->section_4,
                    'section_5' => $request->section_5,
                    'section_6' => $request->section_6,
                    'section_7' => $request->section_7,
                    'section_8' => $request->section_8,
                    'section_9' => $request->section_9,
                    'section_10' => $request->section_10,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'girnar' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'girnar' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'girnar')->update(['image' => $filename]);
            }
        } else {
            $girnar_page                   = new PageManagement();
            $girnar_page->type             = 'girnar';
            $girnar_page->title            = $request->title;
            $girnar_page->banner_image_alt = $request->banner_image_alt;
            $girnar_page->meta_title       = $request->meta_title;
            $girnar_page->meta_description = $request->meta_description;
            $girnar_page->section_1        = $request->section_1;
            $girnar_page->section_2        = $request->section_2;
            $girnar_page->section_3        = $request->section_3;
            $girnar_page->section_4        = $request->section_4;
            $girnar_page->section_5        = $request->section_5;
            $girnar_page->section_6        = $request->section_6;
            $girnar_page->section_7        = $request->section_7;
            $girnar_page->section_8        = $request->section_8;
            $girnar_page->section_9        = $request->section_9;
            $girnar_page->section_10       = $request->section_10;

            $girnar_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'girnar' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $girnar_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $girnar_page->save();
            }
            $girnar_page->save();
        }
        return redirect()->route('page.mangement.girnar.index')->with('success', 'Girnar Page updated successfully');
    }

    public function hotelIndex(Request $request)
    {
        $hotel_page = PageManagement::where('type', 'hotel')->first();
        $hotel_page->path = isset($hotel_page->image) ? asset('/admin/page-management/' . $hotel_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.hotel', compact('hotel_page'));
    }

    public function hotelStore(Request $request)
    {

        $hotel_page_exists = PageManagement::where('type', 'hotel')->exists();
        if ($hotel_page_exists) {

            PageManagement::where('type', 'hotel')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->heading,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'hotel' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'hotel' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'hotel')->update(['image' => $filename]);
            }
        } else {
            $hotel_page                   = new PageManagement();
            $hotel_page->type             = 'hotel';
            $hotel_page->title            = $request->title;
            $hotel_page->banner_image_alt = $request->banner_image_alt;
            $hotel_page->meta_title       = $request->meta_title;
            $hotel_page->meta_description = $request->meta_description;
            $hotel_page->section_1        = $request->heading;

            $hotel_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'hotel' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $hotel_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $hotel_page->save();
            }
            $hotel_page->save();
        }
        return redirect()->route('page.mangement.hotel.index')->with('success', 'Hotel Page updated successfully');
    }

    public function packageIndex(Request $request)
    {
        $package_page = PageManagement::where('type', 'package')->first();
        $package_page->path = isset($package_page->image) ? asset('/admin/page-management/' . $package_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.package', compact('package_page'));
    }

    public function packageStore(Request $request)
    {

        $package_page_exists = PageManagement::where('type', 'package')->exists();
        if ($package_page_exists) {

            PageManagement::where('type', 'package')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                    'section_2' => $request->section_2,
                    'section_3' => $request->section_3,
                    'section_4' => $request->section_4,
                    'section_5' => $request->section_5,
                    'section_6' => $request->section_6,
                    'section_7' => $request->section_7,
                    'section_8' => $request->section_8,
                    'section_9' => $request->section_9,
                    'section_10' => $request->section_10,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'package' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'package' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'package')->update(['image' => $filename]);
            }
        } else {
            $package_page                   = new PageManagement();
            $package_page->type             = 'package';
            $package_page->title            = $request->title;
            $package_page->banner_image_alt = $request->banner_image_alt;
            $package_page->meta_title       = $request->meta_title;
            $package_page->meta_description = $request->meta_description;
            $package_page->section_1        = $request->section_1;
            $package_page->section_2        = $request->section_2;
            $package_page->section_3        = $request->section_3;
            $package_page->section_4        = $request->section_4;
            $package_page->section_5        = $request->section_5;
            $package_page->section_6        = $request->section_6;
            $package_page->section_7        = $request->section_7;
            $package_page->section_8        = $request->section_8;
            $package_page->section_9        = $request->section_9;
            $package_page->section_10       = $request->section_10;

            $package_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'package' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $package_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $package_page->save();
            }
            $package_page->save();
        }
        return redirect()->route('page.mangement.package.index')->with('success', 'Package Page updated successfully');
    }

    public function contactIndex(Request $request)
    {
        $contact_page = PageManagement::where('type', 'contact')->first();
        $contact_page->path = isset($contact_page->image) ? asset('/admin/page-management/' . $contact_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.contact', compact('contact_page'));
    }

    public function contactStore(Request $request)
    {

        $contact_page_exists = PageManagement::where('type', 'contact')->exists();
        if ($contact_page_exists) {

            PageManagement::where('type', 'contact')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'contact' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'contact' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'contact')->update(['image' => $filename]);
            }
        } else {
            $contact_page                   = new PageManagement();
            $contact_page->type             = 'contact';
            $contact_page->title            = $request->title;
            $contact_page->banner_image_alt = $request->banner_image_alt;
            $contact_page->meta_title       = $request->meta_title;
            $contact_page->meta_description = $request->meta_description;
            $contact_page->section_1        = $request->section_1;

            $contact_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'contact' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $contact_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $contact_page->save();
            }
            $contact_page->save();
        }
        return redirect()->route('page.mangement.contact.index')->with('success', 'Contact Page updated successfully');
    }

    public function faqIndex(Request $request)
    {
        $faq_page = PageManagement::where('type', 'faq')->first();
        $faq_page->path = isset($faq_page->image) ? asset('/admin/page-management/' . $faq_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.faq', compact('faq_page'));
    }

    public function faqStore(Request $request)
    {

        $faq_page_exists = PageManagement::where('type', 'faq')->exists();
        if ($faq_page_exists) {

            PageManagement::where('type', 'faq')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'faq' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'faq' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'faq')->update(['image' => $filename]);
            }
        } else {
            $faq_page                   = new PageManagement();
            $faq_page->type             = 'faq';
            $faq_page->title            = $request->title;
            $faq_page->banner_image_alt = $request->banner_image_alt;
            $faq_page->meta_title       = $request->meta_title;
            $faq_page->meta_description = $request->meta_description;
            $faq_page->section_1        = $request->section_1;

            $faq_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'faq' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $faq_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $faq_page->save();
            }
            $faq_page->save();
        }
        return redirect()->route('page.mangement.faq.index')->with('success', 'Faq Page updated successfully');
    }

    public function doDoNotIndex(Request $request)
    {
        $DoDoNot_page = PageManagement::where('type', 'do-and-dont')->first();
        $DoDoNot_page->path = isset($DoDoNot_page->image) ? asset('/admin/page-management/' . $DoDoNot_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.doDoNot', compact('DoDoNot_page'));
    }

    public function doDoNotStore(Request $request)
    {
        // dd($request->section_1);
        $DoDoNot_page_exists = PageManagement::where('type', 'do-and-dont')->exists();
        if ($DoDoNot_page_exists) {

            PageManagement::where('type', 'do-and-dont')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'do-and-dont' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'do-and-dont' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'do-and-dont')->update(['image' => $filename]);
            }
        } else {
            $DoDoNot_page                   = new PageManagement();
            $DoDoNot_page->type             = 'do-and-dont';
            $DoDoNot_page->title            = $request->title;
            $DoDoNot_page->banner_image_alt = $request->banner_image_alt;
            $DoDoNot_page->meta_title       = $request->meta_title;
            $DoDoNot_page->meta_description = $request->meta_description;
            $DoDoNot_page->section_1        = $request->section_1;

            $DoDoNot_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'do-and-dont' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $DoDoNot_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $DoDoNot_page->save();
            }
            $DoDoNot_page->save();
        }
        return redirect()->route('page.mangement.doDoNot.index')->with('success', 'Do & Do Not Page updated successfully');
    }

    public function historyIndex(Request $request)
    {
        $history_page = PageManagement::where('type', 'attractions')->first();
        $history_page->path = isset($history_page->image) ? asset('/admin/page-management/' . $history_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.history', compact('history_page'));
    }

    public function historyStore(Request $request)
    {

        $history_page_exists = PageManagement::where('type', 'attractions')->exists();
        if ($history_page_exists) {

            PageManagement::where('type', 'attractions')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'history' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'attractions' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'attractions')->update(['image' => $filename]);
            }
        } else {
            $history_page                   = new PageManagement();
            $history_page->type             = 'attractions';
            $history_page->title            = $request->title;
            $history_page->banner_image_alt = $request->banner_image_alt;
            $history_page->meta_title       = $request->meta_title;
            $history_page->meta_description = $request->meta_description;
            $history_page->section_1        = $request->section_1;

            $history_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'history' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $history_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $history_page->save();
            }
            $history_page->save();
        }
        return redirect()->route('page.mangement.history.index')->with('success', 'Attractions Page updated successfully');
    }

    public function permitIndex(Request $request)
    {
        $permit_page = PageManagement::where('type', 'permit')->first();
        $permit_page->path = isset($permit_page->image) ? asset('/admin/page-management/' . $permit_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.permit', compact('permit_page'));
    }

    public function permitStore(Request $request)
    {

        $permit_page_exists = PageManagement::where('type', 'permit')->exists();
        if ($permit_page_exists) {

            PageManagement::where('type', 'permit')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'permit' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'permit' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'permit')->update(['image' => $filename]);
            }
        } else {
            $permit_page                   = new PageManagement();
            $permit_page->type             = 'permit';
            $permit_page->title            = $request->title;
            $permit_page->banner_image_alt = $request->banner_image_alt;
            $permit_page->meta_title       = $request->meta_title;
            $permit_page->meta_description = $request->meta_description;
            $permit_page->section_1        = $request->section_1;

            $permit_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'permit' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $permit_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $permit_page->save();
            }
            $permit_page->save();
        }
        return redirect()->route('page.mangement.permit.index')->with('success', 'Best Time To Visit Page updated successfully');
    }

    public function reachIndex(Request $request)
    {
        $reach_page = PageManagement::where('type', 'reach')->first();
        $reach_page->path = isset($reach_page->image) ? asset('/admin/page-management/' . $reach_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.reach', compact('reach_page'));
    }

    public function reachStore(Request $request)
    {

        $reach_page_exists = PageManagement::where('type', 'reach')->exists();
        if ($reach_page_exists) {

            PageManagement::where('type', 'reach')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'reach' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'reach' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'reach')->update(['image' => $filename]);
            }
        } else {
            $reach_page                   = new PageManagement();
            $reach_page->type             = 'reach';
            $reach_page->title            = $request->title;
            $reach_page->banner_image_alt = $request->banner_image_alt;
            $reach_page->meta_title       = $request->meta_title;
            $reach_page->meta_description = $request->meta_description;
            $reach_page->section_1        = $request->section_1;

            $reach_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'reach' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $reach_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $reach_page->save();
            }
            $reach_page->save();
        }
        return redirect()->route('page.mangement.reach.index')->with('success', 'How To Reach Page updated successfully');
    }

    public function termIndex(Request $request)
    {
        $term_page = PageManagement::where('type', 'term')->first();
        $term_page->path = isset($term_page->image) ? asset('/admin/page-management/' . $term_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.term', compact('term_page'));
    }

    public function termStore(Request $request)
    {

        $term_page_exists = PageManagement::where('type', 'term')->exists();
        if ($term_page_exists) {

            PageManagement::where('type', 'term')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'term' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'term' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'term')->update(['image' => $filename]);
            }
        } else {
            $term_page                   = new PageManagement();
            $term_page->type             = 'term';
            $term_page->title            = $request->title;
            $term_page->banner_image_alt = $request->banner_image_alt;
            $term_page->meta_title       = $request->meta_title;
            $term_page->meta_description = $request->meta_description;
            $term_page->section_1        = $request->section_1;

            $term_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'term' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $term_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $term_page->save();
            }
            $term_page->save();
        }
        return redirect()->route('page.mangement.term.index')->with('success', 'Term & Condtion Page updated successfully');
    }

    public function privacyIndex(Request $request)
    {
        $privacy_page = PageManagement::where('type', 'privacy')->first();
        $privacy_page->path = isset($privacy_page->image) ? asset('/admin/page-management/' . $privacy_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.privacy', compact('privacy_page'));
    }

    public function privacyStore(Request $request)
    {

        $privacy_page_exists = PageManagement::where('type', 'privacy')->exists();
        if ($privacy_page_exists) {

            PageManagement::where('type', 'privacy')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'privacy' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'privacy' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'privacy')->update(['image' => $filename]);
            }
        } else {
            $privacy_page                   = new PageManagement();
            $privacy_page->type             = 'privacy';
            $privacy_page->title            = $request->title;
            $privacy_page->banner_image_alt = $request->banner_image_alt;
            $privacy_page->meta_title       = $request->meta_title;
            $privacy_page->meta_description = $request->meta_description;
            $privacy_page->section_1        = $request->section_1;

            $privacy_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'privacy' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $privacy_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $privacy_page->save();
            }
            $privacy_page->save();
        }
        return redirect()->route('page.mangement.privacy.index')->with('success', 'Privacy Policy Page updated successfully');
    }


    public function pricingIndex(Request $request)
    {
        $pricing_page = PageManagement::where('type', 'pricing')->first();
        $pricing_page->path = isset($pricing_page->image) ? asset('/admin/page-management/' . $pricing_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.pricing', compact('pricing_page'));
    }

    public function pricingStore(Request $request)
    {

        $pricing_page_exists = PageManagement::where('type', 'pricing')->exists();
        if ($pricing_page_exists) {

            PageManagement::where('type', 'pricing')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                    'section_2' => $request->section_2,
                    'section_3' => $request->section_3,
                    'section_4' => $request->section_4,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'pricing' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'pricing' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'pricing')->update(['image' => $filename]);
            }
        } else {
            $pricing_page                   = new PageManagement();
            $pricing_page->type             = 'pricing';
            $pricing_page->title            = $request->title;
            $pricing_page->banner_image_alt = $request->banner_image_alt;
            $pricing_page->meta_title       = $request->meta_title;
            $pricing_page->meta_description = $request->meta_description;
            $pricing_page->section_1        = $request->section_1;
            $pricing_page->section_2        = $request->section_2;
            $pricing_page->section_3        = $request->section_3;
            $pricing_page->section_4        = $request->section_4;


            $pricing_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'pricing' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $pricing_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $pricing_page->save();
            }
            $pricing_page->save();
        }
        return redirect()->route('page.mangement.pricing.index')->with('success', 'Safari Pricing Page updated successfully');
    }


    public function aboutIndex(Request $request)
    {
        $about_page = PageManagement::where('type', 'about')->first();
        $about_page->path = isset($about_page->image) ? asset('/admin/page-management/'.$about_page->image) : 'https://via.placeholder.com/150';
        // $about_page->path = 'https://via.placeholder.com/150';
        return view('admin.page-management.about', compact('about_page'));
    }

    public function aboutStore(Request $request)
    {

        $about_page_exists = PageManagement::where('type', 'about')->exists();
        if ($about_page_exists) {

            PageManagement::where('type', 'about')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                    'section_2' => $request->section_2,
                    'section_3' => $request->section_3,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'about' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'about' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'about')->update(['image' => $filename]);
            }
        } else {
            $about_page                   = new PageManagement();
            $about_page->type             = 'about';
            $about_page->title            = $request->title;
            $about_page->banner_image_alt = $request->banner_image_alt;
            $about_page->meta_title       = $request->meta_title;
            $about_page->meta_description = $request->meta_description;
            $about_page->section_1        = $request->section_1;
            $about_page->section_2        = $request->section_2;
            $about_page->section_3        = $request->section_3;

            $about_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'about' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $about_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $about_page->save();
            }
            $about_page->save();
        }
        return redirect()->route('page.mangement.about.index')->with('success', 'About Page updated successfully');
    }


    public function cancellationIndex(Request $request)
    {
        $cancellation_page = PageManagement::where('type', 'cancellation')->first();
        $cancellation_page->path = isset($cancellation_page->image) ? asset('/admin/page-management/' . $cancellation_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.cancellation', compact('cancellation_page'));
    }

    public function cancellationStore(Request $request)
    {

        $cancellation_page_exists = PageManagement::where('type', 'cancellation')->exists();
        if ($cancellation_page_exists) {

            PageManagement::where('type', 'cancellation')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'cancellation' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'cancellation' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'cancellation')->update(['image' => $filename]);
            }
        } else {
            $cancellation_page                   = new PageManagement();
            $cancellation_page->type             = 'cancellation';
            $cancellation_page->title            = $request->title;
            $cancellation_page->banner_image_alt = $request->banner_image_alt;
            $cancellation_page->meta_title       = $request->meta_title;
            $cancellation_page->meta_description = $request->meta_description;
            $cancellation_page->section_1        = $request->section_1;

            $cancellation_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'cancellation' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $cancellation_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $cancellation_page->save();
            }
            $cancellation_page->save();
        }
        return redirect()->route('page.mangement.cancellation.index')->with('success', 'Cancellation Policy Page updated successfully');
    }

    public function festivalIndex(Request $request)
    {
        $festival_page = PageManagement::where('type', 'festival')->first();
        $festival_page->path = isset($festival_page->image) ? asset('/admin/page-management/' . $festival_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.festival', compact('festival_page'));
    }

    public function festivalStore(Request $request)
    {

        $festival_page_exists = PageManagement::where('type', 'festival')->exists();
        if ($festival_page_exists) {

            PageManagement::where('type', 'festival')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'festival' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'festival' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'festival')->update(['image' => $filename]);
            }
        } else {
            $festival_page                   = new PageManagement();
            $festival_page->type             = 'festival';
            $festival_page->title            = $request->title;
            $festival_page->banner_image_alt = $request->banner_image_alt;
            $festival_page->meta_title       = $request->meta_title;
            $festival_page->meta_description = $request->meta_description;

            $festival_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'festival' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $festival_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $festival_page->save();
            }
            $festival_page->save();
        }
        return redirect()->route('page.mangement.festival.index')->with('success', 'Festival Page updated successfully');
    }

    // public function weekendIndex(Request $request)
    // {
    //     $weekend_page = PageManagement::where('type','weekend')->first();
    //     $weekend_page->path = isset($weekend_page->image) ? asset('/admin/page-management/'.$weekend_page->image) : 'https://via.placeholder.com/150';
    //     return view('admin.page-management.weekend',compact('weekend_page'));
    // }

    public function weekendIndex()
    {
        $weekend_page = PageManagement::where('type', 'weekend')->first();
        $weekend_attr = longWeekend::get();
        $weekend_attr = $weekend_attr ? $weekend_attr->toArray() : [];
        if (isset($weekend_page)) {
            $weekend_page->path = isset($weekend_page->image) ? asset('/admin/page-management/' . $weekend_page->image) : 'https://via.placeholder.com/150';
        }
        return view('admin.page-management.weekend', compact('weekend_page', 'weekend_attr'));
    }

    // public function weekendStore(Request $request)
    // {

    //     $weekend_page_exists = PageBuilder::where('type', 'weekend')->exists();



    //     if ($weekend_page_exists) {

    //         if ($request->hasfile('image')) {
    //             $image = $request->file('image');
    //             $originalName = $image->getClientOriginalName();
    //             $filename = 'weekend' . '_' . $originalName;
    //             $path = public_path('admin/page-management/' . $filename);
    //             $removePath = public_path('admin/page-management/');

    //             $files = File::files($removePath);
    //             foreach ($files as $file) {
    //                 $fileInfo = pathinfo($file);
    //                 $fileBaseName = $fileInfo['filename'];

    //                 if (Str::startsWith($fileBaseName, 'weekend' . '_')) {
    //                     File::delete($file);
    //                 }
    //             }

    //             // Image::make($image->getRealPath())->resize(200, 200)->save($path);
    //             $image->move($removePath, $filename);

    //             PageManagement::where('type', 'weekend')->update(['image' => $filename]);
    //         }
    //         $data = [
    //             'title'            => $request->title,
    //             'heading'            => $request->heading,
    //             'subheading'            => $request->subheading,
    //             'section_10'       => $request->offer_status,
    //             'meta_title'       => $request->meta_title,
    //             'meta_description' => $request->meta_description,
    //         ];
    //         PageManagement::where('type', 'weekend')->update($data);

    //         $weekend_attr_exists = longWeekend::exists();
    //         if ($weekend_attr_exists) {
    //             if (isset($_POST['u_data'])) {
    //                 $editRow = count($_POST['u_data']);
    //                 // echo '<pre/>'; print_r($_POST['u_data']);die;
    //                 $imageArray = [];
    //                 $imgArray = [];
    //                 for ($i = 0; $i < $editRow; $i++) {

    //                     $existImage = longWeekend::where('id', $_POST["weekend_id"][$i])->first();

    //                     $hotel_title = $_POST['u_data'][$i]['hotel']['hotel_title'];
    //                     $leftArray = $_POST['u_data'][$i]['hotel']['left_offer'];
    //                     $leftList = implode("~", $leftArray);
    //                     $rightArray =  $_POST['u_data'][$i]['hotel']['right_offer'];
    //                     $rightList = implode("~", $rightArray);

    //                     $hotel_images = !empty($request->u_data[$i]['hotel']['hotel_images']) ? $request->u_data[$i]['hotel']['hotel_images'] : "";

    //                     if (!empty($hotel_images)) {
    //                         // echo '<pre/>'; print_r($hotel_images);//die;
    //                         foreach ($hotel_images as $image3) :
    //                             $var = date_create();
    //                             $time = date_format($var, 'YmdHis');
    //                             $hotelImageName = $time . '_' . $image3->getClientOriginalName();
    //                             $image3->storeAs('uploads/pages/weekend/', $hotelImageName, 'public');
    //                             $imgArray[] = $hotelImageName;
    //                         endforeach;
    //                         $hotel_images = implode(",", $imgArray);
    //                         // echo $hotel_images = $hotel_images .','.$existImage['images'];
    //                         $imgArray = [];
    //                     } else {
    //                         $hotel_images = $_POST['old_hotel_images'][$i];
    //                     }
    //                     // echo $hotel_images;
    //                     $attrData = [
    //                         "title"      => $hotel_title,
    //                         "images"     => $hotel_images ?? NULL,
    //                         "left_list"  => $leftList ?? NULL,
    //                         "right_list" => $rightList ?? NULL,

    //                     ];
    //                     longWeekend::where('id',  $_POST["weekend_id"][$i])->update($attrData);
    //                 }
    //                 // die;
    //             }
    //             if (isset($_POST['data'])) {
    //                 $newRow = count($_POST['data']);
    //                 // echo '<pre/>'; print_r($_POST['data']);die;
    //                 $imageArray = [];
    //                 $imgArray = [];
    //                 for ($i = 0; $i < $newRow; $i++) {
    //                     if (empty($_POST['data'][$i])) {
    //                         $i++;
    //                     }
    //                     $hotel_title = $_POST['data'][$i]['hotel']['hotel_title'];
    //                     $leftArray = $_POST['data'][$i]['hotel']['left_offer'];
    //                     $leftList = implode("~", $leftArray);
    //                     $rightArray =  $_POST['data'][$i]['hotel']['right_offer'];
    //                     $rightList = implode("~", $rightArray);

    //                     $hotel_images = !empty($request->data[$i]['hotel']['hotel_images']) ? $request->data[$i]['hotel']['hotel_images'] : "";

    //                     if (!empty($hotel_images)) {
    //                         // echo '<pre/>'; print_r($hotel_images);//die;
    //                         foreach ($hotel_images as $image3) :
    //                             $var = date_create();
    //                             $time = date_format($var, 'YmdHis');
    //                             $hotelImageName = $time . '_' . $image3->getClientOriginalName();
    //                             $image3->storeAs('uploads/pages/weekend/', $hotelImageName, 'public');
    //                             $imgArray[] = $hotelImageName;
    //                         endforeach;
    //                         echo $hotel_images = implode(",", $imgArray);
    //                         // echo $hotel_images = $hotel_images .','.$existImage['images'];
    //                         $imgArray = [];
    //                     } else {
    //                         $hotel_images = $_POST['old_hotel_images'][$i];
    //                     }
    //                     // echo $hotel_images;
    //                     $newRowData = [
    //                         "title"      => $hotel_title,
    //                         "images"     => $hotel_images ?? NULL,
    //                         "left_list"  => $leftList ?? NULL,
    //                         "right_list" => $rightList ?? NULL,

    //                     ];
    //                     echo '<pre/>';
    //                     print_r($newRowData);
    //                     longWeekend::insert($newRowData);
    //                 }
    //             }
    //             // die;
    //         } else {
    //             $imageArray = [];
    //             $imgArray = [];
    //             $visitorData = count($_POST['data']);
    //             for ($i = 0; $i < $visitorData; $i++) {


    //                 $hotel_title = $_POST['data'][$i]['hotel']['hotel_title'];
    //                 $leftArray = $_POST['data'][$i]['hotel']['left_offer'];
    //                 $leftList = implode("~", $leftArray);
    //                 $rightArray =  $_POST['data'][$i]['hotel']['right_offer'];
    //                 $rightList = implode("~", $rightArray);

    //                 $hotel_images = !empty($request->data[$i]['hotel']['hotel_images']) ? $request->data[$i]['hotel']['hotel_images'] : "";

    //                 if (!empty($hotel_images)) {
    //                     // echo '<pre/>'; print_r($hotel_images);//die;
    //                     foreach ($hotel_images as $image3) :
    //                         $var = date_create();
    //                         $time = date_format($var, 'YmdHis');
    //                         $hotelImageName = $time . '_' . $image3->getClientOriginalName();
    //                         $image3->storeAs('uploads/pages/weekend/', $hotelImageName, 'public');
    //                         $imgArray[] = $hotelImageName;
    //                     endforeach;
    //                     $hotel_images = implode(",", $imgArray);
    //                     $imgArray = [];
    //                 } else {
    //                     $hotel_images = $_POST['old_hotel_images'][$i];
    //                 }
    //                 // echo $hotel_images;
    //                 $attrData = [
    //                     "title"      => $hotel_title,
    //                     "images"     => $hotel_images ?? NULL,
    //                     "left_list"  => $leftList ?? NULL,
    //                     "right_list" => $rightList ?? NULL,

    //                 ];
    //                 longWeekend::insert($attrData);
    //             }
    //             // die;
    //         }
    //     } else {

    //         // $section1Image = $request->file('section_1');
    //         // if ($request->hasFile('section_1')) :
    //         //     foreach ($section1Image as $image):
    //         //         $var = date_create();
    //         //         $time = date_format($var, 'YmdHis');
    //         //         $names = $time . '-' . $image->getClientOriginalName();
    //         //         $image->storeAs('uploads/pages/weekend/', $names, 'public');
    //         //         $arr[] = $names;
    //         //     endforeach;
    //         //     $section_1Images = implode(",", $arr);
    //         // else:
    //         //         $section_1Images = NULL;
    //         // endif;

    //         if ($request->hasfile('banner_image')) {
    //             $image = $request->file('banner_image');
    //             $imgName = $image->getClientOriginalName();
    //             $image->storeAs('uploads/pages/weekend/', $imgName, 'public');
    //         }

    //         $weekend_page = new PageBuilder();
    //         $weekend_page->type             = 'weekend';
    //         $weekend_page->title            = $request->title;
    //         $weekend_page->heading            = $request->heading;
    //         $weekend_page->subheading            = $request->subheading;
    //         $weekend_page->section_10     = $request->offer_status;
    //         $weekend_page->meta_title       = $request->meta_title;
    //         $weekend_page->meta_description = $request->meta_description;
    //         $weekend_page->image            = $imgName ?? NULL;

    //         $do = $weekend_page->save();
    //         if ($do) {

    //             // echo '<pre/>';print_r($_FILES);
    //             $visitorData = count($_POST['data']);

    //             $imageArray = [];
    //             $imgArray = [];
    //             for ($i = 0; $i < $visitorData; $i++) {
    //                 // Start Left
    //                 $hotel_title = $_POST['data'][$i]['hotel']['hotel_title'];
    //                 $leftArray = $_POST['data'][$i]['hotel']['left_offer'];
    //                 $leftList = implode("~", $leftArray);
    //                 $rightArray =  $_POST['data'][$i]['hotel']['right_offer'];
    //                 $rightList = implode("~", $rightArray);

    //                 $hotel_images = !empty($request->data[$i]['hotel']['hotel_images']) ? $request->data[$i]['hotel']['hotel_images'] : "";
    //                 // echo '<pre/>';print_r($hotel_images);
    //                 if (!empty($hotel_images)) {
    //                     foreach ($hotel_images as $image3) :
    //                         // echo '<pre/>';print_r($image3);
    //                         $var = date_create();
    //                         $time = date_format($var, 'YmdHis');
    //                         $hotelImageName = $time . '_' . $image3->getClientOriginalName();
    //                         $image3->storeAs('uploads/pages/weekend/', $hotelImageName, 'public');
    //                         $imgArray[] = $hotelImageName;
    //                     endforeach;
    //                     $hotel_images = implode(",", $imgArray);
    //                     $imgArray = [];
    //                 } else {
    //                     $hotel_images = NULL;
    //                 }
    //                 $data[] = [
    //                     "title"      => $hotel_title,
    //                     "images"     => $hotel_images ?? NULL,
    //                     "left_list"  => $leftList ?? NULL,
    //                     "right_list" => $rightList ?? NULL,
    //                 ];
    //             }

    //             longWeekend::insert($data);
    //         }
    //         die;
    //     }
    //     return redirect()->route('superadmin.page-weekend.index')->with('success', 'Weekend Page updated successfully');
    // }

    public function removeHotel(Request $request, $id)
    {
        // dd($id);

        $do = longWeekend::where('id',  $request->id)->delete();
        if ($do) {
            return json_encode(["status" => "success", "message" => "Hotel removed successfully."]);
        }
    }


    public function destroy($id)
    {
        //$info =   longWeekend::find($id);
        $do = longWeekend::where('id',  $id)->delete();
        if ($do) {
            return json_encode(["status" => "success", "message" => "Hotel removed successfully."]);
        }
    }

    public function managerIndex(Request $request)
    {
        $files = Storage::disk('public')->files('/');
        $directories = Storage::disk('public')->directories('/');

        return view('admin.page-management.manager', compact('files', 'directories'));
    }

    public function viewDirectory($directory)
    {
        $files = Storage::disk('public')->files($directory);
        $directories = Storage::disk('public')->directories($directory);

        return view('admin.page-management.manager', compact('files', 'directories'));
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,pdf,docx|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();

        Storage::disk('public')->put($fileName, File::get($file));

        return redirect()->route('page.management.manager.index')->with('success', 'File uploaded successfully.');
    }

    public function deleteFile($file)
    {
        Storage::disk('public')->delete($file);

        return redirect()->route('page.management.manager.index')->with('success', 'File deleted successfully.');
    }
}
