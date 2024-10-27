@extends('teacher.layout.header')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card border border-success">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="text-uppercase font-weight-bold">Data Table Courses</h3>
                                <div class="d-flex align-items-center">
                                    <div class="dropdown ml-3">
                                        <button class="btn btn-flat btn-success dropdown-toggle rounded-left" type="button"
                                            data-toggle="dropdown">
                                            Courses
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{ url('teacher/course-add') }}" class="dropdown-item">
                                                <i class="fa fa-plus-square"></i> Add
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="data-tables mt-3">
                                <div class="table-responsive">
                                    <table id="example" class="display table table-hover progress-table text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th width="0%">ID</th>
                                                <th width="10%">Category</th>
                                                <th width="10%">Title</th>
                                                <th width="0%">Price</th>
                                                <th width="0%">Discount</th>
                                                <th width="5%">Total Discount</th>
                                                <th width="0%">Visibility</th>
                                                <th width="10%">Description / Requirements</th>
                                                <th width="0%">Created_at</th>
                                                <th width="0%">Updated_at</th>
                                                <th width="0%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courses as $course)
                                                <tr>
                                                    <th scope="row">{{ $course->course_id }}</th>
                                                    <td>{{ $course->category_title }}</td>
                                                    <td>{{ $course->course_title }}</td>
                                                    <td>{{ number_format($course->course_price, 2) }}$</td>
                                                    <td>{{ $course->course_discount }}%</td>
                                                    @php
                                                        $totalDiscountPrice = $course->getDiscountedPrice();
                                                    @endphp
                                                    <td>{{ number_format($totalDiscountPrice, 2) }}$</td>
                                                    <td>
                                                        @if ($course->course_visibility == 'true')
                                                            <img class="img-fluid px-2" style="width: 50px;"
                                                                src="/assets/Icons/public.png" alt="Public Icon">
                                                            <span>Public</span>
                                                        @else
                                                            <img class="img-fluid px-2" style="width: 50px;"
                                                                src="/assets/Icons/private.png" alt="Private Icon">
                                                            <span>Private</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="{{ url('teacher/course/detail', ['id' => $course->course_id]) }}">
                                                            <img class="img-fluid px-2" style="width: 50px;"
                                                                src="/assets/Icons/view_details.png"
                                                                alt="View Details Icon">
                                                            <span>View Details...</span>
                                                        </a>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y') }}
                                                    </td>

                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3">
                                                                <a href="{{ url('teacher/course/detail', ['id' => $course->course_id]) }}"
                                                                    class="text-info">
                                                                    <div class="icon-container">
                                                                        <span class="ti-eye"></span>
                                                                        <span class="icon-name text-info">Details</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="mr-3">
                                                                <a href="{{ url('teacher/course/update', ['id' => $course->course_id]) }}"
                                                                    class="text-primary">
                                                                    <div class="icon-container">
                                                                        <span class="ti-pencil-alt"></span>
                                                                        <span class="icon-name text-primary">Edit</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
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
    </div>
    <script>
        var globalUrl = '{{ route('teacher.courses.delete') }}';
    </script>
@endsection
