@extends('admin.layouts.frontend')
@section('title', 'Hotels List Add Item')
@section('meta_description', 'Jim Corbett Wedding Hotels List Add Hotel')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Hotel</h1>
        </div>

        <form method="post" action="{{ route('hotel.list.item.add') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label for="name" class="form-label fw-bold">Hotel Name</label>
                    <input type="text" class="form-control" id="name" name="name" value=""
                        placeholder="Hotel name....">
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="rating" class="form-label fw-bold">Hotel Rating</label>
                    <select class="form-select" id="rating" name="rating">
                        <option value="">Select Rating</option>
                        <option value="3">3 Star</option>
                        <option value="4">4 Star</option>
                        <option value="5">5 Star</option>
                    </select>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="availability" class="form-label fw-bold">Availability</label>
                    <select class="form-select" id="availability" name="availability">
                        <option value="">Select Availability</option>
                        <option value="1">Availability</option>
                        <option value="0">Not Availability</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 mb-3">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="" placeholder="₹">
                </div>
                <div class="col-lg-3 mb-3">
                    <label for="price_type" class="form-label fw-bold">Price Type</label>
                    <select class="form-select" id="price_type" name="price_type">
                        <option value="">--Select--</option>
                        <option value="low">low</option>
                        <option value="medium">medium</option>
                        <option value="high">high</option>
                    </select>
                </div>
                <div class="col-lg-3 mb-3">
                    <label for="city" class="form-label fw-bold">Location</label>
                    <input type="text" class="form-control" id="city" name="city" value=""
                        placeholder="Location....">
                </div>
                <div class="col-lg-3 mb-3">
                    <label for="state" class="form-label fw-bold">State</label>
                    <select class="form-select" id="state" name="state">
                        <option value="">Select State</option>
                        @foreach ($states as $state)
                            <option value="{{ $state['state'] }}">{{ $state['state'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="homepage" class="form-label fw-bold">Home Page</label>
                    <select class="form-select" id="homepage" name="homepage">
                        <option value="">--Select--</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="review" class="form-label fw-bold">Review</label>
                    <select class="form-select" id="review" name="review">
                        <option value="">--Select--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="review_status" class="form-label fw-bold">Review Status</label>
                    <select class="form-select" id="review_status" name="review_status">
                        <option value="">--Select--</option>
                        <option value="Good">Good</option>
                        <option value="Very Good">Very Good</option>
                        <option value="Excellent">Excellent</option>
                    </select>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="property_type" class="form-label fw-bold">Property Type</label>
                    <select class="form-select" id="property_type" name="property_type">
                        <option value="">--Select--</option>
                        <option value="Hotel">Hotel</option>
                        <option value="Villa">Villa</option>
                        <option value="Resort">Resort</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Guest House">Guest House</option>
                        <option value="Hostel">Hostel</option>
                        <option value="Hotel & Resort">Hotel & Resort</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="address" class="form-label fw-bold">Address</label>
                    <textarea type="text" class="form-control" id="address" name="address" value=""
                        placeholder="address...."></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="description" class="form-label fw-bold">About Hotel</label>
                    <textarea type="text" class="form-control" id="description" name="description" value=""
                        placeholder="about hotel...."></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="meta_title" class="form-label fw-bold">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" value=""
                        placeholder="Meta Title....">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="meta_description" class="form-label fw-bold">Meta Description</label>
                    <textarea type="text" class="form-control" id="meta_description" name="meta_description" value=""
                        placeholder="Meta Description...."></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="image" class="form-label fw-bold">Upload Thumbnail (Please upload image dimension of
                        340 X 328 OR square size image)</label>
                    <input type="file" class="form-control" id="image" name="image" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="thumb_alt" class="form-label fw-bold">Thumbnail Alt Tag</label>
                    <input type="text" class="form-control" id="thumb_alt" name="thumb_alt" value=""
                        placeholder="Thumbnail Alt Tag....">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="package_image" class="form-label fw-bold">Upload Cover Image (Please upload image
                        dimension of 1140 X 300)</label>
                    <input type="file" class="form-control" id="package_image" name="package_image" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="package_alt" class="form-label fw-bold">Package Alt Tag</label>
                    <input type="text" class="form-control" id="package_alt" name="package_alt" value=""
                        placeholder="Package Alt Tag....">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="images" class="form-label fw-bold">Upload Hotel Images (Please upload images with
                        dimensions of 834 X 411)</label>
                    <input type="file" class="form-control" id="images" name="images[]" multiple>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="gallery_alt" class="form-label fw-bold">Thumbnail Alt Tag</label>
                    <input type="text" class="form-control" id="gallery_alt" name="gallery_alt" value=""
                        placeholder="Thumbnail Alt Tag....">
                </div>
            </div>

            <div class=" d-flex justify-content-between my-4 ">

                <button style="width: 16rem" type="submit" class="btn btn-success btn-block">Save</button>


                <a href="{{ route('hotel-list') }}" class="btn btn-success btn-block ">Back</a>
            </div>
            </div>

        </form>

    </main>
@endsection
