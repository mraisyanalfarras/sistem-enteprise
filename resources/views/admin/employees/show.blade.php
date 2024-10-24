@extends('admin.app')

@section('content')
<div class="container">
    <h1>Employee Details</h1>
    
    <div class="card">
        <div class="card-header">
            <h2>{{ $employee->user->name ?? 'N/A' }}</h2>
        </div>
        <div class="card-body">
            <!-- User Information -->
            <p><strong>Name:</strong> {{ $employee->user->name ?? 'N/A' }}</p>
            <p><strong>Department:</strong> {{ $employee->department->name ?? 'N/A' }}</p>
            <p><strong>Address:</strong> {{ $employee->address }}</p>
            <p><strong>Place of Birth:</strong> {{ $employee->place_of_birth ?? '-' }}</p>
            <p><strong>Date of Birth:</strong> {{ $employee->dob ? \Carbon\Carbon::parse($employee->dob)->format('d M, Y') : '-' }}</p>
            <p><strong>Religion:</strong> {{ $employee->religion }}</p>
            <p><strong>Gender:</strong> {{ $employee->sex }}</p>
            <p><strong>Phone:</strong> {{ $employee->phone }}</p>
            <p><strong>Salary:</strong> Rp{{ number_format($employee->salary, 0, ',', '.') }}</p>

            <!-- Photo if exists -->
            @if($employee->photo)
                <div class="mb-3">
                    <strong>Photo:</strong>
                    <br>
                    <img src="{{ asset('storage/' . $employee->photo) }}" alt="Employee Photo" class="img-thumbnail" style="width: 150px;">
                </div>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
