<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/student-form.css') }}">
</head>
<body>

<div class="container pb-5">
    <div class="registration-card">
        <!-- Banner -->
        <div class="card-header-custom">
            <div class="icon-header">
                <i class="bi bi-pencil-square"></i>
            </div>
            <h2>Edit Student</h2>
            <p>Update student details below</p>
        </div>

        <div class="p-4 p-md-5">
            @if($errors->any())
                <div class="alert alert-danger py-2 px-3 mb-4" style="border-radius: 10px; font-size: 14px;">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('students.update', $student->student_id ?? $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Section 1: Personal Information -->
                <div class="section-title">
                    <i class="bi bi-person-fill"></i> Personal Information
                </div>

                <!-- Student Name -->
                <div class="mb-3">
                    <label class="form-label">Student Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input 
                            type="text" 
                            name="student_name" 
                            class="form-control" 
                            value="{{ old('student_name', $student->student_name) }}" 
                            placeholder="Enter full name" 
                            required
                        >
                    </div>
                </div>

                <!-- Date of Birth -->
                <div class="mb-3">
                    <label class="form-label">Date of Birth</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                        <input 
                            type="date" 
                            name="dob" 
                            class="form-control" 
                            value="{{ old('dob', $student->dob) }}" 
                            required
                        >
                    </div>
                </div>

                <!-- Gender -->
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                        <select name="gender" class="form-select" required>
                            <option value="" disabled>Select Gender</option>
                            <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender', $student->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>

                <!-- Section 2: Academic Information -->
                <div class="section-title">
                    <i class="bi bi-bank2"></i> Academic Information
                </div>

                <div class="row">
                    <!-- Enrollment Date -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enrollment Date</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                            <input 
                                type="date" 
                                name="enrollment_date" 
                                class="form-control" 
                                value="{{ old('enrollment_date', $student->enrollment_date) }}" 
                                required
                            >
                        </div>
                    </div>

                    <!-- Enrollment -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Years Enrolled / Enrollment No.</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-clock-history"></i></span>
                            <input 
                                type="text" 
                                name="enrollment" 
                                class="form-control" 
                                value="{{ old('enrollment', $student->enrollment) }}" 
                                placeholder="e.g. 2024001 or 3" 
                                required
                            >
                        </div>
                    </div>
                </div>

                <!-- Department -->
                <div class="mb-3">
                    <label class="form-label">Department</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-hdd-stack"></i></span>
                        <select name="dept_id" class="form-select" required>
                            <option value="" disabled>Select Department</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->dept_id }}" {{ old('dept_id', $student->dept_id) == $dept->dept_id ? 'selected' : '' }}>
                                    {{ $dept->dept_name ?? $dept->name ?? 'Dept #'.$dept->dept_id }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- AVG -->
                <div class="mb-3">
                    <label class="form-label">AVG</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calculator"></i></span>
                        <input 
                            type="number" 
                            step="0.01" 
                            name="avg" 
                            class="form-control" 
                            value="{{ old('avg', $student->avg) }}" 
                            placeholder="Enter AVG grade/score"
                        >
                    </div>
                </div>

                <!-- Section 3: Additional Information -->
                <div class="section-title">
                    <i class="bi bi-file-earmark-text-fill"></i> Additional Information
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <textarea 
                        name="description" 
                        class="form-control" 
                        rows="3" 
                        placeholder="Additional notes or description..."
                    >{{ old('description', $student->description) }}</textarea>
                </div>

                <div class="row g-2 mt-3">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-submit w-100">
                            <i class="bi bi-check-circle-fill me-1"></i> Update Student
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('students.index') }}" class="btn btn-reset w-100 text-center text-decoration-none d-block">
                            <i class="bi bi-x-circle me-1"></i> Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>