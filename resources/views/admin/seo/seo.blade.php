@extends('admin.layouts.frontend')
@section('title', 'SEO Manager')
@section('meta_description', 'Jim Corbett Wedding Booking SEO Manager')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">SEO Manager</h1>
            <div class="row" style="float: right;">
                <div class="col-sm-12">
                    <a href="{{ route('add-seo-manager-view') }}" class=" btn btn-success mt-4">Add SEO</a>
                </div>
            </div>
        </div>
        <div class="top_fields">

            <div class="tabsection jungle">
                <div class="table-responsive">
                    <table class="table tablesection border-light">
                        <thead>
                            <tr>
                                <th scope="col">URL</th>
                                <th scope="col">Meta Title</th>
                                <th scope="col">Meta Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer['type'] }}</td>
                                    <td style="width:20%;">{{ $customer['meta_title'] }}</td>
                                    <td style="width:55%;">{{ $customer['meta_description'] }}</td>
                                    <td>
                                        <div class="btn-group d-flex gap-2 align-items-center justify-content-center"
                                            role="group">
                                            <a href="{{ route('edit-seo-manager-view', $customer['id']) }}"
                                                class="editbutton">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('seo.manager.delete', $customer['id']) }}"
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
                    <p><b>Total records: {{ $customers->total() }}, Displaying records {{ $customers->firstItem() }} to
                            {{ $customers->lastItem() }} of {{ $customers->total() }}</b></p>
                    {{ $customers->links('pagination::bootstrap-4') }}
                </div>
            </div>




    </main>

@endsection
