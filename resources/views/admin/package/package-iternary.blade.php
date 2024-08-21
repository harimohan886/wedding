@extends('admin.layouts.frontend')
@section('title', 'Package Iternary')
@section('meta_description', 'Jim Corbett Wedding Package Iternary List')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Package Iternary</h1>
            <div class="row" style="float: right;">
                <div class="col-sm-12">
                    <a href="#" class="btn btn-success mt-4" onclick="addIternaryRow()">Add Iternary</a>
                </div>
            </div>
        </div>

        <form action="{{ route('add-iternary-add-item', ['package_id' => $package_id]) }}" method="POST" class="mt-4">
            @csrf

            <div class="tabsection jungle">
                <div class="">
                    <table class="table border-light tablesection" id="itineraryTable">
                        <thead>
                            <tr>
                                <th scope="col">Iternary Title</th>
                                <th scope="col">Iternary Content</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($iternaries as $iternary)
                                <tr>
                                    <td style="width:30%;">
                                        <textarea name="iternaries[{{ $loop->index }}][title]" style="width:100%;">{{ $iternary->title ?? '' }}</textarea>
                                    </td>
                                    <td style="width:60%;">
                                        <textarea name="iternaries[{{ $loop->index }}][content]" style="width:100%;">{{ $iternary->content ?? '' }}</textarea>
                                    </td>
                                    <td style="width:10%;">
                                        <button type="button" class="btn btn-danger"
                                            onclick="removeIternaryRow(this)">Remove</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class=" d-flex justify-content-between mb-5">

                    <button style="width:14rem; " type="submit" class="btn btn-success btn-block">Save</button>

                    <a href="{{ route('package-list') }}" class="btn btn-outline-dark btn-block">Back</a>

                </div>

                <div class="pagination-container">
                    <p><b>Total records: {{ $iternaries->total() }}, Displaying records {{ $iternaries->firstItem() }} to
                            {{ $iternaries->lastItem() }} of {{ $iternaries->total() }}</b></p>
                    {{ $iternaries->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </form>


    </main>

    <script>
        function addIternaryRow() {
            var table = document.getElementById('itineraryTable');
            var newRow = table.insertRow(table.rows.length);

            var titleCell = newRow.insertCell(0);
            var contentCell = newRow.insertCell(1);
            var actionCell = newRow.insertCell(2);

            titleCell.innerHTML = '<textarea name="iternaries[' + (table.rows.length - 1) +
                '][title]" style="width:100%;"></textarea>';
            contentCell.innerHTML = '<textarea name="iternaries[' + (table.rows.length - 1) +
                '][content]" style="width:100%;"></textarea>';
            actionCell.innerHTML =
                '<button type="button" class="btn btn-danger" onclick="removeIternaryRow(this)">Remove</button>';
        }

        function removeIternaryRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>

@endsection
