@extends('app.layout')

@section('content')

<div class="container">
    <h3 class="container-header">Add New Course</h3>

    <!-- Error and Success messages -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif -->

    <!-- Course form -->
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="course-form">
        @csrf
        <div class="form-section">
            <div class="form-left">
                <!-- Title -->
                <div class="form-group">
                    <label for="title">Title*</label>
                    <input type="text" name="title" placeholder="Enter Course Title" value="{{ old('title') }}" id="title" required>
                </div>

                <!-- Short Description -->
                <div class="form-group">
                    <label for="short_description">Short Description*</label>
                    <textarea name="short_description" placeholder="Enter Short Description" id="short_description" required>{{ old('short_description') }}</textarea>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description*</label>
                    <textarea name="description" id="description" required>{{ old('description') }}</textarea>
                </div>

                <!-- Mark down -->
                <!-- <div class="form-group">
                    <label for="markdown-editor">Course Description (Markdown)*</label>
                    <textarea id="markdown-editor" name="description" required>{{ old('description') }}</textarea>
                </div> -->

                <!-- Status -->
                <div class="form-group">
                    <label>Status*</label>
                    @foreach(['Active', 'Private', 'Upcoming', 'Pending', 'Draft', 'Inactive'] as $status)
                    <label class="label-radio">
                        <input type="radio" name="status" value="{{ $status }}" {{ old('status') == $status ? 'checked' : '' }} required>
                        <span>{{ $status }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <!-- Right Section for Category, Level, Pricing -->
            <div class="form-right">
                <div class="form-top-right">
                    <!-- Category -->
                    <div class="form-group">
                        <label for="category_id">Category*</label>
                        <select name="category_id" id="category_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Level -->
                    <div class="form-group">
                        <label for="category_level">Level*</label>
                        <select name="category_level" id="category_level" required>
                            <option value="">Select Level</option>
                            <option value="Beginner" {{ old('category_level') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="Intermediate" {{ old('category_level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="Advanced" {{ old('category_level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                        </select>
                    </div>

                    <!-- Pricing Type -->
                    <div class="form-group">
                        <label>Pricing Type*</label>
                        <label class="label-radio"><input type="radio" name="pricing_type" value="Paid" {{ old('pricing_type') == 'Paid' ? 'checked' : '' }} required> Paid</label>
                        <label class="label-radio"><input type="radio" name="pricing_type" value="Free" {{ old('pricing_type') == 'Free' ? 'checked' : '' }} required> Free</label>
                    </div>

                    <!-- Price Fields -->
                    <div id="priceFields" class="{{ old('pricing_type') == 'Paid' ? 'show' : 'hide' }}">
                        <div class="form-group">
                            <label for="price">Price ($)</label>
                            <input type="number" name="price" value="{{ old('price') }}" id="price" step="0.01" min="0">
                        </div>
                        <div class="form-group">
                            <label class="label-radio">
                                <input type="checkbox" name="has_discount" value="1" {{ old('has_discount') == '1' ? 'checked' : '' }}>
                                Check if this course has discount
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="discounted_price">Discounted Price</label>
                            <input type="number" name="discounted_price" value="{{ old('discounted_price') }}" id="discounted_price" step="0.01" min="0">
                        </div>
                    </div>

                    <!-- Thumbnail Image -->
                    <div class="form-group">
                        <label for="thumbnail_image">Thumbnail Image</label>
                        <input type="file" name="thumbnail_image" id="thumbnail_image">
                    </div>
                </div>

                <div class="form-bottom-right">
                    <!-- Submit Button -->
                    <div class="form-footer">
                        <button type="submit" class="submit-btn">Add Course</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<style>
    /* Main container styling */
    .container {
        max-width: 1300px;
        margin: 0 auto;
        /* padding: 20px; */
        /* background-color: #f9f9f9; */
        /* border-radius: 8px; */
    }

    .container-header {
        background-color: white;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    /* Form Layout */
    .form-section {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        background-color: white;
        padding: 10px;
        border-radius: 10px;
    }

    .form-left,
    .form-right {
        flex: 1;
        min-width: 300px;
        width: 100%;
        /* Ensures responsiveness */
    }

    .form-right {
        display: flex;
        flex-direction: column;
        gap: 10px;
        justify-content: space-between;
    }

    /* Form Group Styling */
    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group .label-radio {
        display: flex;
        gap: 10px;
    }

    .form-group .label-radio input {
        width: auto;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    /* Price Fields Visibility */
    .show {
        display: block;
    }

    .hide {
        display: none;
    }

    /* Submit Button Styling */
    .submit-btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #45a049;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .form-section {
            flex-direction: column;
        }
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">

<!-- Include JS for EasyMDE -->
<script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>

<!--<script>
    // Initialize EasyMDE for the description field
    const easyMDE = new EasyMDE({
        element: document.getElementById('description'),
        spellChecker: false, // Optional: Disable spellchecker
        placeholder: "Type your markdown here...",
    });
</script> -->

<script>
    // Initialize EasyMDE
    const easyMDE = new EasyMDE({
        element: document.getElementById('description'),
        spellChecker: false, // Optional: Disable spellchecker
        placeholder: "Type your markdown here...",
    });

    // Sync EasyMDE content to textarea before form submission
    document.querySelector('.course-form').addEventListener('submit', function(event) {
        easyMDE.toTextArea(); // Sync the content
    });
</script>
<script>
    document.querySelectorAll('input[name="pricing_type"]').forEach(radio => {
        radio.addEventListener('change', function() {
            document.getElementById('priceFields').style.display = this.value === 'Paid' ? 'block' : 'none';
        });
    });
</script>
@endsection