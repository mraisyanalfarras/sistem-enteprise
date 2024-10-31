@extends('admin.app')
@section('content')
<div class="container">
    <h1>Promotion List</h1>
    <a href="{{ route('promotion.create') }}" class="btn btn-primary">Add Promotion</a>

    <!-- Search Field -->
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Search..." id="search">
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Discount (%)</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promotions as $promotion)
            <tr>
                <td>{{ $promotion->id }}</td>
                <td>{{ $promotion->title }}</td>
                <td>{{ $promotion->discount }}</td>
                <td>{{ $promotion->start_date }}</td>
                <td>{{ $promotion->end_date }}</td>
                <td>
                    @if($promotion->is_active)
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-danger">Tidak Aktif</span>
                    @endif
                </td>
                <td>
                    {{-- <a href="{{ route('promotions.edit', $promotion->id) }}" class="btn btn-warning">Edit</a> --}}
                    <form action="{{ route('promotion.destroy', $promotion->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
