@extends('admin.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data"> <!-- Tambahkan enctype -->
        @csrf
        @method('PUT')

        <!-- User Selection -->
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $employee->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Department Selection -->
        <div class="form-group">
            <label for="department_id">Department</label>
            <select name="department_id" class="form-control @error('department_id') is-invalid @enderror" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
            @error('department_id')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $employee->address }}" required>
            @error('address')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Place of Birth -->
        <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" name="place_of_birth" class="form-control @error('place_of_birth') is-invalid @enderror" value="{{ $employee->place_of_birth }}">
            @error('place_of_birth')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Date of Birth -->
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ $employee->dob }}">
            @error('dob')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Religion -->
        <div class="form-group">
            <label for="religion">Religion</label>
            <select name="religion" class="form-control @error('religion') is-invalid @enderror" required>
                <option value="Islam" {{ $employee->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Katolik" {{ $employee->religion == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                <option value="Protestan" {{ $employee->religion == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                <option value="Hindu" {{ $employee->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="Budha" {{ $employee->religion == 'Budha' ? 'selected' : '' }}>Budha</option>
                <option value="Konghucu" {{ $employee->religion == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
            </select>
            @error('religion')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Sex -->
        <div class="form-group">
            <label for="sex">Sex</label>
            <select name="sex" class="form-control @error('sex') is-invalid @enderror" required>
                <option value="Male" {{ $employee->sex == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $employee->sex == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('sex')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Phone -->
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $employee->phone }}" required>
            @error('phone')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Salary -->
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ $employee->salary }}" required>
            @error('salary')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Photo -->
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror">
            @if($employee->photo)
                <p>Current photo:</p>
                <img src="{{ asset('storage/'.$employee->photo) }}" alt="Current Photo" class="img-thumbnail" width="150">
            @endif
            @error('photo')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
