@extends('admin.layouts.frontend')
@section('title', 'Package Booking Edit')
@section('meta_description', 'Jim Corbett Wedding Package Booking Edit Page')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Safari Booking Details</h1>
        </div>


        <div class="table-responsive">
            <table class="table tablesection border-light">
                <thead>
                    <tr>
                        <th scope="col">Booking Zone</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Transaction ID</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $booking_details[0]['zone'] }}</td>
                        <td>{{ $booking_details[0]['date'] }}</td>
                        <td>{{ $booking_details[0]['timeslot'] }}</td>
                        <td>{{ $booking_details[0]['total'] }}</td>
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
                        <th scope="col">Email</th>
                        <th scope="col">State</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $users[0]['name'] }}</td>
                        <td>{{ $users[0]['phone'] }}</td>
                        <td>{{ $users[0]['email'] }}</td>
                        <td>{{ $users[0]['state'] }}</td>
                        <td>{{ $users[0]['address'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Traveller Details</h1>
        </div>

        <div class="table-responsive">
            <table class="table tablesection border-light">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Customer Type</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Nationality</th>
                        <th scope="col">State/Country</th>
                        <th scope="col">Id Proof Type</th>
                        <th scope="col">Id Proof Number</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($traveller_details as $details)
                        <tr>
                            <td>{{ $details->name }}</td>
                            <td>{{ $details->age }}</td>
                            <td>{{ $details->type }}</td>
                            <td>{{ $details->gender }}</td>
                            <td>{{ $details->nationality }}</td>
                            <td>{{ $details->state }}</td>
                            <td>{{ $details->idproof }}</td>
                            <td>{{ $details->idproof_number }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>

@endsection
