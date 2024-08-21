@extends('admin.layouts.frontend')
@section('title', 'Dashboarb')
@section('meta_description', 'Jim Corbett Wedding Dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <span style="color:red; float:right; font-size:16px;" id="error_messagess"></span>
            <span style="color:green; float:right; font-size:16px;" id="success_messagess"></span>
        </div>
        <div class="row">
            <div class="mt-2 col-xl-3 col-lg-6 col-md-12 col-12">
                <div class="card">
                    <div class="card-body card3 ">
                        <div class="d-flex justify-content-between align-items-center  ">
                            <div class="left">
                                <h4>Enquiries</h4>
                                <h1>{{ $enquiries }}</h1>
                                <p>Since 2022</p>
                            </div>
                            <div class="right">
                                <i class="bi bi-chat-text"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class=" mt-2 col-xl-3 col-lg-6 col-md-12 col-12">
                <div class="card">
                    <div class="card-body card4">
                        <div class="d-flex justify-content-between align-items-center  ">
                            <div class="left">
                                <h4>Customers</h4>
                                <h1>{{ $customers }}</h1>
                                <p>Registered upto now</p>
                            </div>
                            <div class="right">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="tabsection">
            <h3>Recent Enquiries</h3>
            <div class="table-responsive">
                <table class="table tablesection border-light">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Booking Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($general_enquiries as $general)
                            <tr>
                                <td>&nbsp;{{ $general['id'] }}</td>
                                <td>{{ $general['event_date'] }}</td>
                                <td>{{ $general['name'] }}</td>
                                <td>{{ $general['mobile_no'] }}</td>
                                <td>{{ $general['type'] }}</td>
                                <td><button class="btn btn-danger" onclick="deleteCustomerData({{ $general['id'] }})"><span
                                            data-feather="trash"></span></button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        function deleteCustomerData(id) {

            if (id == '') {
                $("#error_messagess").html('All Fileds Are Required!!').fadeIn(2000).fadeOut(5000);
                return;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ route('deleteCustomer') }}',
                data: JSON.stringify({
                    'id': id
                }),
                contentType: 'application/json',
                dataType: 'json',
                success: function(response) {
                    console.log(response.msg);
                    if (response.status = 'success') {
                        $("#success_messagess").html(response.msg).fadeIn(2000).fadeOut(5000);
                        window.location.href = '/dashboard';
                    } else if (response.status = 'failed') {
                        $("#error_messagess").html(response.msg).fadeIn(2000).fadeOut(5000);
                    }
                },
                error: function(error) {
                    console.log(error);
                    $("#error_messagess").html(error).fadeIn(2000).fadeOut(5000);
                }
            });
        }
    </script>

@endsection
