@extends('admin.layout.header')
@section('content')
<div class="admin-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <i class="ti-layout-grid2"></i>
            <h2>E-Learning</h2>
        </div>
        <nav>
            <div class="nav-section">
                <span class="nav-label">Main</span>
                <a href="{{ url('admin/dashboard') }}">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ url('admin/users') }}">
                    <i class="ti-user"></i>
                    <span>Users</span>
                </a>
            </div>

            <div class="nav-section">
                <span class="nav-label">Content</span>
                <a href="{{ url('admin/courses') }}" class="active">
                    <i class="ti-book"></i>
                    <span>Courses</span>
                </a>
                <a href="{{ url('admin/lessons') }}">
                    <i class="ti-video-camera"></i>
                    <span>Lessons</span>
                </a>
                <!-- <a href="{{ url('admin/category') }}">
                    <i class="ti-layers"></i>
                    <span>Categories</span>
                </a> -->
            </div>

            <div class="nav-section">
                <span class="nav-label">Account</span>
                <a href="{{ url('logout') }}" class="logout">
                    <i class="ti-power-off"></i>
                    <span>Logout</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <div class="header-left">
                <h1>Courses</h1>
            </div>
            <div class="header-right">
                <a href="{{ url('admin/course-add') }}" class="add-btn">
                    <i class="ti-plus"></i>
                    Add New Course
                </a>
                <a href="{{ url('logout') }}" class="logout-btn">
                    <i class="ti-power-off"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>

        <!-- Courses Section -->
        <div class="courses-section">
            <!-- Filters -->
            <div class="filters">
                <div class="search-box">
                    <i class="ti-search"></i>
                    <input type="text" placeholder="Search courses..." class="search-input">
                </div>
                <select class="filter-select">
                    <option value="">All Categories</option>
                    @php
                        $uniqueCategories = $courses->unique('category_id');
                    @endphp
                    @foreach($uniqueCategories as $course)
                        <option value="{{ $course->category_id }}">{{ $course->category_title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Courses Table -->
            <div class="table-container">
                <table class="courses-table">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>
                                <div class="course-info">
                                    <div class="course-image">
                                        @if($course->course_image)
                                            <img src="{{ asset('upload/' . basename($course->course_image)) }}" alt="{{ $course->course_title }}">
                                        @else
                                            <div class="no-image">
                                                <i class="ti-image"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="course-details">
                                        <div class="course-title">{{ $course->course_title }}</div>
                                        <div class="course-id">ID: {{ $course->course_id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="category-badge">
                                    {{ $course->category_title }}
                                </span>
                            </td>
                            <td>
                                <div class="price-info">
                                    <span class="original-price">{{ number_format($course->course_price, 2) }}$</span>
                                    @if($course->course_discount > 0)
                                        <span class="discounted-price">{{ number_format($course->getDiscountedPrice(), 2) }}$</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if($course->course_discount > 0)
                                    <span class="discount-badge">{{ $course->course_discount }}%</span>
                                @else
                                    <span class="no-discount">No discount</span>
                                @endif
                            </td>
                            <td>
                                <span class="status-badge {{ $course->course_visibility == 'true' ? 'public' : 'private' }}">
                                    {{ $course->course_visibility == 'true' ? 'Public' : 'Private' }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($course->created_at)->format('M d, Y') }}</td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ url('admin/course/detail', ['id' => $course->course_id]) }}" class="action-btn view" title="View Details">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="{{ url('admin/course/update', ['id' => $course->course_id]) }}" class="action-btn edit" title="Edit">
                                        <i class="ti-pencil"></i>
                                    </a>
                                    <button class="action-btn delete" title="Delete" onclick="deleteCourse({{ $course->course_id }})">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
:root {
    --primary: #2563eb;
    --primary-light: #3b82f6;
    --primary-dark: #1d4ed8;
    --text: #1f2937;
    --text-light: #6b7280;
    --bg: #f8fafc;
    --white: #ffffff;
    --border: #e5e7eb;
    --success: #10b981;
    --warning: #f59e0b;
    --danger: #ef4444;
    --sidebar-bg: #ffffff;
    --sidebar-text: #1f2937;
    --sidebar-active: #3b82f6;
    --sidebar-hover: #f3f4f6;
}

/* Layout */
.admin-container {
    display: flex;
    min-height: 100vh;
    background: var(--bg);
}

/* Sidebar */
.sidebar {
    width: 280px;
    background: var(--sidebar-bg);
    border-right: 1px solid var(--border);
    padding: 1.5rem;
    position: fixed;
    height: 100vh;
    overflow-y: auto;
    transition: all 0.3s ease;
}

.logo {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.5rem 0 1.5rem;
    margin-bottom: 1.5rem;
    border-bottom: 1px solid var(--border);
}

.logo i {
    font-size: 1.75rem;
    color: var(--primary);
}

.logo h2 {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text);
    margin: 0;
}

.nav-section {
    margin-bottom: 2rem;
}

.nav-label {
    display: block;
    font-size: 0.75rem;
    font-weight: 500;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.75rem;
    padding-left: 0.5rem;
}

.sidebar nav a {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.875rem 1rem;
    color: var(--text);
    text-decoration: none;
    border-radius: 0.5rem;
    transition: all 0.2s;
    margin-bottom: 0.25rem;
}

.sidebar nav a i {
    font-size: 1.25rem;
    color: var(--text-light);
    transition: all 0.2s;
}

.sidebar nav a:hover {
    background: var(--sidebar-hover);
}

.sidebar nav a:hover i {
    color: var(--primary);
}

