@extends('user.userapp')
@section('content')

<div class="p-4 shadow fistslider">
    <div class="row align-items-center">
        <!-- Text Section -->

        <div class="col-md-6 d-flex flex-column justify-content-center fistslidersection">
            <div style="padding-left: 90px;">
                <h1 class="display-4 firsttitle">{{ $course->title }}</h1>
                <p class="lead firstdescription">{{ $course->short_description }}</p>
                <p class="lead firstshortdescription">{{ $course->description }}</p>

                <p class="lead firstshortdescription">
                <h2>Enrolled Students</h2>
                <ul>
                    @foreach ($enrolledStudents as $enrolled)
                    <li>{{ $enrolled->user->name }}</li> <!-- Display student name -->
                    @endforeach
                </ul>

                <!-- You can add a success message here -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                </p>
                <!-- <p class="text-warning mb-1"> ({{ $ratingsCount }} ratings)</p> -->
                <p class="text-warning mb-1">Rating:
                    @php
                    $fullStars = floor($averageRating);
                    $halfStar = ($averageRating - $fullStars >= 0.5) ? 1 : 0;
                    @endphp
                    <span id="star-rating" data-course-id="{{ $course->id }}">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="star {{ $i <= $fullStars ? 'filled' : '' }}" data-value="{{ $i }}">
                            ★
                    </span>
                    @endfor
                    </span>
                    <!-- ({{ $ratingsCount }} ratings) -->
                </p>
            </div>
        </div>

        <!-- Image Section -->
        <!-- <div class="col-md-6">
            <div class="card mx-auto fixed-image-section">
                <img src="{{ $course->thumbnail_image && file_exists(storage_path('app/public/' . $course->thumbnail_image)) 
                        ? asset('storage/' . $course->thumbnail_image) 
                        : 'https://via.placeholder.com/300' }}"
                    class="card-img-top"
                    alt="{{ $course->title }}">
                <div class="card-body">
                    <h6 class="card-title">{{ $course->title }}</h6>
                    <p class="text-warning mb-1">★★★★★</p>
                    <p class="card-text">$${{ $course->price }}</p>
                    <button class="btn btn-primary add-to-cart">Add to Cart</button>
                </div>
            </div>
        </div> -->

        <div class="col-md-6">
            <div id="scrolling-card" class="card mx-auto fixed-image-section">
                <img src="{{ $course->thumbnail_image && file_exists(storage_path('app/public/' . $course->thumbnail_image)) 
                ? asset('storage/' . $course->thumbnail_image) 
                : 'https://via.placeholder.com/300' }}"
                    class="card-img-top"
                    alt="{{ $course->title }}">
                <div class="card-body">
                    <h6 class="card-title">{{ $course->title }}</h6>
                    <!-- <p class="text-warning mb-1">★★★★★</p> -->
                    <p>Rating:
                        @php
                        $fullStars = floor($averageRating);
                        $halfStar = ($averageRating - $fullStars >= 0.5) ? 1 : 0;
                        @endphp
                        <span id="star-rating" data-course-id="{{ $course->id }}">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="star {{ $i <= $fullStars ? 'filled' : '' }}" data-value="{{ $i }}">
                                ★
                        </span>
                        @endfor
                        </span>
                        <!-- ({{ $ratingsCount }} ratings) -->
                    </p>

                    <p class="card-text">{{ $course->short_description }}</p>
                    <p class="card-text">${{ $course->price }}</p>
                    <button class="btn btn-primary add-to-cart">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- What You'll Learn Section -->
