@extends('admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Employees</h1>

            <!-- Add New Employee Button -->
            <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3 float-right">
                Add Employee
            </a>

            <!-- Search Field -->
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search..." id="search">
            </div>

            <!-- Employees Table -->
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Photo</th> <!-- Tambahkan kolom Photo -->
                        <th>Name</th>
                        <th>Department</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="employeeTable">
                    @foreach($employees as $key => $employee)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if($employee->photo)
                                    <img src="{{ asset('storage/' . $employee->photo) }}" alt="Photo" class="img-thumbnail" width="50">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $employee->user->name ?? 'N/A' }}</td>
                            <td>{{ $employee->department->name ?? 'N/A' }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->salary }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>


                                <!-- Edit Button -->
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">Info</a>


                                <!-- Delete Button -->
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            {{ $employees->links() }}
        </div>
    </div>
</div>

<!-- JavaScript for real-time search -->
<script>
    document.getElementById('search').addEventListener('keyup', function() {
        let searchValue = this.value.toLowerCase();
        let rows = document.querySelectorAll('#employeeTable tr');
        rows.forEach(function(row) {
            let name = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            if (name.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
