@extends('layouts.app')

@php
    $editing = isset($student);
@endphp

@section('title', ($editing ? 'Edit' : 'Add') . ' Student')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $editing ? 'Edit Student' : 'Add New Student' }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ $editing ? route('students.update', $student->id) : route('students.store') }}" method="POST">
                @csrf
                @if($editing)
                    @method('PUT')
                @endif

                <!-- Student Name -->
                <div class="mb-3">
                    <label for="student_name" class="form-label">Student Name *</label>
                    <input type="text" class="form-control @error('student_name') is-invalid @enderror" 
                           id="student_name" name="student_name" 
                           value="{{ old('student_name', $student->student_name ?? '') }}" required>
                    @error('student_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gender -->
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender *</label>
                    <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                        <option value="" disabled selected>Choose gender</option>
                        <option value="Male" {{ old('gender', $student->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $student->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender', $student->gender ?? '') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Department -->
                <div class="mb-3">
                    <label for="department_id" class="form-label">Department *</label>
                    <select class="form-select @error('department_id') is-invalid @enderror" id="department_id" name="department_id" required>
                        <option value="" disabled selected>Choose department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id', $student->department_id ?? '') == $department->id ? 'selected' : '' }}>
                                {{ $department->department_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" 
                           id="dob" name="dob" 
                           value="{{ old('dob', $student->dob ?? '') }}">
                    @error('dob')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Enrollment Date -->
                <div class="mb-3">
                    <label for="enrollment_date" class="form-label">Enrollment Date *</label>
                    <input type="date" class="form-control @error('enrollment_date') is-invalid @enderror" 
                           id="enrollment_date" name="enrollment_date" 
                           value="{{ old('enrollment_date', $student->enrollment_date ?? '') }}" required>
                    @error('enrollment_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description / Notes -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description / Notes</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" name="description" rows="3">{{ old('description', $student->description ?? '') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <button type="submit" class="btn btn-primary">{{ $editing ? 'Update student' : 'Create student' }}</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection