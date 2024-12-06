<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>TODO App</title> -->
    <title> @yield('title')</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        :root {
            --background-color: #f8f9ff;
            --text-color: #1c1c1e;
            --header-bg-color: #0077b6;
            --sidebar-bg-color: #0096c7;
            /* --sidebar-text-color: #f0f0f5; */
        }

        /* Dark Mode Colors */
        .dark-mode {
            --background-color: #1e1e2f;
            --text-color: #eaeaea;
            --header-bg-color: #364fc7;
            /* Darker blue for dark mode */
            --sidebar-bg-color: #1e3a5f;
            --sidebar-text-color: #eaeaea;
        }

        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
            background-color: var(--background-color);
            color: var(--text-color);
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar {
            width: 250px;
            background-color: white;
            /* color: var(--sidebar-text-color); */
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            transform: transform 0.3s ease;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .sidebar.brand {
            padding: 15px;
            font-size: 1.5rem;
            text-align: center;
            background-color: var(--header-bg-color);

        }

        .brand {
            font-size: 28px;
            text-align: center;
            padding: 8px;
        }

        .sidebar .nav-link {
            color: var(--sidebar-text-color);
            padding: 15px 20px;
            transition: background-color 0.2s;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            text-decoration: none;
        }

        .main-content {
            margin-left: 250px;
            width: calc(100% - 250px);
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
            transition: margin-left 0.3s ease, width 0.3s ease;
        }


        .main-content.expanded {
            margin-left: 0;
            width: 100%;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: var(--background-color);
            color: var(--text-color);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .header .btn-group {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header .icon-btn {
            font-size: 1.5rem;
            cursor: pointer;
            background: none;
            border: none;
            color: var(--text-color);
            transition: color 0.2s;
        }

        .header .icon-btn:hover {
            color: #007bff;
        }

        .content-wrapper {
            flex-grow: 1;
            overflow-y: auto;
            padding: 20px;
        }

        .auth-links a {
            background-color: lightslategray;
        }

        svg {
            width: 20px;
            height: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
                width: calc(100% - 200px);
            }

            .main-content.expanded {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav class="sidebar" id="sidebar">
        <div class="brand">
            <!-- <img width="35" height="35" src="" > -->
            <span>Academy</span>
        </div>
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <span class="material-icons me-2">dashboard</span>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="#courseDropdown" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">
                    <span class="material-icons me-2">menu_book</span>Course
                </a>
                <ul class="collapse list-unstyled ps-4" id="courseDropdown">
                    <li class="nav-item">
                        <a href="{{route('courses.create')}}" class="nav-link">Add Course</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('courses.index')}}" class="nav-link">Manage Courses</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link">Course 3</a>
                    </li> -->
                </ul>
            </li>
            <li class="nav-item">
                <a href="#faqDropdown" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">
                    <span class="material-icons me-2">help_outline</span>FAQs
                </a>
                <ul class="collapse list-unstyled ps-4" id="faqDropdown">
                    <li class="nav-item">
                        <a href="{{route('quiz.index')}}" class="nav-link">FAQ Question</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="main-content" id="mainContent">
        <header class="header">
            <div class="btn-group">
                <button class="icon-btn" id="toggleBtn">
                    <span class="material-icons">menu</span>
                </button>
                <!-- <button class="icon-btn" id="modeBtn">
                    <span class="material-icons">dark_mode</span>
                </button> -->
            </div>
            <!-- <div class="auth-links">
                @auth
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Logout</button>
                </form>
                @endauth -->
            <div class="auth-links dropdown">
                @auth
                <button class="icon-btn dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="material-icons">account_circle</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">


                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <span class="material-icons">logout</span> Logout
                        </button>
                    </form>
                    </li>
                </ul>
                @endauth
                @guest
                <a href="{{url('login')}}" class="btn btn-outline-light me-2">Login</a>
                <a href="{{url('register')}}" class="btn btn-outline-light">Register</a>
                @endguest
            </div>
        </header>


        <div class="content-wrapper">
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}} </div>
            @endif


            @yield('content')
        </div>
    </div>


    <script>
        document.getElementById('toggleBtn').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('hidden');
            document.getElementById('mainContent').classList.toggle('expanded');
        });

        document.getElementById('modeBtn').addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            let icon = document.getElementById('modeBtn').children[0];
            icon.textContent = document.body.classList.contains('dark-mode') ? 'light_mode' : 'dark_mode';
        });
    </script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>