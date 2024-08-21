@extends('admin.layouts.frontend')
@section('title', 'Wedding Programs Gallery')
@section('meta_description', 'Jim Corbett Wedding Programs Gallery')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header m-0 py-0">
                <div class="d-flex justify-content-between p-2 ">
                    <h3>Wedding Programs Gallery List</h3>
                    <a href="{{ route('create-wedding-program') }}" class=" btn btn-success float-end">Add Wedding Programs
                        Gallery</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($weddingPrograms as $key => $weddingProgram)
                                <tr>
                                    <td class="text-center">{{ $weddingPrograms->firstItem() + $key }}.</td>
                                    <td class="text-center">{{ $weddingProgram->name }}</td>
                                    <td class="text-center">
                                        <label class="switch availability-switch">
                                            <input type="checkbox" id="wedding-program-{{ $weddingProgram->id }}"
                                                {{ $weddingProgram->status == 1 ? 'checked' : '' }}
                                                onchange="checkStatus({{ $weddingProgram->id }}, '{{ route('update-status-wedding-program') }}', 'data-weddingProgram-val');"
                                                data-weddingProgram-val="{{ $weddingProgram->id }}">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ route('edit-wedding-program', ['id' => $weddingProgram->id]) }}"
                                                class="btn btn-warning">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a href="#"
                                                onclick="confirmDelete({{ $weddingProgram->id }}, '{{ route('delete-wedding-program', ':id') }}');"
                                                class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                            <a href="{{ route('wedding-program-items-list', ['wedding_program_id' => $weddingProgram->id]) }}"
                                                class="btn btn-success">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Records Not Available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagination-container">
                        <p>
                            <b>
                                Total records: {{ $weddingPrograms->total() }},
                                Displaying records {{ $weddingPrograms->firstItem() }}
                                to {{ $weddingPrograms->lastItem() }}
                                of {{ $weddingPrograms->total() }}
                            </b>
                        </p>
                        {{ $weddingPrograms->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
    @push('scripts')
        <script>
            function checkStatus(id, url, dataAttr) {
                var checkbox = $('input[' + dataAttr + '="' + id + '"]');
                var status = checkbox.prop('checked') ? 1 : 0;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: JSON.stringify({
                        'id': id,
                        'status': status
                    }),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            setTimeout(() => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: response.msg,
                                });
                                location.reload();
                            }, 1);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.msg,
                            });
                        }
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

            function confirmDelete(id, url) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url.replace(':id', id);
                    }
                });
            }
        </script>
    @endpush
@endsection
