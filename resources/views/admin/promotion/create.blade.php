@extends('admin.app')
@section('content')
<div class="container">
    <h1>Create Promotion</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('promotion.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Promotion Title" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Enter Promotion Description"></textarea>
        </div>

        <div class="form-group">
            <label for="discount">Discount Percentage (%)</label>
            <input type="number" class="form-control" name="discount" id="discount" placeholder="Enter Discount Percentage" required min="0" max="100">
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" name="start_date" id="start_date" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" name="end_date" id="end_date" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Promotion</button>
    </form>
</div>
@endsection
