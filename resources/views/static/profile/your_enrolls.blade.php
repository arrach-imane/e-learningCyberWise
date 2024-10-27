@extends('static.components.header')
@section('content')
    <div class="container mt-2">
        <a href="{{ route('profile.show', ['id' => auth()->id()]) }}"><button class="btn btn-outline-danger my-2 my-sm-0" type="button">Back</button></a>
        <div class="card mt-2">
            <div class="card-body">
                <!-- Search Box -->
                <form action="" method="GET" class="form-inline mb-3">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search by course title" aria-label="Search"
                        name="search" value="{{ Request::get('search') }}">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
                <hr>
                <h4 class="card-title">Today's Enrolls List : <b class="text-success">{{ count($enrollments) }}</b></h4>
                <hr>
                @if (count($enrollments) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enrollments as $index => $enroll)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img class="img-fluid rounded-start"
                                            src="{{ asset('photos/courses/' . $enroll->course_thumbnail) }}" alt="Thumbnail"
                                            style="width: 200px; object-fit: cover;">
                                    </td>
                                    <td>{{ $enroll->course_title }}</td>
                                    <td>
                                        <form action="{{ url('/lessons/' . $enroll->course_id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-info btn-block">Enroll
                                                Now</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
                @else
                <div class="alert alert-info mt-3" role="alert">
                    No enrollments
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
