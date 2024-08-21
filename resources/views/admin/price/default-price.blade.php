@extends('admin.layouts.frontend')
@section('title', 'Default Price')
@section('meta_description', 'Pench Default Price Page')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            @if($type=='default')
                <h1 class="h2">Default Price</h1>
            @elseif($type=='weekend')
                <h1 class="h2">Weekend Price</h1>
            @else
                <h1 class="h2">Festival Price</h1>
            @endif
        </div>


        <div class="table-responsive">
            <table class="table tablesection border-light ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Safari Zone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($zones as $zone)
                    <tr>
                        <td>{{ $zone['id'] }}</td>
                        <td>{{ $zone['mode'] }}</td>
                        <td><div class="btn-group" role="group">
                            @if($zone['type']=='date-range')
                                <a href="{{ route('default-price-edit', ['id' => $zone['id'], 'mode' => $zone['mode'], 'type' => $zone['type']]) }}" class="btn btn-warning"><i class="bi bi-eye"></i></a>
                            @else
                                <a href="{{ route('default-price-edit', ['id' => $zone['id'], 'mode' => $zone['mode'], 'type' => $zone['type']]) }}" class="btn btn-warning"><i class="bi bi-pen"></i></a>
                            @endif
                        </div></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</main>

@endsection
