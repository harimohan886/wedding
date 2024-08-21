@extends('admin.layouts.frontend')
@section('title', 'Package Cateogry')
@section('meta_description', 'Jim Corbett Wedding Package Cateogry List')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Package Cateogry</h1>
            <div class="row" style="float: right;">
                <div class="col-sm-12">
                    <a href="{{ route('package.category.add.view', $package_id) }}" class=" btn btn-success mt-4">Add
                        Package Cateogry</a>
                </div>
            </div>
        </div>

        <div class="top_fields">

            <div class="tabsection jungle">
                <div class="table-responsive">
                    <table class="table border-light tablesection">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Cateogry</th>
                                <th scope="col">Availability</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($PackageCategory as $package)
                                <tr>
                                    <td>{{ $package->id }}</td>
                                    <td>{{ $package->category }}</td>
                                    <td>
                                        <label class="switch availability-switch"
                                            onchange="checkAvailability({{ $package->id }});">
                                            <input type="checkbox" {{ $package->status == 1 ? 'checked' : '' }}
                                                data-val="{{ $package->id }}">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>

                                        <div class="btn-group d-flex gap-2 align-items-center justify-content-center"
                                            role="group">
                                            <a href="{{ route('package.category.edit', $package->id) }}" class="editbutton">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form action="{{ route('package.category.delete', $package->id) }}"
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
                    <p><b>Total records: {{ $PackageCategory->total() }}, Displaying records
                            {{ $PackageCategory->firstItem() }} to {{ $PackageCategory->lastItem() }} of
                            {{ $PackageCategory->total() }}</b></p>
                    {{ $PackageCategory->links('pagination::bootstrap-4') }}
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
                url: '{{ route('package-category-list.item.updateAvailability') }}',
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
