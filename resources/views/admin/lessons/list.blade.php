@extends('admin.layout.header')

@section('content')
<div class="admin-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <i class="fas fa-graduation-cap"></i>
            <h2>E-Learning</h2>
        </div>

        <nav>
            <div class="nav-section">
                <span class="nav-label">Main</span>
                <a href="{{ url('admin/dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ url('admin/users') }}" class="{{ request()->is('admin/users') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
            </div>

            <div class="nav-section">
                <span class="nav-label">Content</span>
                <a href="{{ url('admin/courses') }}" class="{{ request()->is('admin/courses') ? 'active' : '' }}">
                    <i class="fas fa-book"></i>
                    <span>Courses</span>
                </a>
                <a href="{{ url('admin/lessons') }}" class="{{ request()->is('admin/lessons') ? 'active' : '' }}">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Lessons</span>
                </a>
            </div>

            <div class="nav-section">
                <span class="nav-label">Account</span>
                <a href="{{ url('logout') }}" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="header">
            <h1>Lessons</h1>
            <div class="header-right">
                <a href="{{ url('admin/lessons/add') }}" class="add-btn">
                    <i class="fas fa-plus"></i>
                    Add New Lesson
                </a>
                <a href="{{ url('logout') }}" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </div>

        <div class="lessons-section">
            <!-- Filters -->
            <div class="filters">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="search-input" placeholder="Search lessons...">
                </div>
                <select class="filter-select">
                    <option value="">All Courses</option>
                    @php
                        $uniqueCourses = $lessons->unique('course_id');
                    @endphp
                    @foreach($uniqueCourses as $lesson)
                        <option value="{{ $lesson->course_id }}">{{ $lesson->course_title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Lessons Table -->
            <div class="table-container">
                <table class="lessons-table">
                    <thead>
                        <tr>
                            <th>Lesson</th>
                            <th>Course</th>
                            <th>Duration</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lessons as $lesson)
                        <tr>
                            <td>
                                <div class="lesson-info">
                                    <div class="lesson-image">
                                        @if($lesson->lesson_image)
                                            <img src="{{ asset('storage/' . $lesson->lesson_image) }}" alt="{{ $lesson->lesson_title }}">
                                        @else
                                            <div class="no-image">
                                                <i class="fas fa-video"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="lesson-title">{{ $lesson->lesson_title }}</div>
                                        <div class="lesson-id">ID: {{ $lesson->lesson_id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="course-badge">
                                    {{ $lesson->course->course_title }}
                                </span>
                            </td>
                            <td>{{ $lesson->lesson_duration }} min</td>
                            <td>{{ $lesson->lesson_order }}</td>
                            <td>
                                <span class="status-badge {{ $lesson->lesson_status ? 'public' : 'private' }}">
                                    {{ $lesson->lesson_status ? 'Public' : 'Private' }}
                                </span>
                            </td>
                            <td>{{ $lesson->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ url('admin/lessons/detail/' . $lesson->lesson_id) }}" class="action-btn view" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ url('admin/lessons/update/' . $lesson->lesson_id) }}" class="action-btn edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ url('admin/lessons/delete/' . $lesson->lesson_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete" title="Delete" onclick="return confirm('Are you sure you want to delete this lesson?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
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

/* Lessons Section */
.lessons-section {
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

.lessons-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.lessons-table th {
    text-align: left;
    padding: 1.25rem 1rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text);
    border-bottom: 1px solid var(--border);
    background: var(--bg);
}

.lessons-table td {
    padding: 1.25rem 1rem;
    font-size: 0.875rem;
    border-bottom: 1px solid var(--border);
}

.lessons-table tr:hover {
    background: var(--bg);
}

.lesson-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.lesson-image {
    width: 56px;
    height: 56px;
    border-radius: 0.5rem;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.lesson-image img {
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

.lesson-title {
    font-weight: 600;
    color: var(--text);
    margin-bottom: 0.25rem;
}

.lesson-id {
    font-size: 0.75rem;
    color: var(--text-light);
}

.course-badge {
    padding: 0.375rem 0.875rem;
    background: rgba(37, 99, 235, 0.1);
    color: var(--primary);
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 500;
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

    .lessons-table th:nth-child(3),
    .lessons-table td:nth-child(3),
    .lessons-table th:nth-child(4),
    .lessons-table td:nth-child(4) {
        display: none;
    }
}
</style>
@endsection
