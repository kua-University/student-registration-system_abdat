@extends('layouts.app')

@section('content')
<body class="bg-gradient-to-br from-blue-700 via-purple-800 to-gray-900 text-gray-100 font-sans antialiased">

    <!-- Header Section -->
    <header class="bg-gray-900 bg-opacity-75 py-6 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div class="logo">
                <h1 class="text-3xl font-bold text-yellow-400">Student Dashboard</h1>
            </div>
            <nav class="nav">
                <ul class="flex space-x-6">
                    <li class="text-lg text-gray-200">Welcome, {{ Auth::user()->name }}</li>
                    <li><a href="{{ route('logout') }}" class="text-lg text-gray-200 hover:text-yellow-300 transition duration-200">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Section -->
    <main class="py-16">
        <div class="container mx-auto px-6">
            <section class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 mb-16">
                
                <!-- Enrolled Courses Widget -->
                <div class="overview-widget bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 cursor-pointer transform hover:scale-105 w-full h-40" onclick="window.location='{{ route('student.enrolled-courses') }}'">
                    <h3 class="text-2xl font-semibold text-yellow-400 mb-4">Enrolled Courses</h3>
                    <p class="text-gray-300 text-3xl font-bold">{{ $enrolledCourses->count() ?? '0' }}</p>
                </div>

                <!-- Available Courses Widget -->
                <div class="overview-widget bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 cursor-pointer transform hover:scale-105 w-full h-40" onclick="window.location='{{ route('student.available-courses') }}'">
                    <h3 class="text-2xl font-semibold text-yellow-400 mb-4">Available Courses</h3>
                    <p class="text-gray-300 text-3xl font-bold">{{ $availableCourses->count() ?? '0' }}</p>
                </div>

            </section>
        </div>
    </main>

</body>
@endsection
