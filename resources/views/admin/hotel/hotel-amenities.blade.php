@extends('admin.layouts.frontend')
@section('title', 'Hotel Amenities')
@section('meta_description', 'Jim Corbett Wedding Hotel Amenities List')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Hotel Amenities</h1>
            <div class="row" style="float: right;">
                <div class="col-sm-12">
                    <a href="{{ route('amenities.add.view.index') }}" class=" btn btn-success">Add Amenities</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="d-flex flex-wrap gap-3">
                @foreach ($UpdateAmenities as $update)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="amenityCheckbox{{ $update['id'] }}"
                            value="{{ $update['amenity'] }}"
                            onchange="updateAmenityStatus('{{ $update['id'] }}', this.checked)"
                            {{ in_array($update['id'], $getAmenityId) ? 'checked' : '' }}>
                        <label class="form-check-label" for="amenityCheckbox{{ $update['id'] }}"
                            style="margin-right:10px;">{{ strtoupper($update['amenity']) }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="tabsection jungle">
            <div class="table-responsive">
                <table class="table tablesection border-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Amenity</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Availability</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($amenities as $amenity)
                            <tr>
                                <td>{{ $amenity->amenity->id }}</td>
                                <td>{{ $amenity->amenity->amenity }}</td>
                                <td><img src="{{ '/admin/uploads/amenity/' . $amenity->amenity->image }}" width="50px"
                                        height="50px" /></td>
                                <td>
                                    <label class="switch availability-switch"
                                        onchange="checkAvailability({{ $amenity->amenity->id }});">
                                        <input type="checkbox" {{ $amenity->status == 1 ? 'checked' : '' }}
                                            data-val="{{ $amenity->amenity->id }}" id="Available">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-container">
                <p><b>Total records: {{ $amenities->total() }}, Displaying records {{ $amenities->firstItem() }} to
                        {{ $amenities->lastItem() }} of {{ $amenities->total() }}</b></p>
                {{ $amenities->links('pagination::bootstrap-4') }}
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
                url: '{{ route('hotel-list.item.amenities.updateAvailability') }}',
                data: JSON.stringify({
                    'id': id,
                    'newAvailability': newAvailability,
                    'hotel_id': '{{ $hotel_id }}'
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

        function updateAmenityStatus(amenity_id, status) {

            var available = status == true ? '1' : '0';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('separate-hotel.item.amenities.availability') }}',
                data: JSON.stringify({
                    'amenity_id': amenity_id,
                    'available': available,
                    'hotel_id': '{{ $hotel_id }}'
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
