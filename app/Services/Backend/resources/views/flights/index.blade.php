@extends('backend::layouts.master')

@section('content')
    <div class="card">
        {{-- @include('backend::partials.index-header', ['route_str' => 'flights']) --}}

        <div class="d-flex justify-content-between">
            <div>
                <a href="{{ route('admin.flights.create') }}" class="btn btn-primary ml-2 mt-3">Add <i class="fa fa-plus"
                        aria-hidden="true"></i>
                </a>
            </div>
            {{-- <div class="mt-3">
                <form action="{{ route('flights.search') }}" method="get">
                    <label for="searchUser">Search:</label>
                    <input type="text" class="mr-3 py-2 px-1" placeholder="search" name="q" id="searchUser">
                    <span id="userList"></span>
                </form>
            </div> --}}
        </div>
        <div class="my-2">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
        </div>
        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <table id="dt-server-processing" class="table table-striped table-bordered nowrap deleteArena">
                    <thead>
                        <tr class="header-cols">
                            <th data-col-name="id">Id</th>
                            <th data-col-name="position">From</th>
                            <th data-col-name="created_at">To</th>
                            <th data-col-name="created_at">Slug</th>
                            <th data-col-name="action">Category</th>
                            <th data-col-name="action">Publish Status</th>
                            <th data-col-name="action">Sort Order</th>
                            <th data-col-name="action">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($flights as $i => $f)
                            <tr>
                                <td>{{ $f->id }}</td>
                                <td>{{ $f->from }}</td>
                                <td>{{ $f->to }}</td>
                                <td>{{ $f->slug }}</td>
                                <td>{{ $f->category }}</td>
                                <td>{{ $f->publish ? 'Published' : 'Not Published' }}</td>
                                <td>{{ $f->sort_order ? $f->sort_order : 'Null' }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('admin.flights.edit', $f->id) }}" class="btn btn-primary">
                                            Edit
                                        </a>
                                        <a href="{{ route('admin.flights.view', $f->id) }}" class="btn btn-primary">
                                            View
                                        </a>
                                        <a href="{{ route('admin.flights.destroy', $f->id) }}"
                                            onclick="return confirm('Are you sure you want to delete this flight?');"
                                            class="btn btn-danger">
                                            Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $flights->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $('#searchUser').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('flights.search') }}",
                type: "GET",
                data: {
                    'q': query // Change 'query' to 'q'
                },
                success: function(data) {
                    $('#userList').html(data);
                }
            });
        });
        $('body').on('click', 'li', function() {
            var value = $(this).text();
            // do whatever you want with the clicked item
        });
    </script>
@endsection
