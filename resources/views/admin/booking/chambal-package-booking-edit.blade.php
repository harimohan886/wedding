@extends('admin.layouts.frontend')
@section('title', 'Chambal Package Booking Edit')
@section('meta_description', 'Chambal Package Booking Edit Page')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Chambal Booking Details</h1>
        </div>
        <div class="table-responsive">
            <table class="table tablesection border-light">
                <thead>
                    <tr>
                        <th scope="col">Type</th>
                        <th scope="col">Booking Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Gst Amount</th>
                        <th scope="col">Amount with GST</th>
                        <th scope="col">Final Paid Amount</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Transaction ID</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $booking_details[0]['type'] }}</td>
                        <td>{{ $booking_details[0]['date'] }}</td>
                        <td>{{ $booking_details[0]['amount'] }}</td>
                        <td>{{ $booking_details[0]['gst_amount'] }}</td>
                        <td>{{ $booking_details[0]['amount_with_gst'] }}</td>
                        <td>{{ $booking_details[0]['total'] }}</td>
                        <td>{{ $booking_details[0]['payment_value'] }}</td>
                        <td>{{ $booking_details[0]['payment_id'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Customer Details</h1>
        </div>
        <div class="table-responsive">
            <table class="table tablesection border-light">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Id Proof No.</th>
                        <th scope="col">Email</th>
                        <th scope="col">State</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $users[0]['name'] }}</td>
                        <td>{{ $users[0]['phone'] }}</td>
                        <td>{{ $users[0]['custom_data'] }}</td>
                        <td>{{ $users[0]['email'] }}</td>
                        <td>{{ $users[0]['state'] }}</td>
                        <td>{{ $users[0]['address'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Chambal Package Details</h1>
        </div>
        <div class="table-responsive">
            <table class="table tablesection border-light">
                <thead>
                    <tr>
                        <th scope="col">Chambal Package</th>
                        <th scope="col">Safari Vehicle</th>
                        <th scope="col">Timeslot</th>
                        <th scope="col">Total Indians</th>
                        <th scope="col">Total Foreigner</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $package->name }}</td>
                        <td>{{ $booking_details[0]['mode'] }}</td>
                        <td>{{ $booking_details[0]['timeslot'] }}</td>
                        <td>{{ $booking_details[0]['total_indian_person'] }}</td>
                        <td>{{ $booking_details[0]['total_foreigner_person'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection
