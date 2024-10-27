@extends('admin.layout.header')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card border border-success">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="text-uppercase font-weight-bold">Data Table Category</h3>
                                <div class="d-flex align-items-center">
                                    <div class="dropdown ml-3">
                                        <button class="btn btn-flat btn-success dropdown-toggle rounded-left" type="button"
                                            data-toggle="dropdown">
                                            Category
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item"
                                                onclick="document.getElementById('id01').style.display='block'">
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
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($categories as $category)
                                                <tr>
                                                    <th scope="row">{{ $category->category_id }}</th>
                                                    <td>{{ $category->category_title }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($category->created_at)->format('d/m/Y') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($category->updated_at)->format('d/m/Y') }}
                                                    </td>
                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3">

                                                                <a href="#" class="text-primary"
                                                                    onclick="openModal('{{ $category->category_id }}', '{{ $category->category_title }}')">
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
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="max-width:600px">
            <div class="w3-center"><br>
                <span onclick="closeModal('id01')"
                    class="w3-button w3-xlarge w3-hover-red w3-display-topright mr-2 mt-2 rounded"
                    title="Close Modal">&times;</span>
            </div>
            <form class="w3-container" action="{{ url('admin/category-add') }}" method="POST">
                @csrf
                <h5 class="font-weight-bold">Add New Category</h5>
                <div class="w3-section">
                    <label><b>Title :</b></label>
                    <input class="w3-input w3-border w3-margin-bottom w3-round" type="text" placeholder="Enter Title"
                        name="category_title" required>
                    <button onclick="closeModal('id01')" type="button" class="btn btn-outline-danger mb-3">Cancel</button>
                    <button type="submit" class="btn btn-outline-success mb-3 float-right">Add
                        New</button>
                </div>
            </form>
        </div>
    </div>

    <div id="id02" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="max-width:600px">
            <div class="w3-center"><br>
                <span onclick="closeModal('id02')"
                    class="w3-button w3-xlarge w3-hover-red w3-display-topright mr-2 mt-2 rounded"
                    title="Close Modal">&times;</span>
            </div>
            <form id="updateCategoryForm" class="w3-container" action="" method="POST">
                @csrf
                <h5 class="font-weight-bold">Update Category</h5>
                <div class="w3-section">
                    <label><b>Title :</b></label>
                    <input id="titleInput" class="w3-input w3-border w3-margin-bottom w3-round" type="text"
                        placeholder="Enter Title" name="category_title" required>
                    <input type="hidden" id="categoryId" name="category_id">
                    <button onclick="closeModal('id02')" type="button" class="btn btn-outline-danger mb-3">Cancel</button>
                    <button type="submit" class="btn btn-outline-success mb-3 float-right">Update</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        var globalUrl = '{{ route('admin.category.delete') }}';

        function openModal(categoryId, title) {
            document.getElementById('id02').style.display = 'block';
            document.getElementById('categoryId').value = categoryId;
            document.getElementById('titleInput').value = title;
            document.getElementById('updateCategoryForm').action = "{{ route('admin.category.update', ['id' => ':id']) }}"
                .replace(':id', categoryId);
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
    </script>
@endsection
