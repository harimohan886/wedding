@extends('admin.layouts.frontend')
@section('title', 'Jungle Trail Edit')
@section('meta_description', 'Jim Corbett Wedding Manage Safari Date Jungle Trail Edit Page')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
        <div>
            <h1> Edit Jim Corbett Wedding Event </h1>
            <form action="{{ route('date.jungle.trail.update', $date->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="inputdate" class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" id="inputdate" value="{{ $date->date }}">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4">
                        <label for="mode" class="form-label">Select Mode</label>
                        <select class="form-select" id="mode" name="mode" aria-label="Select Mode">
                            <option value="">Select Mode</option>
                            @foreach (getSafariModes() as $mode)
                                <option value="{{ $mode }}" @if ($mode === $date->mode) selected @endif>
                                    {{ $mode }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="zone" class="form-label">Select Zone</label>
                        <select class="form-select" id="zone" name="zone" aria-label="Select Zone">
                            <option value="">Select Zone</option>
                            @foreach (getSafariZones() as $zone)
                                <option value="{{ $zone }}" @if ($zone === $date->zone) selected @endif>
                                    {{ $zone }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4">
                        <label for="time" class="form-label">Select Time</label>
                        <select class="form-select" id="time" name="time" aria-label="Select Time">
                            <option value="">Select Time</option>
                            @foreach (getSafariTimings() as $time)
                                <option value="{{ $time }}" @if ($time === $date->time) selected @endif>
                                    {{ $time }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-4">
                        <label for="availability" class="form-label">Availability</label>
                        <select class="form-select" id="availability" aria-label="Select availability" name="availability">
                            <option value="">Select Availability</option>
                            <option value="1" {{ $date->status == 1 ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ $date->status == 0 ? 'selected' : '' }}>Not Available</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex gap-3 my-2">
                    <button type="submit" class="btn btn-success col-md-2">Submit</button>
                    <a href="{{ route('getJungleTrail') }}" class="btn btn-outline-danger col-md-2">Go Back</a>
                </div>
            </form>
        </div>
    </main>

@endsection