<div class="container">
    <div class="row">
        <!-- Direct Static Content -->
        <div class="col-md-6 mb-4">
            <div class="card shadow learn">
                <div class="card-body">
                    <h1 class="mb-4 secondh1">What You'll Learn</h1>

                    <!-- Collapsible Content -->
                    <div id="content" class="collapsed-content" style="max-height: 300px; overflow: hidden;">
                        <div>
                            <div class="row">
                                <!-- Lessons from database -->

                                <div class="col-md-6">
                                    @foreach($lessons->take(ceil($lessons->count() / 2)) as $lesson)
                                    <p class="card-text"><i class="fa fa-check" aria-hidden="true"></i>
                                        {{ $lesson->title }}: {{ $lesson->content }}
                                    </p>
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    @foreach($lessons->skip(ceil($lessons->count() / 2)) as $lesson)
                                    <p class="card-text"><i class="fa fa-check" aria-hidden="true"></i>
                                        {{ $lesson->title }}: {{ $lesson->content }}
                                    </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Show More/Less Button -->
                    <div class="text-left mt-3">
                        <span class="show-more" onclick="toggleContent()">
                            Show more <i class="fas fa-chevron-down me-2"></i>
                        </span>
                        <span class="show-less" onclick="toggleContent()" style="display: none;">
                            Show less <i class="fas fa-chevron-up me-2"></i>
                        </span>
                    </div>

                    <!-- Add New Lesson Button -->
                    <div class="text-left mt-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLessonModal">Add New Lesson</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addLessonModal" tabindex="-1" aria-labelledby="addLessonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLessonModalLabel">Add New Lesson</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form to add lesson -->
                <form action="{{ route('lessons.store', $course->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Lesson Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Lesson Content</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Lesson</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-md-6 mb-4">
        <h3 class="mb-4">This course includes:</h3>
        <div class>
            <div class="card-body">
                <!-- <h3 class="mb-4">This course includes:</h3> -->

                <!-- Divided Content: 6 items per column -->
                <div class="row">
                    <!-- First Column -->
                    <div class="col-md-6">
                        <p><strong>Category:</strong> {{ $categoryName }}</p>

                    </div>

                    <!-- Second Column -->
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container">
    <div class="row">
        <h3 class="mb-4">Course Content</h3>
        <!-- Course Content Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    @foreach($course->sections as $index => $section)
                    <div class="card-body">
                        <!-- Collapsible Content for Introduction -->
                        <div id="introContent" class="collapsed-content" style="max-height: 200px; overflow: hidden;">

                            <!-- <h5>{{ $section->title }}</h5>
                            <p>{{ $section->content }}</p> -->
                            <div class="sectiontitle">
                                <h5 class="mb-2 " data-bs-toggle="collapse" href="#collapseSection{{ $index }}" role="button" aria-expanded="false" aria-controls="collapseSection{{ $index }}">
                                    <i class="fa fa-video" aria-hidden="true"></i> {{ $section->title }}
                                </h5>
                            </div>
                            <div class="collapse" id="collapseSection{{ $index }}">
                                <p>{{ $section->content }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="text-left mt-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSectionModal">Add New Section</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>




<div class="modal fade" id="addSectionModal" tabindex="-1" aria-labelledby="addSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSectionModalLabel">Add New Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('section.store', $course->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="lesson_id">Lesson</label>
                        <select name="lesson_id" id="lesson_id" class="form-control">
                            @foreach ($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Section Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Section Content</label>
                        <textarea name="content" id="content" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Section</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div>
                <div class="card-body">
                    <h3 class="mb-4">Requirements</h3>

                    <!-- Toggle Button -->
                    <button id="toggleRequirements" class="btn btn-primary mb-3">Show Requirements</button>

                    <!-- Requirements Section -->
                    <div id="requirementsSection" style="display: none;">
                        @if(!empty($course->requirements))
                        @foreach (explode("\n", $course->requirements) as $requirement)
                        <p>
                            <i class="fa fa-circle" aria-hidden="true" style="font-size: 10px; margin-right: 8px;"></i>
                            {{ $requirement }}
                        </p>
                        @endforeach
                        @else
                        <p>No specific requirements listed for this course.</p>
                        @endif
                    </div>

                    <!-- Add Requirement Button -->
                    <button id="addRequirement" class="btn btn-success mt-3" style="display: flex;">Add Requirement</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addRequirementModal" tabindex="-1" aria-labelledby="addRequirementModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addRequirementForm" method="POST" action="{{ route('courses.addRequirement', $course->id) }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addRequirementModalLabel">Add New Requirement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="requirement" class="form-label">Requirement</label>
                        <input type="text" name="requirement" id="requirement" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Requirement</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div>
                <div class="card-body">
                    <h3 class="mb-4">Description</h3>
                    <p>
                        {{ $course->description }}
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Toggle Requirements Section
    document.getElementById('toggleRequirements').addEventListener('click', function() {
        const requirementsSection = document.getElementById('requirementsSection');
        if (requirementsSection.style.display === 'none') {
            requirementsSection.style.display = 'block';
            this.innerText = 'Hide Requirements';
        } else {
            requirementsSection.style.display = 'none';
            this.innerText = 'Show Requirements';
        }
    });

    // Show Add Requirement Modal
    document.getElementById('addRequirement').addEventListener('click', function() {
        const addRequirementModal = new bootstrap.Modal(document.getElementById('addRequirementModal'));
        addRequirementModal.show();
    });
</script>

<script>
    function toggleContent() {
        const content = document.getElementById('content');
        const showMore = document.querySelector('.show-more');
        const showLess = document.querySelector('.show-less');

        // Toggle content visibility
        if (content.style.maxHeight === '300px') {
            content.style.maxHeight = 'none'; // Expand content
            showMore.style.display = 'none';
            showLess.style.display = 'inline';
        } else {
            content.style.maxHeight = '300px'; // Collapse content
            showMore.style.display = 'inline';
            showLess.style.display = 'none';
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        const card = document.getElementById("scrolling-card");
        const offsetTop = card.offsetTop; // Initial position of the card

        window.addEventListener("scroll", function() {
            const scrollY = window.scrollY;

            // Update the card's position as the user scrolls
            card.style.top = `${Math.max(250, scrollY - offsetTop + 250)}px`;
        });
    });

    $(document).ready(function() {
        $('.star').on('click', function() {
            let rating = $(this).data('value');
            let courseId = $('#star-rating').data('course-id');

            $.ajax({
                url: "{{ route('course.rate') }}", // Backend route to handle rating
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token
                    rating: rating,
                    course_id: courseId
                },
                success: function(response) {
                    alert(response.message); // Show success message
                },
                error: function(xhr) {
                    alert('Something went wrong. Please try again.');
                }
            });
        });
    });
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<style>
    .learn {
        margin-top: 7%;
    }

    .fistslider {
        background-color: black;
    }

    .fistslidersection {
        color: white;
    }

    .firsttitle {
        font-weight: 700;
    }

    .firstdescription {
        font-weight: 400;
    }

    .firstshortdescription {
        font-weight: 300;
    }

    .secondh1 {
        font-weight: 700;
        font-size: 1.8rem;
    }

    .sectiontitle {
        font-weight: 400;
        font-size: 1.5rem;
    }

    /* .fixed-card {
        position: fixed;
        top: 20%;
        right: 5%;
        z-index: 1000;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    } */
    .fixed-image-section {
        position: absolute;
        top: 180px;
        /* Adjust as per your design */
        width: 18rem;
        z-index: 1000;
        right: 150px;
        /* Make it responsive */
        transition: top 0.3s ease;
        /* Smooth transition */
    }

    .star {
        font-size: 24px;
        cursor: pointer;
        color: #ccc;
    }

    .star.filled {
        color: gold;
    }

    /* .fixed-image-section {
        position: fixed;
        top: 100px; */
    /* Adjust this value to control the offset from the top */
    /* right: 150px; */
    /* Keep the image section fixed on the right side */
    /* z-index: 1000; */
    /* Ensure it stays on top of other elements */
    /* width: 18rem; */
    /* Set a fixed width to the image section */
    /* } */

    @media (max-width: 768px) {
        .fixed-image-section {
            position: static;
            /* Disable the fixed behavior on smaller screens */
            width: auto;
            /* Make it responsive */
        }
    }
</style>

@endsection