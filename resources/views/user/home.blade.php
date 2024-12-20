@extends('user.userapp')

@section('content')


<div id="slider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/fist.jpg" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="images/second.jpg" class="d-block w-100" alt="Slide 2">
        </div>
        <!-- <div class="carousel-item">
                <img src="https://via.placeholder.com/1920x600" class="d-block w-100" alt="Slide 3">
            </div> -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container my-5">
    <div class="row">
        @foreach ($courses as $course)
        <div class="col-md-3" style="padding-bottom: 12px;">
            <div class="card">
                <img src="{{ $course->thumbnail_image && file_exists(storage_path('app/public/' . $course->thumbnail_image)) 
                        ? asset('storage/' . $course->thumbnail_image) 
                        : 'https://via.placeholder.com/300' }}"
                    class="card-img-top fixed-thumbnail"
                    alt="{{ $course->title }}">

                <a href="{{ route('user.details', ['id' => $course->id]) }}" class="text-decoration-none">

                    <div class="card-body">
                        <h6 class="card-title">{{ $course->title }}</h6>
                        <p class="text-warning mb-1">
                            @php
                            // Get the full and half star count based on the average rating
                            $fullStars = floor($course->averageRating);
                            $halfStar = ($course->averageRating - $fullStars >= 0.5) ? 1 : 0;
                            @endphp

                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <=$fullStars)
                                ★
                                @elseif ($halfStar && $i==$fullStars + 1)
                                ☆
                                @php $halfStar=0; @endphp
                                @else
                                ☆
                                @endif
                                @endfor
                                </p>
                                <p class="card-text">${{ $course->price }}</p>

                                <!-- Show category name -->
                                @if($course->category)
                                <p class="text-muted">{{ $course->category->name }}</p>
                                @else
                                <p class="text-muted">No category available</p>
                                @endif
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

</div>
</div>


<style>
    .fixed-thumbnail {
        width: 100%;
        /* Make the image responsive to container size */
        height: 200px;
        /* Fixed height for all images */
        object-fit: cover;
        /* Ensures the image covers the box without distortion */
        /* object-position: center; */
        /* Centers the image inside the container */
    }
</style>

@endsection