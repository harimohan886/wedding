@extends('admin.layouts.frontend')
@section('title', 'Safari Block Date')
@section('meta_description', 'Jim Corbett Wedding Safari Block Date')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Chambal Safari Block Date</h1>
            <div class="row" style="float: right; display:flex; align-items:flex-end">
                <div class="col-sm-6 col-lg-6">
                    <label for="file_input" class="form-label">Import CSV file</label>
                    <input onchange="ImportCsv();" class="form-control" type="file" id="file_input">
                </div>
                <div class="col-sm-6 col-lg-6">
                    <a href="{{ route('chambal.blockdate.create') }}" class=" btn btn-success">Create Block Date</a>
                    <button class=" btn btn-success" onclick="exportCsv();">Export Data</button>
                </div>
            </div>
        </div>
        <div class="top_fields">
            <form method="get" action="{{ route('chambal-blockdate') }}">
                <div class="row d-flex align-items-end">
                    <div class="col-sm-2 col-md-2">
                        <label for="filter_block_date" class="form-label">Filter by Block date</label>
                        <input type="date" class="form-control" id="filter_block_date" name="filter_block_date"
                            value="{{ $filter_block_date ?? '' }}">
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
                    <div class="col-lg-6 mt-3">
                        <div class="d-flex align-items-end gap-3">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('chambal-blockdate') }}" class="btn btn-primary">Clear Filter</a>
                            <a href="{{ route('chambal.blockdate.deleteAllDates') }}" class="btn btn-danger delete-button">
                                Delete All Dates
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="tabsection jungle ">
                <div class="table-responsive">
                    <table class="table tablesection border-light table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Updated Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chambalBlockDates as $date)
                                <tr>
                                    <td>{{ $date['id'] }}</td>
                                    <td>{{ $date['block_date'] }}</td>
                                    <td>
                                        <label class="switch availability-switch"
                                            onchange="checkAvailability({{ $date->id }});">
                                            <input type="checkbox" {{ $date->status == 1 ? 'checked' : '' }}
                                                data-val="{{ $date->id }}">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>{{ $date->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $date->updated_at->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="btn-group d-flex gap-2 align-items-center justify-content-center"
                                            role="group">
                                            <a href="{{ route('chambal.blockdate.edit', $date['id']) }}"
                                                class="editbutton">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="{{ route('chambal.blockdate.delete', $date['id']) }}"
                                                class="deletebutton bg-danger py-2 px-3 text-dark rounded">
                                                <i class="bi bi-trash"></i>
                                            </a>
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
                            Total records: {{ $chambalBlockDates->total() }},
                            Displaying records {{ $chambalBlockDates->firstItem() }}
                            to {{ $chambalBlockDates->lastItem() }}
                            of {{ $chambalBlockDates->total() }}
                        </b>
                    </p>
                    {{ $chambalBlockDates->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </main>
    @push('scripts')
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
                    url: '{{ route('chambal.blockdate.updateAvailability') }}',
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
                        console.error(error);
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
                    url: '{{ route('chambal.blockdate.import') }}',
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
                var filter_block_date = $('#filter_block_date').val();
                var filter_availability = $('#filter_availability').val();

                var params = {
                    'filter_block_date': filter_block_date,
                    'filter_availability': filter_availability
                };

                var queryString = $.param(params);

                var url = '{{ route('chambal.blockdate.export') }}?' + queryString;

                window.location.href = url;
            }
        </script>
    @endpush
@endsection
