@extends('user.userapp')
@section('content')

<div class="p-4 shadow">
    <div class="row align-items-center">
        <!-- Text Section -->
        <div class="col-md-6 d-flex flex-column justify-content-center bg-light  ">
            <h1 class="display-4">Laravel Developer</h1>
            <p class="lead">Enhance your skills with Laravel development. Learn to build robust and scalable applications.</p>
        </div>
        <!-- Image Section -->
        <div class="col-md-6">
            <img src="https://via.placeholder.com/600x400" class="img-fluid rounded" alt="Laravel Developer">
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
                    <h1 class="mb-4">What You'll Learn</h1>

                    <!-- Collapsible Content -->
                    <div id="content" class="collapsed-content" style="max-height: 300px; overflow: hidden;">
                        <div class="row">
                            <!-- First Column -->
                            <div class="col-md-6">
                                <p class="card-text"><i class="fa fa-check" aria-hidden="true"></i> ChatGPT : Create content, synthesize information, and learn faster than ever with effective prompt engineering!</p>
                                <p class="card-text"><i class="fa fa-check" aria-hidden="true"></i> Marketing : Generate targeted content with ChatGPT, capitalize on trends, create ads, newsletters, and media campaigns!</p>
                                <p class="card-text"><i class="fa fa-check" aria-hidden="true"></i> Soft Skills : Improve your communication, leadership, problem-solving, and social skills with personalized ChatGPT feedback!</p>
                                <p class="card-text"><i class="fa fa-check" aria-hidden="true"></i> AI Video Tools: Create an AI avatar that transforms scripts into presentations and quickly generate social media content!</p>
                                <p class="card-text"><i class="fa fa-check" aria-hidden="true"></i> AI Writing Tools: Automate writing tasks, generate effective copy, and integrate with Google Sheets/Excel!</p>
                                <p class="card-text"><i class="fa fa-check" aria-hidden="true"></i> Branding : Develop a visual identity, design logos, and generate content to establish a strong online presence!</p>
                            </div>
                            <!-- Second Column -->
                            <div class="col-md-6">
                                <p class="card-text"><i class="fa fa-check" aria-hidden="true"></i> Business : Streamline your workflow, automate repetitive tasks, and gain insights that help you make data-driven decisions for your business!</p>
                                <p class="card-text"><i class="fa fa-check" aria-hidden="true"></i> Midjourney : Use prompts, parameters, and modifiers to create amazing images that showcase your personal style and creativity!</p>
                                <p class="card-text"><i class="fa fa-check" aria-hidden="true"></i> DALL-E 3 : Create amazing photos from prompts, fill in or remove elements of images using inpainting and outpainting techniques!</p>
                                <p class="card-text"><i class="fa fa-check" aria-hidden="true"></i> Multimodal : Achieve your goals faster with ChatGPT, manage your time, prioritize tasks, and create an optimized daily schedule!</p>
                                <p class="card-text"><i class="fa fa-check" aria-hidden="true"></i> Productivity : Achieve your goals faster with ChatGPT, manage your time, prioritize tasks, and create an optimized daily schedule!</p>
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
                </div>
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
                        <p><i class="fa fa-video" aria-hidden="true"></i> 28 hours on-demand video</p>
                        <p><i class="fa fa-newspaper" aria-hidden="true"></i> 21 articles</p>
                        <p><i class="fa fa-download" aria-hidden="true"></i> 19 downloadable resources</p>
                        <p><i class="fa fa-mobile" aria-hidden="true"></i> Access on mobile and TV</p>
                    </div>

                    <!-- Second Column -->
                    <div class="col-md-6">
                        <p><i class="fa fa-closed-captioning" aria-hidden="true"></i> Closed captions</p>
                        <p><i class="fa fa-headphones" aria-hidden="true"></i> Audio description in existing audio</p>
                        <p><i class="fa fa-certificate" aria-hidden="true"></i> Certificate of completion</p>
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

                    <!-- ChatGPT Complete Guide Introduction -->

                    <div class="card-body">
                        <h4>ChatGPT Complete Guide Introduction</h4>

                        <!-- Collapsible Content for Introduction -->
                        <div id="introContent" class="collapsed-content" style="max-height: 200px; overflow: hidden;">
                            <p><i class="fa fa-info-circle" aria-hidden="true"></i> This introduction welcomes students to the "Complete AI Guide to 10x Your Productivity and Creativity" course, created in collaboration with Leap Year Learning. It emphasizes the value of research in saving time and underscores the course's aim to teach the most powerful AI tools for personal and professional projects.</p>
                            <p><i class="fa fa-info-circle" aria-hidden="true"></i> Students will gain confidence and expertise in using rapidly evolving AI tools, with the course serving as a continually updated resource. The walkthrough covers course content, including sections on ChatGPT fundamentals and prompt engineering.</p>
                            <p><i class="fa fa-info-circle" aria-hidden="true"></i> AI Topic: ChatGPT for Personal & Professional Growth</p>
                            <p><i class="fa fa-info-circle" aria-hidden="true"></i> Intended Learners: Professionals, Students, AI Enthusiasts</p>
                            <p><i class="fa fa-info-circle" aria-hidden="true"></i> Overall Lesson Theme: Introduction to a Comprehensive AI Productivity Course</p>
                            <p><i class="fa fa-info-circle" aria-hidden="true"></i> Specific Skills Learned: Understanding course objectives, Learning about AI tools for productivity</p>
                            <p><i class="fa fa-info-circle" aria-hidden="true"></i> Actionable Skill Acquired By End of Lesson: Ability to effectively use AI tools to enhance productivity</p>
                            <p><i class="fa fa-info-circle" aria-hidden="true"></i> AI Tool Being Used: ChatGPT</p>
                        </div>

                        <!-- Show More/Less Button -->
                        <!-- <div class="text-left mt-3">
                            <span class="show-more-module--show-more--ObEu7" onclick="toggleContent('introContent')">
                                Show more <i class="fas fa-chevron-down me-2"></i>
                            </span>
                            <span class="show-more-module--show-less--jkOoQ" onclick="toggleContent('introContent')" style="display: none;">
                                Show less <i class="fas fa-chevron-up me-2"></i>
                            </span>
                        </div> -->

                    </div>
                </div>
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
                    <p>
                        <i class="fa fa-circle" aria-hidden="true" style="font-size: 10px; margin-right: 8px;"></i> No prior experience with AI or programming is needed, but an eagerness to learn and explore new technologies is a plus!
                    </p>
                </div>
            </div>
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
                        Have you heard about the amazing things people and businesses are doing with AI but you don’t know where to start?
                    </p>
                    <p>Are you ready to instantly create AI integrations, workflow automations, video scripts, presentations, online courses, targeted ads, social media posts, newsletters, podcasts, project outlines, E-books, personalized emails, job proposals, articles, lesson plans, language translations, SEO keywords, meal plans, custom schedules, summaries, startup ideas, market insights, mock interviews, personal bio's, essays, quizzes, E-commerce copy, content ideas, to-do lists, branding guidelines, financial plans, company slogans, contracts, creative stories, blogs, code,
                        business plans, song lyrics, resumes, cover letters, tutorials, reviews, product descriptions, advertisements, and marketing campaigns?</p>
                </div>
            </div>
        </div>
    </div>
</div>

@if(isset($course))
<div class="course-detail">
    <h2>{{ $course->title }}</h2>
    <p>{{ $course->description }}</p>
    <p>Category: {{ $course->category->name }}</p> <!-- Display category name -->
    <p>Price: ${{ $course->price }}</p>
</div>
@else
<p>Course details not found.</p>
@endif




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
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    .learn {
        margin-top: 7%;
    }
</style>
@endsection