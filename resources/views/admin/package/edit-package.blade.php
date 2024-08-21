@extends('admin.layouts.frontend')
@section('title', 'Package List Edit Item')
@section('meta_description', 'Jim Corbett Wedding Package List Edit Package')
@section('content')
    <style>
        #themesSelect .bootstrap-select {
            width: 100%;
            border: 1.5px solid lightgrey;
            border-radius: 0.5rem;
        }

        #themesSelect .bootstrap-select button {
            height: 2.5rem;
        }

        #themesSelect .bootstrap-select button .filter-option {
            margin-top: 0px;
        }

        #themesSelect .bootstrap-select button .filter-option .filter-option-inner .filter-option-inner-inner {
            margin-top: -4px;
        }
    </style>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Package</h1>
        </div>

        <form method="post" action="{{ route('package.list.item.update', ['id' => $package->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-4 mb-3">
                    <label for="name" class="form-label fw-bold">Package Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $package->name }}"
                        placeholder="Package name....">
                </div>
                <div class="col-sm-4 mb-3">
                    <label for="rating" class="form-label fw-bold">Package Rating</label>
                    <select class="form-select" id="rating" name="rating">
                        <option value="">Select Rating</option>
                        <option value="3" @if ($package->rating == '3') selected @endif>3 Star</option>
                        <option value="4" @if ($package->rating == '4') selected @endif>4 Star</option>
                        <option value="5" @if ($package->rating == '5') selected @endif>5 Star</option>
                    </select>
                </div>
                <div class="col-sm-4 mb-3">
                    <label for="availability" class="form-label fw-bold">Availability</label>
                    <select class="form-select" id="availability" name="availability">
                        <option value="">Select Availability</option>
                        <option value="1" @if ($package->status == '1') selected @endif>Availability</option>
                        <option value="0" @if ($package->status == '0') selected @endif>Not Availability</option>
                    </select>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-4 mb-3">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $package->price }}"
                        placeholder="₹">
                </div>
                <div class="col-sm-4">
                    <label for="discount" class="form-label fw-bold">Discount</label>
                    <input type="text" class="form-control" id="discount" name="discount"
                        value="{{ $package->discount }}" placeholder="%">
                </div>
                <div class="col-sm-4 mb-3">
                    <label for="homepage" class="form-label fw-bold">Home Page</label>
                    <select class="form-select" id="homepage" name="homepage">
                        <option value="">--Select--</option>
                        <option value="1" @if ($package->homepage == '1') selected @endif>Yes</option>
                        <option value="0" @if ($package->homepage == '0') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="duration" class="form-label fw-bold">Duration</label>
                    <select class="form-select" id="duration" name="duration">
                        <option value="">Select Duration</option>
                        <option value="1 week" @if ($package->duration == '1 week') selected @endif>1 Week</option>
                        <option value="2 week" @if ($package->duration == '2 week') selected @endif>2 Week</option>
                        <option value="extra week" @if ($package->duration == 'extra week') selected @endif>Extra Week</option>
                    </select>
                </div>
                <div class="col-sm-6 mb-3"id="themesSelect">
                    <label for="themes" class="form-label fw-bold mb-0">Themes</label>
                    <select class="selectpicker" id="themes" name="themes[]" multiple aria-label="size 3 select example">
                        @foreach (['Jim Corbett Wedding Family Tour', 'Jim Corbett Wedding Honeymoon Tour', 'Jim Corbett Wedding Group Tour'] as $theme)
                            <option value="{{ $theme }}" @if (in_array($theme, $package->themes)) selected @endif>
                                {{ $theme }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mb-3">
                    <label for="description" class="form-label fw-bold">About Package</label>
                    <textarea type="text" class="form-control" id="description" name="description" value=""
                        placeholder="about package....">{{ $package->description }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mb-3">
                    <label for="meta_title" class="form-label fw-bold">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                        value="{{ $package->meta_title }}" placeholder="Meta Title....">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mb-3">
                    <label for="meta_description" class="form-label fw-bold">Meta Description</label>
                    <textarea type="text" class="form-control" id="meta_description" name="meta_description" value=""
                        placeholder="Meta Description....">{{ $package->meta_description }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mb-3">
                    <label for="image" class="form-label fw-bold">Upload Image (Please upload image dimension of 358 X
                        274)</label>
                    <input type="file" class="form-control" id="image" name="image" value="">
                    <img class="mt-2" src="{{ '/admin/uploads/packages/' . $package->image }}" width="250px"
                        height="200px">
                </div>
            </div>

            <div class="row d-flex justify-content-between mb-5">
                <div class="d-flex justify-content-between">
                    <button style="width:15rem;" type="submit" class="btn btn-success btn-block btn-lg">Save</button>

                    <a href="{{ route('package-list') }}" class="btn btn-outline-dark btn-block ">Back</a>
                </div>
            </div>

        </form>

    </main>
@endsection
