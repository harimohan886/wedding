@extends('admin.layouts.frontend')
@section('title', 'Contact Enquiry List')
@section('meta_description', 'Jim Corbett Wedding Booking Contact Enquiry List')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Contact Enquiries</h1>
        </div>
        <div class="top_fields">

            <form method="get" action="{{ route('general-enquiry-list') }}">
                <div class="row">
                    <div class="col-lg-3 col-md-3 mb-2">
                        <label for="filter_name" class="form-label">Filter by name</label>
                        <input type="text" class="form-control" id="filter_name" name="filter_name"
                            value="{{ $filter_name ?? '' }}" placeholder="Filter by name...">
                    </div>
                    <div class="col-lg-3 col-md-3 mb-2">
                        <label for="filter_number" class="form-label">Filter by number</label>
                        <input type="text" class="form-control" id="filter_number" name="filter_number"
                            value="{{ $filter_number ?? '' }}" placeholder="Filter by number...">
                    </div>
                    <div class="col-lg-3 col-md-3 mb-2">
                        <label for="filter_booking_date" class="form-label">Filter by Booking Date</label>
                        <input type="date" class="form-control" id="filter_booking_date" name="filter_booking_date"
                            value="{{ $filter_booking_date ?? '' }}" placeholder="Filter by email...">
                    </div>
                    <div class="col-lg-3 col-md-3 mb-2">
                        <label for="filter_booking_created" class="form-label">Filter by Booking Create At</label>
                        <input type="date" class="form-control" id="filter_booking_created" name="filter_booking_created"
                            value="{{ $filter_booking_created ?? '' }}" placeholder="Filter by email...">
                    </div>
                    <div class="d-flex align-items-end gap-3 col-lg-3 col-md-3 mb-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('general-enquiry-list') }}" class="btn btn-primary">Clear Filter</a>
                    </div>
                </div>
            </form>

            <div class="tabsection jungle">
                <div class="table-responsive">
                    <table class="table border-light tablesection">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Booking Date</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Venue</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer['id'] }}</td>
                                    <td>{{ $customer['event_date'] }}</td>
                                    <td>{{ $customer['name'] }}</td>
                                    <td>{{ $customer['mobile_no'] }}</td>
                                    <td>{{ $customer['venue'] }}</td>
                                    <td>{{ $customer['created_at'] }}</td>
                                    <td>
                                        <div class="btn-group d-flex align-items-center justify-content-center"
                                            role="group">

                                            <form action="{{ route('general.enquiry.delete', $customer['id']) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger mt-0 py-2 px-3">
                                                    <span data-feather="trash"></span>
                                                </button>
                                            </form>
                                        </div>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination-container">
                    <p><b>Total records: {{ $customers->total() }}, Displaying records {{ $customers->firstItem() }} to
                            {{ $customers->lastItem() }} of {{ $customers->total() }}</b></p>
                    {{ $customers->links('pagination::bootstrap-4') }}
                </div>
            </div>




    </main>

@endsection
