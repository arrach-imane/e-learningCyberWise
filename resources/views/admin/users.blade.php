@extends('admin.layout.header')
@section('content')
<div class="admin-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <i class="ti-layout-grid2"></i>
            <h2>Admin</h2>
        </div>
        <nav>
            <a href="{{ url('admin/dashboard') }}">
                <i class="ti-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ url('admin/users') }}" class="active">
                <i class="ti-user"></i>
                <span>Users</span>
            </a>
            <a href="{{ url('admin/courses') }}">
                <i class="ti-book"></i>
                <span>Courses</span>
            </a>
            <a href="{{ url('admin/lessons') }}">
                <i class="ti-video-camera"></i>
                <span>Lessons</span>
            </a>
            <a href="{{ url('admin/category') }}">
                <i class="ti-layers"></i>
                <span>Categories</span>
            </a>
            <div class="nav-divider"></div>
            <a href="{{ url('logout') }}" class="logout">
                <i class="ti-power-off"></i>
                <span>Logout</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <div class="header-left">
                <div class="page-title">
                    <h1>Users Management</h1>
                    <p>Manage all platform users</p>
                </div>
            </div>
            <div class="header-right">
                <div class="header-actions">
                    <div class="date">
                        <i class="ti-calendar"></i>
                        <span>{{ date('F d, Y') }}</span>
                    </div>
                    <a href="{{ url('logout') }}" class="logout-btn">
                        <i class="ti-power-off"></i>
                        <span>Logout</span>
                    </a>
                </div>
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
                <div class="filter-actions">
                    <select class="filter-select">
                        <option value="">All Roles</option>
                        <option value="learner">Learners</option>
                        <option value="teacher">Teachers</option>
                        <option value="admin">Admins</option>
                    </select>
                    <button class="add-user-btn">
                        <i class="ti-plus"></i>
                        Add User
                    </button>
                </div>
            </div>

            <!-- Users Table -->
            <div class="table-container">
                <table class="users-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Status</th>
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
                                        <i class="ti-user"></i>
                                    </div>
                                    <div class="user-details">
                                        <div class="user-name">{{ $user->full_name }}</div>
                                        <div class="user-id">ID: {{ $user->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="role-badge {{ $user->role }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="status-badge {{ $user->status ? 'active' : 'inactive' }}">
                                    {{ $user->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
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

            <!-- Pagination -->
            <div class="pagination">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

<style>
:root {
    --primary: #2563eb;
    --primary-light: #3b82f6;
    --primary-lighter: #60a5fa;
    --text: #1f2937;
    --text-light: #6b7280;
    --bg: #f3f4f6;
    --white: #ffffff;
    --border: #e5e7eb;
    --success: #10b981;
    --warning: #f59e0b;
    --danger: #ef4444;
}

/* Users Section */
.users-section {
    background: var(--white);
    border-radius: 1rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    padding: 1.5rem;
}

/* Filters */
.filters {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    gap: 1rem;
}

.search-box {
    position: relative;
    flex: 1;
    max-width: 400px;
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
    color: var(--text);
    transition: all 0.2s;
}

.search-input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

.filter-actions {
    display: flex;
    gap: 1rem;
}

.filter-select {
    padding: 0.75rem 1rem;
    border: 1px solid var(--border);
    border-radius: 0.5rem;
    font-size: 0.875rem;
    color: var(--text);
    background: var(--white);
    min-width: 150px;
}

.add-user-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1rem;
    background: var(--primary);
    color: var(--white);
    border: none;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
}

.add-user-btn:hover {
    background: var(--primary-light);
}

/* Table */
.table-container {
    overflow-x: auto;
    margin: 0 -1.5rem;
    padding: 0 1.5rem;
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
    color: var(--text);
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
    color: var(--text-light);
}

.user-details {
    display: flex;
    flex-direction: column;
}

.user-name {
    font-weight: 500;
    color: var(--text);
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

.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 500;
}

.status-badge.active {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
}

.status-badge.inactive {
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger);
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
    transition: all 0.2s;
}

.action-btn.edit {
    background: rgba(37, 99, 235, 0.1);
    color: var(--primary);
}

.action-btn.edit:hover {
    background: rgba(37, 99, 235, 0.2);
}

.action-btn.delete {
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger);
}

.action-btn.delete:hover {
    background: rgba(239, 68, 68, 0.2);
}

/* Pagination */
.pagination {
    margin-top: 1.5rem;
    display: flex;
    justify-content: center;
}

/* Responsive */
@media (max-width: 1024px) {
    .filters {
        flex-direction: column;
        align-items: stretch;
    }

    .search-box {
        max-width: none;
    }

    .filter-actions {
        flex-wrap: wrap;
    }
}

@media (max-width: 768px) {
    .users-table th:nth-child(3),
    .users-table td:nth-child(3),
    .users-table th:nth-child(4),
    .users-table td:nth-child(4) {
        display: none;
    }
}
</style>
@endsection
