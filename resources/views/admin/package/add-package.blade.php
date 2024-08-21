@extends('admin.layouts.frontend')
@section('title', 'Package List Add Item')
@section('meta_description', 'Jim Corbett Wedding Package List Add Hotel')
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
            <h1 class="h2">Add Package</h1>
        </div>

        <form method="post" action="{{ route('package.list.item.add') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-3 mb-3">
                    <label for="name" class="form-label fw-bold">Package Name</label>
                    <input type="text" class="form-control" id="name" name="name" value=""
                        placeholder="Package name....">
                </div>
                <div class="col-sm-3  mb-3">
                    <label for="rating" class="form-label fw-bold">Package Rating</label>
                    <select class="form-select" id="rating" name="rating">
                        <option value="">Select Rating</option>
                        <option value="3">3 Star</option>
                        <option value="4">4 Star</option>
                        <option value="5">5 Star</option>
                    </select>
                </div>
                <div class="col-sm-3  mb-3">
                    <label for="availability" class="form-label fw-bold">Availability</label>
                    <select class="form-select" id="availability" name="availability">
                        <option value="">Select Availability</option>
                        <option value="1">Availability</option>
                        <option value="0">Not Availability</option>
                    </select>
                </div>
                <div class="col-sm-3  mb-3">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="" placeholder="₹">
                </div>
            </div>

            <div class="row  mb-3">
                <div class="col-sm-3">
                    <label for="discount" class="form-label fw-bold">Discount</label>
                    <input type="text" class="form-control" id="discount" name="discount" value="" placeholder="%">
                </div>
                <div class="col-sm-3">
                    <label for="homepage" class="form-label fw-bold">Home Page</label>
                    <select class="form-select" id="homepage" name="homepage">
                        <option value="">--Select--</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col-sm-3 mb-3">
                    <label for="duration" class="form-label fw-bold">Duration</label>
                    <select class="form-select" id="duration" name="duration">
                        <option value="">Select Duration</option>
                        <option value="1 week">1 Week</option>
                        <option value="2 week">2 Week</option>
                        <option value="extra week">Extra Week</option>
                    </select>
                </div>

                <div class="col-sm-3 mb-3"id="themesSelect">
                    <label for="themes" class="form-label fw-bold">Themses</label>
                    <select class="selectpicker" id="themes" name="themes[]" multiple aria-label="size 3 select example">
                        <option value="Jim Corbett Wedding Family Tour">Jim Corbett Wedding Family Tour</option>
                        <option value="Jim Corbett Wedding Honeymoon Tour">Jim Corbett Wedding Honeymoon Tour</option>
                        <option value="Jim Corbett Wedding Group Tour">Jim Corbett Wedding Group Tour</option>
                    </select>
                </div>
            </div>

            <div class="row  mb-3">
                <div class="col-sm-12 ">
                    <label for="description" class="form-label fw-bold">About Package</label>
                    <textarea type="text" class="form-control" id="description" name="description" value=""
                        placeholder="about package...."></textarea>
                </div>
            </div>

            <div class="row  mb-3">
                <div class="col-sm-12">
                    <label for="meta_title" class="form-label fw-bold">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" value=""
                        placeholder="Meta Title....">
                </div>
            </div>

            <div class="row  mb-3">
                <div class="col-sm-12">
                    <label for="meta_description" class="form-label fw-bold">Meta Description</label>
                    <textarea type="text" class="form-control" id="meta_description" name="meta_description" value=""
                        placeholder="Meta Description...."></textarea>
                </div>
            </div>

            <div class="row  mb-3">
                <div class="col-sm-12">
                    <label for="image" class="form-label fw-bold">Upload Image (Please upload image dimension of 358 X
                        274)</label>
                    <input type="file" class="form-control" id="image" name="image" value="">
                </div>
            </div>

            <div class="d-flex justify-content-between my-3">
                <button style="width: 12rem" type="submit" class="btn btn-success btn-block btn-lg">Save</button>

                <a href="{{ route('package-list') }}" class="btn btn-outline-dark btn-block btn-lg">Back</a>
            </div>
            </div>

        </form>

    </main>
@endsection
