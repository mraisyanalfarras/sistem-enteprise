@extends('admin.app')

@section('content')
<div class="container">
    <h1 class="my-4">Employee Details</h1>
    
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ $employee->user->name ?? 'N/A' }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Left Column: General Information -->
                <div class="col-md-6">
                    <h5 class="text-muted">Personal Information</h5>
                    <hr>
                    <p><i class="fas fa-user"></i> <strong>Name:</strong> {{ $employee->user->name ?? 'N/A' }}</p>
                    <p><i class="fas fa-briefcase"></i> <strong>Department:</strong> {{ $employee->department->name ?? 'N/A' }}</p>
                    <p><i class="fas fa-home"></i> <strong>Address:</strong> {{ $employee->address }}</p>
                    <p><i class="fas fa-birthday-cake"></i> <strong>Date of Birth:</strong> {{ $employee->dob ? \Carbon\Carbon::parse($employee->dob)->format('d M, Y') : '-' }}</p>
                    <p><i class="fas fa-praying-hands"></i> <strong>Religion:</strong> {{ $employee->religion }}</p>
                    <p><i class="fas fa-venus-mars"></i> <strong>Gender:</strong> {{ $employee->sex }}</p>
                    <p><i class="fas fa-phone"></i> <strong>Phone:</strong> {{ $employee->phone }}</p>
                </div>

                <!-- Right Column: Salary and Photo -->
                <div class="col-md-6">
                    <h5 class="text-muted">Job Information</h5>
                    <hr>
                    <p><i class="fas fa-dollar-sign"></i> <strong>Salary:</strong> Rp{{ number_format($employee->salary, 0, ',', '.') }}</p>
                    
                    <!-- Photo Section -->
                    @if($employee->photo)
                        <div class="mt-4">
                            <strong>Employee Photo:</strong>
                            <br>
                            <img src="{{ asset('storage/' . $employee->photo) }}" alt="Employee Photo" class="img-thumbnail mt-2" style="width: 150px;">
                        </div>
                    @else
                        <div class="mt-4">
                            <strong>Employee Photo:</strong>
                            <br>
                            <img src="{{ asset('img/default-avatar.png') }}" alt="Default Avatar" class="img-thumbnail mt-2" style="width: 150px;">
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
</div>
@endsection
