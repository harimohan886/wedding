@extends('admin.layouts.frontend')
@section('title', 'Contact Details Settings')
@section('meta_description', 'Jim Corbett Wedding Contact Details Settings')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Contact Details</h1>
        </div>

        <form method="post" action="{{ route('contact.settings.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="phone" class="form-label fw-bold">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $phone ?? '' }}"
                        placeholder="Phone Number....">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="alt_phone" class="form-label fw-bold">Alt. Phone Number</label>
                    <input type="text" class="form-control" id="alt_phone" name="alt_phone"
                        value="{{ $alt_phone ?? '' }}" placeholder="Alt. Phone Number....">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="second_alt_phone" class="form-label fw-bold">Second Alt. Phone Number</label>
                    <input type="text" class="form-control" id="second_alt_phone" name="second_alt_phone"
                        value="{{ $second_alt_phone ?? '' }}" placeholder="Second Alt. Phone Number....">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $email ?? '' }}"
                        placeholder="Email....">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="address" class="form-label fw-bold">Contact Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $address ?? '' }}"
                        placeholder="Address....">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Save</button>
                </div>
            </div>

        </form>



    </main>
@endsection
