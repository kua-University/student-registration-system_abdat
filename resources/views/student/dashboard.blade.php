@extends('layouts.app')

@section('content')
<body class="bg-gradient-to-br from-purple-700 via-indigo-800 to-gray-900 text-gray-100 font-sans antialiased">

    <!-- Header Section -->
    <header class="bg-gray-900 bg-opacity-90 py-6 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div class="logo">
                <h1 class="text-3xl font-bold text-yellow-400">Student Dashboard</h1>
            </div>
            <nav class="nav">
                <ul class="flex space-x-6 items-center">
                    <li><a href="{{ route('logout') }}" class="text-lg text-gray-200 hover:text-yellow-300 transition duration-200">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Section -->
    <main class="py-16">
        <div class="container mx-auto px-6">

            <!-- Overview Widgets Section -->
            <section class="max-w-3xl mx-auto grid grid-cols-1 gap-8 mb-16">

            <div class="overview-widget bg-purple-500 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 cursor-pointer transform hover:scale-105 w-full">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Enrolled Courses</h3>
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg overflow-x-auto">
                        
                        <table class="min-w-full table-auto text-left">
                            <thead>
                                <tr>
                                    <th class="text-indigo-400 py-3 px-6">Name</th>
                                    <th class="text-indigo-400 py-3 px-6">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enrolledCourses as $enrollment)
                                    <tr class="border-t border-gray-700">
                                        <td class="py-3 px-6">{{ $enrollment->course->name }}</td>
                                        <td class="py-3 px-6">{{ Str::limit($enrollment->course->description, 50) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="overview-widget bg-purple-500 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 cursor-pointer transform hover:scale-105 w-full">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Available Courses</h3>
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg overflow-x-auto">
                        <table class="min-w-full table-auto text-left">
                            <thead>
                                <tr>
                                    <th class="text-indigo-400 py-3 px-6">Name</th>
                                    <th class="text-indigo-400 py-3 px-6">Description</th>
                                    <th class="text-indigo-400 py-3 px-6">Fee</th>
                                    <th class="text-indigo-400 py-3 px-6"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($addCourses as $course)
                                    <tr class="border-t border-gray-700">
                                        <td class="py-3 px-6">{{ $course->name }}</td>
                                        <td class="py-3 px-6">{{ Str::limit($course->description, 50) }}</td>
                                        <td class="py-3 px-6">
                                            @if($course->courseFee)
                                                ${{ number_format($course->courseFee->amount / 2, 2) }}
                                            @else
                                                Not set
                                            @endif
                                        </td>
                                        <td class="py-3 px-6">
                                            <!-- Enroll Button -->
                                            <form action="{{ route('student.enroll', $course->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="bg-indigo-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-indigo-600 transition duration-200">Add</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>

        </div>
    </main>

</body>
@endsection
