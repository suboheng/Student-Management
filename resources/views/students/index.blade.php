<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Directory</title>
    
    <!-- 1. Google -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- 2. Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="/css/student-directory.css">
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card system-card">
                <!-- ========================================== -->
                <div class="card-header-gradient position-relative">
                    <div class="position-absolute top-0 end-0 p-3 d-flex align-items-center gap-2">
                        <span class="text-white small me-2">
                            <i class="fa-regular fa-user me-1"></i> {{ Auth::user()->name ?? 'User' }}
                        </span>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-light text-danger fw-bold shadow-sm" style="font-size: 12px;">
                                <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                            </button>
                        </form>
                    </div>
                    <i class="fa-solid fa-graduation-cap fa-2x mb-2"></i>
                    <h3>Student Directory</h3>
                    <p class="mb-4">Browse and manage all registered students</p>
                    <div class="row g-3 justify-content-center px-lg-5">
                        <div class="col-4 col-md-3">
                            <div class="stat-box">
                                <div class="stat-number">{{ $totalStudents ?? count($students) }}</div>
                                <div class="stat-label">Total Students</div>
                            </div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="stat-box">
                                <div class="stat-number">{{ $totalDepartments ?? ($departments->count() ?? 0) }}</div>
                                <div class="stat-label">Departments</div>
                            </div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="stat-box">
                                <div class="stat-number">{{ number_format($overallAvg ?? 0, 2) }}</div>
                                <div class="stat-label">Overall AVG</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ========================================== -->
                <div class="card-body p-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('students.index') }}" method="GET" class="mb-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-white border-end-0 text-muted">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input 
                                type="text" 
                                name="search" 
                                class="form-control border-start-0 custom-input ps-0" 
                                placeholder="Search students by name, Enrollment No, or department..." 
                                value="{{ request('search') }}"
                            >
                        </div>
                        <div class="row g-2">
                            <div class="col-md-4">
                                <select name="dept_id" class="form-select custom-select" onchange="this.form.submit()">
                                    <option value="">Filter by Department (All)</option>
                                    @if(isset($departments))
                                        @foreach($departments as $dept)
                                            <option value="{{ $dept->dept_id }}" {{ request('dept_id') == $dept->dept_id ? 'selected' : '' }}>
                                                {{ $dept->dept_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="gender" class="form-select custom-select" onchange="this.form.submit()">
                                    <option value="">All Genders</option>
                                    <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student</th>
                                    <th>Contact</th>
                                    <th>Enrollment</th>
                                    <th>Department</th>
                                    <th>AVG</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($students as $student)
                                    <tr>
                                        <!-- ID -->
                                        <td class="fw-bold">{{ $student->student_id ?? $student->id }}</td>
                                        <td>
                                            <div class="fw-bold text-dark">{{ $student->student_name ?? $student->name }}</div>
                                            <div class="text-muted small">{{ $student->gender }}</div>
                                        </td>
                                        <td>
                                            <div><i class="fa-regular fa-envelope me-1 text-primary"></i> {{ $student->email ?? 'N/A' }}</div>
                                            <div class="text-muted small">
                                                <i class="fa-regular fa-sticky-note me-1"></i> {{ $student->description ?? $student->additional_info ?? 'N/A' }}
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <i class="fa-regular fa-calendar me-1 text-primary"></i> 
                                                {{ $student->enrollment_date }}
                                            </div>
                                            <div class="text-muted small">
                                                <i class="fa-regular fa-clock me-1"></i> {{ $student->enrollment ?? ($student->years_enrolled . ' years') }}
                                            </div>
                                        </td>
                                        <td>
                                            <span class="dept-badge">
                                                <i class="fa-solid fa-book-bookmark me-1"></i> 
                                                {{ $student->department->dept_name ?? $student->department ?? 'Unassigned' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-dark">
                                                {{ $student->avg ?? 'N/A' }}
                                            </span>
                                        </td>

                                        <td class="text-center">
                                            <button class="action-btn action-view" title="View"><i class="fa-regular fa-eye"></i></button>
                                            <a href="{{ route('students.edit', $student->student_id ?? $student->id) }}" class="action-btn action-edit" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                            
                                            <form action="{{ route('students.destroy', $student->student_id ?? $student->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this student?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-btn action-delete" title="Delete">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">
                                            <i class="fa-solid fa-folder-open me-2"></i>No students found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if(method_exists($students, 'links'))
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="text-muted small">
                                Showing {{ $students->firstItem() ?? 0 }} to {{ $students->lastItem() ?? 0 }} of {{ $students->total() }} entries
                            </div>
                            <div>
                                {{ $students->appends(request()->query())->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    @endif
                    <div class="mt-4">
                        <a href="{{ route('students.create') }}" class="btn btn-submit w-100 text-center py-2">
                            <i class="fa-solid fa-user-plus me-2"></i> Register New Student
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>