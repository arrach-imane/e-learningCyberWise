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
            <a href="#" class="active">
                <i class="ti-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ url('admin/users') }}">
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
                    <h1>Dashboard</h1>
                    <p>Welcome back, {{ auth()->user()->full_name }}</p>
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

        <!-- Main Stats -->
        <div class="stats">
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="ti-user"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{{ $totalusers }}</div>
                    <div class="stat-label">Total Users</div>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="ti-book"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{{ $totalcourses }}</div>
                    <div class="stat-label">Total Courses</div>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="ti-video-camera"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{{ $totallessons }}</div>
                    <div class="stat-label">Total Lessons</div>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="ti-layers"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{{ $totalcategory }}</div>
                    <div class="stat-label">Categories</div>
                </div>
            </div>
        </div>

        <!-- Teacher Stats -->
        <div class="section-title">
            <h2>Teacher Statistics</h2>
        </div>
        <div class="teacher-stats">
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="ti-user"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{{ $totalusers * 0.2 }}</div>
                    <div class="stat-label">Active Teachers</div>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="ti-book"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{{ $totalcourses }}</div>
                    <div class="stat-label">Courses Created</div>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="ti-video-camera"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{{ $totallessons }}</div>
                    <div class="stat-label">Lessons Created</div>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="ti-star"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">4.8</div>
                    <div class="stat-label">Average Rating</div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="charts">
            <div class="chart-container">
                <div class="chart-header">
                    <h3>User Distribution</h3>
                    <div class="chart-legend">
                        <span class="legend-item">
                            <span class="legend-color" style="background: #2563eb"></span>
                            Students
                        </span>
                        <span class="legend-item">
                            <span class="legend-color" style="background: #3b82f6"></span>
                            Teachers
                        </span>
                    </div>
                </div>
                <canvas id="userStatistics"></canvas>
            </div>
            <div class="chart-container">
                <div class="chart-header">
                    <h3>Platform Overview</h3>
                </div>
                <canvas id="platformOverview"></canvas>
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
    --purple: #8b5cf6;
}

.admin-container {
    display: flex;
    min-height: 100vh;
    background: var(--bg);
}

/* Sidebar */
.sidebar {
    width: 260px;
    background: var(--white);
    border-right: 1px solid var(--border);
    padding: 1.5rem;
    position: fixed;
    height: 100vh;
    display: flex;
    flex-direction: column;
}

.logo {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.5rem 0;
    margin-bottom: 2rem;
}

.logo i {
    font-size: 1.75rem;
    color: var(--primary);
}

.logo h2 {
    margin: 0;
    color: var(--text);
    font-size: 1.5rem;
    font-weight: 600;
}

.sidebar nav {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    flex: 1;
}

.sidebar a {
    display: flex;
    align-items: center;
    padding: 0.875rem 1rem;
    color: var(--text);
    text-decoration: none;
    border-radius: 0.5rem;
    transition: all 0.2s;
    font-weight: 500;
}

.sidebar a i {
    margin-right: 0.75rem;
    font-size: 1.25rem;
    width: 1.5rem;
    text-align: center;
}

.sidebar a:hover {
    background: var(--bg);
    color: var(--primary);
}

.sidebar a.active {
    background: var(--primary);
    color: var(--white);
}

.nav-divider {
    height: 1px;
    background: var(--border);
    margin: 0.5rem 0;
}

.sidebar a.logout {
    margin-top: auto;
    color: var(--danger);
}

/* Main Content */
.main-content {
    flex: 1;
    margin-left: 260px;
    padding: 2rem;
}

/* Header */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    background: var(--white);
    padding: 1.5rem;
    border-radius: 1rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.page-title h1 {
    margin: 0;
    font-size: 1.5rem;
    color: var(--text);
    font-weight: 600;
    line-height: 1.2;
}

.page-title p {
    margin: 0.25rem 0 0;
    color: var(--text-light);
    font-size: 0.875rem;
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.date {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-light);
    font-size: 0.875rem;
    padding: 0.5rem 0.75rem;
    background: var(--bg);
    border-radius: 0.5rem;
}

.logout-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--danger);
    padding: 0.5rem 0.75rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.2s;
    background: rgba(239, 68, 68, 0.1);
}

.logout-btn:hover {
    background: rgba(239, 68, 68, 0.15);
    color: var(--danger);
}

.logout-btn i {
    font-size: 1rem;
}

/* Section Title */
.section-title {
    margin: 2rem 0 1rem;
}

.section-title h2 {
    font-size: 1.25rem;
    color: var(--text);
    font-weight: 600;
}

/* Stats */
.stats, .teacher-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-box {
    background: var(--white);
    padding: 1.5rem;
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: transform 0.2s;
}

.stat-box:hover {
    transform: translateY(-2px);
}

.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
}

.stat-icon i {
    font-size: 1.5rem;
    color: var(--white);
}

.stat-content {
    flex: 1;
}

.stat-value {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text);
    line-height: 1;
    margin-bottom: 0.25rem;
}

.stat-label {
    color: var(--text-light);
    font-size: 0.875rem;
}

/* Charts */
.charts {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 1.5rem;
}

.chart-container {
    background: var(--white);
    padding: 1.5rem;
    border-radius: 0.75rem;
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.chart-header h3 {
    margin: 0;
    color: var(--text);
    font-size: 1.125rem;
    font-weight: 500;
}

.chart-legend {
    display: flex;
    gap: 1rem;
}

.legend-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-light);
    font-size: 0.875rem;
}

.legend-color {
    width: 12px;
    height: 12px;
    border-radius: 3px;
}

/* Responsive */
@media (max-width: 1200px) {
    .stats, .teacher-stats {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 992px) {
    .charts {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .sidebar {
        width: 72px;
        padding: 1rem;
    }

    .main-content {
        margin-left: 72px;
    }

    .logo h2, .sidebar span {
        display: none;
    }

    .sidebar a {
        justify-content: center;
        padding: 0.75rem;
    }

    .sidebar a i {
        margin: 0;
    }

    .stats, .teacher-stats {
        grid-template-columns: 1fr;
    }

    .header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }

    .header-actions {
        width: 100%;
        justify-content: space-between;
    }

    .date span {
        display: none;
    }

    .logout-btn span {
        display: none;
    }

    .logout-btn {
        padding: 0.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // User Statistics Chart
    new Chart(document.getElementById('userStatistics'), {
        type: 'bar',
        data: {
            labels: ['Students', 'Teachers', 'Admins'],
            datasets: [{
                data: [{{ $totalusers }}, {{ $totalusers * 0.2 }}, {{ $totalusers * 0.05 }}],
                backgroundColor: ['#2563eb', '#3b82f6', '#60a5fa'],
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Platform Overview Chart
    new Chart(document.getElementById('platformOverview'), {
        type: 'doughnut',
        data: {
            labels: ['Courses', 'Lessons', 'Categories'],
            datasets: [{
                data: [{{ $totalcourses }}, {{ $totallessons }}, {{ $totalcategory }}],
                backgroundColor: ['#2563eb', '#3b82f6', '#60a5fa']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            },
            cutout: '70%'
        }
    });
});
</script>
@endsection
