@extends('admin.layout.header')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card border border-success">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="text-uppercase font-weight-bold">Data Table Users</h3>
                        </div>
                        <div class="data-tables mt-3">
                            <div class="table-responsive">
                                <table id="example" class="display table table-hover progress-table text-center">
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th>ID</th>
                                            <th>Photo</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Created_at</th>
                                            <th>Updated_at</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $user->user_id }}</th>
                                                <td>
                                                    @if ($user->user_photo)
                                                        <img src="{{ asset('upload/' . basename($user->user_photo)) }}"
                                                            class="img-fluid rounded-circle user-photo" alt="User Photo"
                                                            width="65px">
                                                    @else
                                                        No photo available
                                                    @endif
                                                </td>
                                                <td>{{ $user->full_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <div class="icon-container">
                                                        @switch($user->role)
                                                            @case('learner')
                                                                <span class="ti-book"></span>
                                                            @break

                                                            @case('teacher')
                                                                <span class="ti-user"></span>
                                                            @break

                                                            @default
                                                                <span class="ti-lock"></span>
                                                        @endswitch
                                                        <span class="icon-name">{{ $user->role }}</span>
                                                    </div>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var globalUrl = '{{ route('admin.user.delete') }}';
    </script>
@endsection
