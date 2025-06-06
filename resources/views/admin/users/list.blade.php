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
                <a href="{{ url('admin/users') }}" class="active">
                    <i class="ti-user"></i>
                    <span>Users</span>
                </a>
            </div>

            <div class="nav-section">
                <span class="nav-label">Content</span>
                <a href="{{ url('admin/courses') }}">
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
                <h1>Users</h1>
            </div>
            <div class="header-right">
                <a href="{{ url('logout') }}" class="logout-btn">
                    <i class="ti-power-off"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>

        <!-- Users Section -->
        <div class="users-section">
            <!-- Filters -->
            <div class="filters">
                <div class="search-box">
                    <i class="ti-search"></i>
                    <input type="text" placeholder="Search users..." class="search-input">
                </div>
                <select class="filter-select">
                    <option value="">All Roles</option>
                    <option value="learner">Learners</option>
                    <option value="teacher">Teachers</option>
                    <option value="admin">Admins</option>
                </select>
            </div>

            <!-- Users Table -->
            <div class="table-container">
                <table class="users-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Joined Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">
                                        @if($user->user_photo)
                                            <img src="{{ asset('upload/' . basename($user->user_photo)) }}" alt="{{ $user->full_name }}">
                                        @else
                                            <i class="ti-user"></i>
                                        @endif
                                    </div>
                                    <div class="user-details">
                                        <div class="user-name">{{ $user->full_name }}</div>
                                        <div class="user-id">ID: {{ $user->user_id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="role-badge {{ $user->role }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</td>
                            <td>
                                <div class="table-actions">
                                    <button class="action-btn edit" title="Edit">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button class="action-btn delete" title="Delete">
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
    --text: #1f2937;
    --text-light: #6b7280;
    --bg: #f3f4f6;
    --white: #ffffff;
    --border: #e5e7eb;
    --success: #10b981;
    --warning: #f59e0b;
    --danger: #ef4444;
}

/* Layout */
.admin-container {
    display: flex;
    min-height: 100vh;
    background: var(--bg);
}

.sidebar {
    width: 280px;
    background: var(--white);
    border-right: 1px solid var(--border);
    padding: 1.5rem;
    position: fixed;
    height: 100vh;
    overflow-y: auto;
}

.main-content {
    flex: 1;
    margin-left: 280px;
    padding: 2rem;
}

/* Header */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.header h1 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text);
}

.logout-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: var(--danger);
    color: var(--white);
    border-radius: 0.5rem;
    font-size: 0.875rem;
    text-decoration: none;
}

/* Users Section */
.users-section {
    background: var(--white);
    border-radius: 0.5rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    padding: 1.5rem;
}

/* Filters */
.filters {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
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
    padding: 0.75rem 1rem 0.75rem 2.5rem;
    border: 1px solid var(--border);
    border-radius: 0.5rem;
    font-size: 0.875rem;
}

.filter-select {
    padding: 0.75rem 1rem;
    border: 1px solid var(--border);
    border-radius: 0.5rem;
    font-size: 0.875rem;
    min-width: 150px;
}

/* Table */
.table-container {
    overflow-x: auto;
}

.users-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.users-table th {
    text-align: left;
    padding: 1rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--text-light);
    border-bottom: 1px solid var(--border);
}

.users-table td {
    padding: 1rem;
    font-size: 0.875rem;
    border-bottom: 1px solid var(--border);
}

.user-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--bg);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.user-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.user-name {
    font-weight: 500;
}

.user-id {
    font-size: 0.75rem;
    color: var(--text-light);
}

.role-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 500;
}

.role-badge.learner {
    background: rgba(37, 99, 235, 0.1);
    color: var(--primary);
}

.role-badge.teacher {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
}

.role-badge.admin {
    background: rgba(245, 158, 11, 0.1);
    color: var(--warning);
}

.table-actions {
    display: flex;
    gap: 0.5rem;
}

.action-btn {
    width: 32px;
    height: 32px;
    border-radius: 0.375rem;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.action-btn.edit {
    background: rgba(37, 99, 235, 0.1);
    color: var(--primary);
}

.action-btn.delete {
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger);
}

/* Sidebar */
.logo {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.5rem 0 1.5rem;
    margin-bottom: 1.5rem;
    border-bottom: 1px solid var(--border);
}

.logo i {
    font-size: 1.5rem;
    color: var(--primary);
}

.logo h2 {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text);
    margin: 0;
}

.nav-section {
    margin-bottom: 1.5rem;
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
    padding: 0.75rem 1rem;
    color: var(--text);
    text-decoration: none;
    border-radius: 0.5rem;
    transition: all 0.2s;
    margin-bottom: 0.25rem;
}

.sidebar nav a i {
    font-size: 1.25rem;
    color: var(--text-light);
}

.sidebar nav a:hover {
    background: var(--bg);
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

/* Responsive Sidebar */
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
        padding: 0.75rem;
    }

    .main-content {
        margin-left: 80px;
    }
}

@media (max-width: 768px) {
    .main-content {
        padding: 1rem;
    }

    .users-table th:nth-child(3),
    .users-table td:nth-child(3) {
        display: none;
    }
}
</style>
@endsection
