@extends('admin.layouts.frontend')
@section('title', 'Chambal Package Booking')
@section('meta_description', 'Chambal Package Booking')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Chambal Safari Package Booking</h1>
        </div>
        <div class="top_fields">
            <form method="get" action="{{ route('safari-booking', ['type' => 'chambal_safari']) }}">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="filter_user" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="filter_user" name="filter_user"
                            value="{{ $filter_user ?? '' }}" placeholder="Customer Name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="filter_phone" class="form-label">Customer Number</label>
                        <input type="text" class="form-control" id="filter_phone" name="filter_phone"
                            value="{{ $filter_phone ?? '' }}" placeholder="Customer Number">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="filter_email" class="form-label">Customer Email</label>
                        <input type="email" class="form-control" id="filter_email" name="filter_email"
                            value="{{ $filter_email ?? '' }}" placeholder="Customer Email">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="filter_date" class="form-label">Booking Date</label>
                        <input type="date" class="form-control" id="filter_date" name="filter_date"
                            value="{{ $filter_date ?? '' }}">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="" class="form-label">Payment Status</label>
                        <select name="filter_status" id="filter_status" class="form-control">
                            <option value="">--Select Payment Status--</option>
                            <option value="pending" {{ $filter_status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="partially-paid" {{ $filter_status == 'partially-paid' ? 'selected' : '' }}>
                                Partially Paid</option>
                            <option value="paid" {{ $filter_status == 'paid' ? 'selected' : '' }}>Paid</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="filter_created_date" class="form-label">Created Date</label>
                        <input type="date" class="form-control" id="filter_created_date" name="filter_created_date"
                            value="{{ $filter_created_date ?? '' }}">
                    </div>
                    <div class="d-flex align-items-end gap-3 col-lg-4 mb-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('safari-booking', ['type' => 'chambal_safari']) }}" class="btn btn-primary">Clear
                            Filter</a>
                    </div>
                </div>
            </form>

            <div class="tabsection jungle">
                <div class="table-responsive">
                    <table class="table tablesection border-light">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Type</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Customer Email</th>
                                <th scope="col">Customer Phone</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->date }}</td>
                                    <td>{{ $booking->type }}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->user->email }}</td>
                                    <td>{{ $booking->user->phone }}</td>
                                    <td>{{ $booking->total }}</td>
                                    <td>{{ $booking->status }}</td>
                                    <td>{{ $booking->created_at }}</td>
                                    <td>
                                        <div class="btn-group d-flex gap-2 align-items-center justify-content-center"
                                            role="group">
                                            <a href="{{ route('safari-booking-edit', $booking->id) }}" class="editbutton">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <form action="{{ route('safari-booking.delete', $booking->id) }}"
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
                    <p>
                        <b>
                            Total records: {{ $bookings->total() }},
                            Displaying records {{ $bookings->firstItem() }}
                            to
                            {{ $bookings->lastItem() }}
                            of {{ $bookings->total() }}
                        </b>
                    </p>
                    {{ $bookings->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </main>
@endsection
