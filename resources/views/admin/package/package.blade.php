@extends('admin.layouts.frontend')
@section('title', 'Packages')
@section('meta_description', 'Jim Corbett Wedding Packages List')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Packages</h1>
            <div class="row" style="float: right;">
                <div class="col-sm-12">
                    <a href="{{ route('package.list.item.add.index') }}" class=" btn btn-success mt-4">Add Package</a>
                </div>
            </div>
        </div>

        <div class="top_fields">

            <form method="get" action="{{ route('package-list') }}">
                <div class="row">
                    <div class="col-lg-3 col-md-3 mb-2">
                        <label for="package_name" class="form-label">Package Name</label>
                        <input type="text" class="form-control" id="package_name" name="package_name"
                            value="{{ $package_name ?? '' }}" placeholder="Package name....">
                    </div>
                    <div class="col-lg-3 col-md-3 mb-2">
                        <label for="package_rating" class="form-label">Package Rating</label>
                        <select class="form-select" id="package_rating" name="package_rating">
                            <option value="" {{ $package_rating === '' ? 'selected' : '' }}>Select Rating</option>
                            <option value="3" {{ $package_rating === '3' ? 'selected' : '' }}>3 Star</option>
                            <option value="4" {{ $package_rating === '4' ? 'selected' : '' }}>4 Star</option>
                            <option value="5" {{ $package_rating === '5' ? 'selected' : '' }}>5 Star</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-3 mb-2">
                        <label for="availability" class="form-label">Availability</label>
                        <select class="form-select" id="availability" name="availability">
                            <option value="" {{ $availability === '' ? 'selected' : '' }}>Select Availability</option>
                            <option value="1" {{ $availability === '1' ? 'selected' : '' }}>Availability</option>
                            <option value="0" {{ $availability === '0' ? 'selected' : '' }}>Not Availability</option>
                        </select>
                    </div>


                    <div class="d-flex align-items-end gap-3 col-lg-3 col-md-3 mb-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('package-list') }}" class="btn btn-primary">Clear Filter</a>
                    </div>

                </div>
            </form>

            <div class="tabsection jungle">
                <div class="">
                    <table class="table border-light tablesection">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Availability</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $package)
                                <tr>
                                    <td>{{ $package->id }}</td>
                                    <td>{{ $package->name }}</td>
                                    <td>{{ $package->price }}</td>
                                    <td>{{ $package->rating }}</td>
                                    <td>
                                        <label class="switch availability-switch"
                                            onchange="checkAvailability({{ $package->id }});">
                                            <input type="checkbox" {{ $package->status == 1 ? 'checked' : '' }}
                                                data-val="{{ $package->id }}">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('package-list.item.edit', $package->id) }}"><i
                                                            class="bi bi-pencil-fill"></i> Edit</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('package-list.item.features', $package->id) }}"><i
                                                            class="bi bi-building"></i> Package Features</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('package-list.item.inclusion', $package->id) }}"><i
                                                            class="bi bi-house"></i> Inclusion</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('package-list.item.exclusion', $package->id) }}"><i
                                                            class="bi bi-house"></i> Exclusion</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('package-list.item.iternary', $package->id) }}"><i
                                                            class="bi bi-house"></i> Iternary</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('package-list.item.category', $package->id) }}"><i
                                                            class="bi bi-house"></i> Category</a></li>
                                                <li>
                                                    <form action="{{ route('package-list.item.delete', $package->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="dropdown-item" role="button"><i
                                                                class="bi bi-trash"></i> Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination-container">
                    <p><b>Total records: {{ $packages->total() }}, Displaying records {{ $packages->firstItem() }} to
                            {{ $packages->lastItem() }} of {{ $packages->total() }}</b></p>
                    {{ $packages->links('pagination::bootstrap-4') }}
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
                url: '{{ route('package-list.item.updateAvailability') }}',
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
    </script>
@endsection
