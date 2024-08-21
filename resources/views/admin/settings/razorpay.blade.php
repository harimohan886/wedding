@extends('admin.layouts.frontend')
@section('title', 'Razorpay Settings')
@section('meta_description', 'Jim Corbett Wedding Razorpay Settings')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Razorpay Settings</h1>
        </div>

        <img src="/admin/auth/razorpay.png" alt="razorpay logo" width="500px" height="200px" />

        <form method="post" action="{{ route('razorpay.settings.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <label for="razorpay_key" class="form-label fw-bold">Razorpay Key</label>
                    <input type="text" class="form-control" id="razorpay_key" name="razorpay_key"
                        value="{{ $razorpay_key ?? '' }}" placeholder="Razorpay Key....">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="razorpay_secret_key" class="form-label fw-bold">Razorpay Secret Key</label>
                    <input type="text" class="form-control" id="razorpay_secret_key" name="razorpay_secret_key"
                        value="{{ $razorpay_secret_key ?? '' }}" placeholder="Razorpay Secret Key....">
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
