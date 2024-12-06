@extends('app.layout')

@section('content')
<div class="container">
    <h1>Courses</h1>

    <form action="{{ route('courses.index') }}" method="GET" class="mb-3" id="filterForm">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ request('title') }}" oninput="this.form.submit()">
            </div>
            <div class="col-md-3">
                <select name="category_id" class="form-control" onchange="this.form.submit()">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-control" onchange="this.form.submit()">
                    <option value="">Select Status</option>
                    <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Private" {{ request('status') == 'Private' ? 'selected' : '' }}>Private</option>
                    <option value="Upcoming" {{ request('status') == 'Upcoming' ? 'selected' : '' }}>Upcoming</option>
                    <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Draft" {{ request('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                    <option value="Inactive" {{ request('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="number" name="price" class="form-control" placeholder="Price" value="{{ request('price') }}" oninput="this.form.submit()">
            </div>
        </div>
    </form>
    <table class="table">

        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Status</th>
                <th>Price</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr>
                <td>{{ $course->title }}</td>
                <td>{{ $course->category->name ?? 'Uncategorized' }}</td>
                <td>{{ $course->short_description }}</td>
                <td>{{ $course->status }}</td>
                <td>
                    @if ($course->pricing_type === 'Free')
                    Free
                    @else
                    <span style="text-decoration: line-through;"> ${{$course->price}}</span>
                    @if ($course->discounted_price)
                    <!-- (Discounted: ${{ $course->discounted_price }}) -->
                    ( ${{ $course->discounted_price }})
                    @endif
                    @endif
                </td>
                <td>
                    <!-- Edit Button -->
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <!-- Delete Button -->
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this course?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <div class="d-flex justify-content-center">
        <div>

            {{ $courses->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>
@endsection