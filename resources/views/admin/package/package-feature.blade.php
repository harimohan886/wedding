@extends('admin.layouts.frontend')
@section('title', 'Package Features')
@section('meta_description', 'Jim Corbett Wedding Package Features List')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Package Features</h1>
            <div class="row" style="float: right;">
                <div class="col-sm-12">
                    <a href="{{ route('feature.add.view.index') }}" class=" btn btn-success">Add Feature</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="d-flex flex-wrap gap-3">
                @foreach ($UpdateFeature as $update)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="amenityCheckbox{{ $update['id'] }}"
                            value="{{ $update['description'] }}"
                            onchange="updateAmenityStatus('{{ $update['id'] }}', this.checked)"
                            {{ in_array($update['id'], $getFeaturesId) ? 'checked' : '' }}>
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
                        @foreach ($features as $feature)
                            <tr>
                                <td>{{ $feature->feature->id ?? '' }}</td>
                                <td>{{ $feature->feature->description ?? '' }}</td>
                                <td>
                                    <label class="switch availability-switch"
                                        onchange="checkAvailability({{ $feature->feature->id ?? '' }});">
                                        <input type="checkbox" {{ $feature->status == 1 ? 'checked' : '' }}
                                            data-val="{{ $feature->feature->id ?? '' }}" id="Available">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-container">
                <p><b>Total records: {{ $features->total() }}, Displaying records {{ $features->firstItem() }} to
                        {{ $features->lastItem() }} of {{ $features->total() }}</b></p>
                {{ $features->links('pagination::bootstrap-4') }}
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
                url: '{{ route('package-list.item.feature.updateAvailability') }}',
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

        function updateAmenityStatus(feature_id, status) {

            var available = status == true ? '1' : '0';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('separate-package.item.feature.availability') }}',
                data: JSON.stringify({
                    'feature_id': feature_id,
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
