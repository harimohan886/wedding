@extends('admin.layouts.frontend')
@section('title', 'Edit Safari Block Date')
@section('meta_description', 'Jim Corbett Wedding Edit Safari Block Date')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Safari Block Date</h1>
        </div>

        <form method="post" action="{{ route('blockdates.edit', ['id' => $id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-3 mb-2">
                    <label for="zone" class="form-label fw-bold">Zone</label>
                    <select class="form-select" id="zone" name="zone">
                        <option value="">--Select Zone--</option>
                        <option value="jungle_trail" @if ($zone == 'jungle_trail') selected @endif>Jim Corbett Wedding Jungle
                            Trail
                        </option>
                        <option value="devalia" @if ($zone == 'devalia') selected @endif>Devalia</option>
                        <option value="kankai" @if ($zone == 'kankai') selected @endif>Kankai</option>
                        <option value="girnar" @if ($zone == 'girnar') selected @endif>Girnar</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2">
                    <label for="from" class="form-label fw-bold">From Date</label>
                    <input type="date" class="form-control" id="from" name="from" value="{{ $from }}"
                        placeholder="From Date....">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2">
                    <label for="to" class="form-label fw-bold">To Date</label>
                    <input type="date" class="form-control" id="to" name="to" value="{{ $to }}"
                        placeholder="To Date....">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 mb-2">
                    <label for="message" class="form-label fw-bold">Message</label>
                    {{-- <input type="date" class="form-control" id="message" name="message" value="" placeholder="Message...."> --}}
                    <textarea type="text" class="form-control" id="message" name="message" value="" placeholder="Message....">{{ $message }}</textarea>
                </div>
            </div>

            <div class="row my-2">

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Save</button>

                    <a href="{{ route('blockdates.list.view') }}" class="btn btn-outline-dark btn-block btn-lg">Back</a>
                </div>


            </div>

        </form>



    </main>
@endsection
