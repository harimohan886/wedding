@extends('admin.layouts.frontend')
@section('title', 'Package Inclusion')
@section('meta_description', 'Jim Corbett Wedding Package Inclusion List')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Package Inclusion</h1>
            <div class="row" style="float: right;">
                <div class="col-sm-12">
                    <a href="{{ route('inclusion.add.view.index') }}" class=" btn btn-success">Add Inclusion</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="d-flex flex-wrap">
                @foreach ($UpdateInclusion as $update)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="amenityCheckbox{{ $update['id'] }}"
                            value="{{ $update['description'] }}"
                            onchange="updateAmenityStatus('{{ $update['id'] }}', this.checked)"
                            {{ in_array($update['id'], $getinclusionsId) ? 'checked' : '' }}>
                        <label class="form-check-label" for="amenityCheckbox{{ $update['id'] }}"
                            style="margin-right:10px;">{{ strtoupper($update['description']) }}</label>
                    </div>
                @endforeach
            </div>
        </div>



        <div class="tabsection jungle">
            <div class="table-responsive">
                <table class="table border-light tablesection">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Availability</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($inclusions??[] as $key => $inclusion)
                            @if ($inclusion->inclusion !== null)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $inclusion->inclusion->description ?? '' }}</td>
                                    <td>
                                        <label class="switch availability-switch"
                                            onchange="checkAvailability({{ $inclusion->inclusion->id ?? '' }});">
                                            <input type="checkbox" {{ $inclusion->status == 1 ? 'checked' : '' }}
                                                data-val="{{ $inclusion->inclusion->id ?? '' }}" id="Available">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="3">Records not found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="pagination-container">
                <p><b>Total records: {{ $inclusions->total() }}, Displaying records {{ $inclusions->firstItem() }} to
                        {{ $inclusions->lastItem() }} of {{ $inclusions->total() }}</b></p>
                {{ $inclusions->links('pagination::bootstrap-4') }}
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
                url: '{{ route('package-list.item.inclusion.updateAvailability') }}',
                data: JSON.stringify({
                    'id': id,
                    'newAvailability': newAvailability,
                    'package_id': '{{ $package_id }}'
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

        function updateAmenityStatus(inclusion_id, status) {

            var available = status == true ? '1' : '0';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('separate-package.item.inclusion.availability') }}',
                data: JSON.stringify({
                    'inclusion_id': inclusion_id,
                    'available': available,
                    'package_id': '{{ $package_id }}'
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
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to update availability. Please try again later.',
                    });
                }
            });
        }
    </script>

@endsection
