@extends('layouts.app')

@section('content')
    <body class="bg-gradient-to-br from-blue-700 via-purple-800 to-gray-900 text-gray-100 font-sans antialiased">

        <!-- Header Section -->
        <header class="bg-gray-900 bg-opacity-75 py-6 shadow-lg">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div class="logo">
                    <h1 class="text-3xl font-bold text-yellow-400">Goat Academy</h1>
                </div>
                <nav class="nav">
                    <ul class="flex space-x-6">
                        <li><a href="{{ route('login') }}" class="text-lg text-gray-200 hover:text-yellow-300 transition duration-200">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-lg text-gray-200 hover:text-yellow-300 transition duration-200">Register</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Main Section -->
        <main class="py-16">
            <div class="container mx-auto px-6">
                <section class="intro text-center mb-16">
                    <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                        This is a registration system for students to register, enroll in courses, and handle payments efficiently!
                    </p>
                </section>
            </div>
        </main>

    </body>
@endsection
