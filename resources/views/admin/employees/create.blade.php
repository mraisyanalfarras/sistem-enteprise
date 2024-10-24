@extends('admin.app')

@section('content')
<div class="container">
    <h1>Add New Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data"> <!-- Tambahkan enctype -->
        @csrf

          <!-- User Name Input -->
          <div class="form-group">
            <label for="name">Enter User Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <!-- User Email Input -->
        <div class="form-group">
            <label for="email">Enter User Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>


        <!-- Department Selection -->
        <div class="form-group">
            <label for="department_id">Select Department</label>
            <select name="department_id" class="form-control @error('department_id') is-invalid @enderror" required>
                <option value="">-- Select Department --</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
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
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required>
            @error('address')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Place of Birth -->
        <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" name="place_of_birth" class="form-control @error('place_of_birth') is-invalid @enderror" value="{{ old('place_of_birth') }}">
            @error('place_of_birth')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Date of Birth -->
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}">
            @error('dob')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Religion -->
        <div class="form-group">
            <label for="religion">Religion</label>
            <select name="religion" class="form-control @error('religion') is-invalid @enderror" required>
                <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Katolik" {{ old('religion') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                <option value="Protestan" {{ old('religion') == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="Budha" {{ old('religion') == 'Budha' ? 'selected' : '' }}>Budha</option>
                <option value="Konghucu" {{ old('religion') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
            </select>
            @error('religion')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Gender -->
        <div class="form-group">
            <label for="sex">Gender</label>
            <select name="sex" class="form-control @error('sex') is-invalid @enderror" required>
                <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('sex')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Phone -->
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
            @error('phone')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Salary -->
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary') }}" required>
            @error('salary')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Photo -->
        <div class="form-group">
            <label for="photo" class="form-label">Upload Photo</label>
            <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror">
            @error('photo')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
