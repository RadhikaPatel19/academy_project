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
        <!-- Card 1 -->
        @if(isset($course) && $course->isNotEmpty())
        @foreach ($course as $courses)
        <div class="col-md-3">
            <div class="card">
                <img src="{{ $courses->thumbnail_image && file_exists(storage_path('app/public/' . $courses->thumbnail_image)) 
    ? asset('storage/' . $courses->thumbnail_image) 
    : 'https://via.placeholder.com/300' }}"
                    class="card-img-top"
                    alt="{{ $courses->title }}"
                    class="card-img-top"
                    alt="{{ $courses->title }}">


                <a href="{{ route('user.details', ['id' => $courses->id]) }}" class="text-decoration-none">
                    <div class="card-body">
                        <h6 class="card-title">{{ $courses->title }}</h6>
                        <p class="text-warning mb-1">★★★★★</p>
                        <p class="card-text">${{ $courses->price }}</p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        @elseif(isset($courses))
        <!-- Display single courses -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <img src="{{ $courses->thumbnail_image && file_exists(storage_path('app/public/' . $courses->thumbnail_image)) 
    ? asset('storage/' . $courses->thumbnail_image) 
    : 'https://via.placeholder.com/300' }}"
                        class="card-img-top"
                        alt="{{ $courses->title }}">
                    class="card-img-top"
                    alt="{{ $courses->title }}">
                    <h6 class="card-title">{{ $courses->title }}</h6>
                    <p class="text-warning mb-1">★★★★★</p>
                    <p class="card-text">${{ $courses->price }}</p>
                    <p class="card-text">{{ $courses->description }}</p>
                </div>
            </div>
        </div>
        @else
        <p>No courses available.</p>
        @endif

        <!-- Card 2-->
        <!-- <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h6 class="card-title">Smartphone Case</h6>
                        <p class="text-warning mb-1">
                            ★★★★★
                        </p>
                        <p class="card-text">$15.00</p>
                        <button class="btn btn-primary add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div> -->

        <!-- Card 3 -->
        <!-- <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h6 class="card-title">Bluetooth Speaker</h6>
                        <p class="text-warning mb-1">
                            ★★★★★
                        </p>
                        <p class="card-text">$45.00</p>
                        <button class="btn btn-primary add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div> -->

        <!-- Card 4 -->
        <!-- <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h6 class="card-title">Portable Charger</h6>
                        <p class="text-warning mb-1">
                            ★★★★★
                        </p>
                        <p class="card-text">$30.00</p>
                        <button class="btn btn-primary add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div> -->
    </div>
</div>




@endsection