.sidebar nav a.active {
    background: var(--primary);
    color: var(--white);
}

.sidebar nav a.active i {
    color: var(--white);
}

.sidebar nav a.logout {
    color: var(--danger);
}

.sidebar nav a.logout i {
    color: var(--danger);
}

.sidebar nav a.logout:hover {
    background: rgba(239, 68, 68, 0.1);
}

/* Main Content */
.main-content {
    flex: 1;
    margin-left: 280px;
    padding: 2rem;
    transition: all 0.3s ease;
}

/* Header */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding: 1rem 1.5rem;
    background: var(--white);
    border-radius: 1rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.header h1 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text);
}

.header-right {
    display: flex;
    gap: 1rem;
    align-items: center;
}

.add-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.25rem;
    background: var(--primary);
    color: var(--white);
    border-radius: 0.5rem;
    font-size: 0.875rem;
    text-decoration: none;
    transition: all 0.2s;
}

.add-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
}

.logout-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.25rem;
    background: var(--danger);
    color: var(--white);
    border-radius: 0.5rem;
    font-size: 0.875rem;
    text-decoration: none;
    transition: all 0.2s;
}

.logout-btn:hover {
    background: #dc2626;
    transform: translateY(-1px);
}

/* Courses Section */
.courses-section {
    background: var(--white);
    border-radius: 1rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    padding: 1.5rem;
}

/* Filters */
.filters {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding: 1rem;
    background: var(--bg);
    border-radius: 0.75rem;
}

.search-box {
    position: relative;
    flex: 1;
}

.search-box i {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-light);
}

.search-input {
    width: 100%;
    padding: 0.875rem 1rem 0.875rem 2.5rem;
    border: 1px solid var(--border);
    border-radius: 0.5rem;
    font-size: 0.875rem;
    transition: all 0.2s;
}

.search-input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

.filter-select {
    padding: 0.875rem 1rem;
    border: 1px solid var(--border);
    border-radius: 0.5rem;
    font-size: 0.875rem;
    min-width: 200px;
    transition: all 0.2s;
}

.filter-select:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

/* Table */
.table-container {
    overflow-x: auto;
    border-radius: 0.75rem;
    background: var(--white);
}

.courses-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.courses-table th {
    text-align: left;
    padding: 1.25rem 1rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text);
    border-bottom: 1px solid var(--border);
    background: var(--bg);
}

.courses-table td {
    padding: 1.25rem 1rem;
    font-size: 0.875rem;
    border-bottom: 1px solid var(--border);
}

.courses-table tr:hover {
    background: var(--bg);
}

.course-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.course-image {
    width: 56px;
    height: 56px;
    border-radius: 0.5rem;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.course-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-image {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--bg);
    color: var(--text-light);
}

.course-title {
    font-weight: 600;
    color: var(--text);
    margin-bottom: 0.25rem;
}

.course-id {
    font-size: 0.75rem;
    color: var(--text-light);
}

.category-badge {
    padding: 0.375rem 0.875rem;
    background: rgba(37, 99, 235, 0.1);
    color: var(--primary);
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 500;
}

.price-info {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.original-price {
    color: var(--text-light);
    text-decoration: line-through;
    font-size: 0.75rem;
}

.discounted-price {
    color: var(--success);
    font-weight: 600;
}

.discount-badge {
    padding: 0.375rem 0.875rem;
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 500;
}

.no-discount {
    color: var(--text-light);
    font-size: 0.75rem;
}

.status-badge {
    padding: 0.375rem 0.875rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 500;
}

.status-badge.public {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
}

.status-badge.private {
    background: rgba(245, 158, 11, 0.1);
    color: var(--warning);
}

.table-actions {
    display: flex;
    gap: 0.5rem;
}

.action-btn {
    width: 36px;
    height: 36px;
    border-radius: 0.5rem;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s;
}

.action-btn:hover {
    transform: translateY(-1px);
}

.action-btn.view {
    background: rgba(37, 99, 235, 0.1);
    color: var(--primary);
}

.action-btn.view:hover {
    background: rgba(37, 99, 235, 0.2);
}

.action-btn.edit {
    background: rgba(245, 158, 11, 0.1);
    color: var(--warning);
}

.action-btn.edit:hover {
    background: rgba(245, 158, 11, 0.2);
}

.action-btn.delete {
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger);
}

.action-btn.delete:hover {
    background: rgba(239, 68, 68, 0.2);
}

/* Responsive */
@media (max-width: 1024px) {
    .sidebar {
        width: 80px;
        padding: 1rem 0.5rem;
    }

    .logo h2,
    .nav-label,
    .sidebar nav span {
        display: none;
    }

    .logo {
        justify-content: center;
        padding: 0 0 1rem;
    }

    .sidebar nav a {
        justify-content: center;
        padding: 0.875rem;
    }

    .main-content {
        margin-left: 80px;
    }

    .filters {
        flex-direction: column;
    }

    .filter-select {
        width: 100%;
    }
}

@media (max-width: 768px) {
    .main-content {
        padding: 1rem;
    }

    .header {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }

    .header-right {
        flex-direction: column;
    }

    .courses-table th:nth-child(3),
    .courses-table td:nth-child(3),
    .courses-table th:nth-child(4),
    .courses-table td:nth-child(4) {
        display: none;
    }
}
</style>

<script>
function deleteCourse(courseId) {
    if (confirm('Are you sure you want to delete this course?')) {
        window.location.href = `{{ route('admin.courses.delete') }}?id=${courseId}`;
    }
}
</script>
@endsection
