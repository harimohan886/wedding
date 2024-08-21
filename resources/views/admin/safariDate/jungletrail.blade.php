@extends('admin.layouts.frontend')
@section('title', 'Jim Corbett Wedding Dates')
@section('meta_description', 'Jim Corbett Wedding Lion Manage Safari Date Jungle Trail')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Jim Corbett Wedding Dates</h1>
            <div class="row" style="float: right; display:flex; align-items:flex-end">
                <div class="col-sm-6 col-lg-6">
                    <label for="file_input" class="form-label">Import CSV file</label>
                    <input onchange="ImportCsv();" class="form-control" type="file" id="file_input">
                </div>
                <div class="col-sm-6 col-lg-6">
                    <a href="{{ route('date.jungle.trail.create') }}" class=" btn btn-success">Create Event</a>
                    <button class=" btn btn-success" onclick="exportCsv();">Export Data</button>
                </div>
            </div>
        </div>

        <div class="top_fields">
            <form method="get" action="{{ route('getJungleTrail') }}">
                <div class="row d-flex gap-2 align-items-end">
                    <div class="col-sm-2 col-md-2">
                        <label for="filter_date" class="form-label">Filter by date</label>
                        <input type="date" class="form-control" id="filter_date" name="filter_date"
                            value="{{ $filter_date ?? '' }}">
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <label for="filter_mode" class="form-label">Filter by mode</label>
                        <select class="form-select" id="filter_mode" name="filter_mode" aria-label="Select Mode">
                            <option value="">Select Mode</option>
                            @foreach (getSafariModes() as $mode)
                                <option value="{{ $mode }}" {{ $filter_mode == $mode ? 'selected' : '' }}>
                                    {{ $mode }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <label for="filter_time" class="form-label">Filter by time</label>
                        <select class="form-select" id="filter_time" name="filter_time" aria-label="Select Time">
                            <option value="">Select Time</option>
                            @foreach (getSafariTimings() as $time)
                                <option value="{{ $time }}" {{ $filter_time == $time ? 'selected' : '' }}>
                                    {{ $time }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <label for="filter_zone" class="form-label">Filter by zone</label>
                        <select class="form-select" id="filter_zone" name="filter_zone" aria-label="Select Zone">
                            <option value="">Select Zone</option>
                            @foreach (getSafariZones() as $zone)
                                <option value="{{ $zone }}" {{ $filter_zone == $zone ? 'selected' : '' }}>
                                    {{ $zone }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <label for="filter_availability" class="form-label">Filter by Availability</label>
                        <select class="form-select" id="filter_availability" aria-label="Select availability"
                            name="filter_availability">
                            <option value="">Select Availability</option>
                            <option value="1" {{ $filter_availability == '1' ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ $filter_availability == '0' ? 'selected' : '' }}>Not Available
                            </option>
                        </select>
                    </div>
                    <div class="d-flex align-items-end gap-3 col-lg-6 my-2">
                        <button type="submit" class="btn btn-primary">
                            Filter
                        </button>
                        <a href="{{ route('getJungleTrail') }}" class="btn btn-primary">
                            Clear Filter
                        </a>
                        <a href="{{ route('deleteAllDates') }}" class="btn btn-danger delete-button">
                            Delete All Dates
                        </a>
                    </div>

                </div>
            </form>
            <div class="tabsection jungle">
                <div class="table-responsive">
                    <table class="table tablesection border-light table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Mode</th>
                                <th scope="col">Time</th>
                                <th scope="col">Zone</th>
                                <th scope="col">Availability</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dates as $date)
                                <tr>
                                    <td>{{ $date['date'] }}</td>
                                    <td>{{ $date['mode'] ?? '' }}</td>
                                    <td>{{ $date['time'] }}</td>
                                    <td>{{ $date['zone'] }}</td>
                                    <td>
                                        <label class="switch availability-switch"
                                            onchange="checkAvailability({{ $date['id'] }});">
                                            <input type="checkbox" {{ $date['status'] == 1 ? 'checked' : '' }}
                                                data-val="{{ $date['id'] }}">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="btn-group d-flex gap-2 align-items-center justify-content-center"
                                            role="group">
                                            <a href="{{ route('date.jungle.trail.edit', $date['id']) }}"
                                                class="editbutton">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form action="{{ route('date.jungle.trail.delete', $date['id']) }}"
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
                {{-- <div class="pagination-container">
                    <p><b>Total records: {{ $dates->total() }}, Displaying records {{ $dates->firstItem() }} to
                            {{ $dates->lastItem() }} of {{ $dates->total() }}</b></p>
                    {{ $dates->links('pagination::bootstrap-4') }}
                </div> --}}


                <div class="pagination-container">
                    <p><b>Total records: {{ $dates->total() }}, Displaying records {{ $dates->firstItem() }} to
                            {{ $dates->lastItem() }} of {{ $dates->total() }}</b></p>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item {{ $dates->previousPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $dates->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            @php
                                // Get the current page number
                                $currentPage = $dates->currentPage();

                                // Calculate the start and end page numbers for the pagination
                                $startPage = max($currentPage - 1, 1);
                                $endPage = min($currentPage + 2, $dates->lastPage());
                            @endphp
                            @for ($i = $startPage; $i <= $endPage; $i++)
                                <li class="page-item {{ $i === $currentPage ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $dates->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $dates->nextPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $dates->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>
    <script>
        function checkAvailability(id) {
            var checkbox = $('input[data-val="' + id + '"]');
            var newAvailability = checkbox.prop('checked') ? 1 : 0;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('date.jungle.trail.updateAvailability') }}',
                data: JSON.stringify({
                    'id': id,
                    'newAvailability': newAvailability
                }),
                contentType: 'application/json',
                dataType: 'json',
                success: function(response) {
                    setTimeout(() => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.msg,
                        });
                        location.reload();
                    }, 1);
                },
                error: function(error) {
                    // Handle the error response
                    console.error(error);

                    // Show an error popup
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to update availability. Please try again later.',
                    });
                }
            });
        }

        function ImportCsv() {
            var fileInput = document.getElementById('file_input');
            var file = fileInput.files[0];

            var formData = new FormData();
            formData.append('file', file);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('date.jungle.trail.importcsv') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    setTimeout(() => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.msg,
                        });
                        location.reload();
                    }, 1);
                    window.location.reload();
                },
                error: function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to update availability. Please try again later.',
                    });
                }
            });
        }

        function exportCsv() {
            var filter_date = $('#filter_date').val();
            var filter_time = $('#filter_time').val();
            var filter_mode = $('#filter_mode').val();
            var filter_zone = $('#filter_zone').val();
            var filter_availability = $('#filter_availability').val();

            var params = {
                'filter_date': filter_date,
                'filter_time': filter_time,
                'filter_mode': filter_mode,
                'filter_zone': filter_zone,
                'filter_availability': filter_availability
            };

            var queryString = $.param(params);

            var url = '{{ route('export-csv') }}?' + queryString;

            window.location.href = url;
        }
    </script>
@endsection
