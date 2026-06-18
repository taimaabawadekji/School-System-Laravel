<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 antialiased">

    <div class="min-h-screen flex flex-col items-center justify-center px-4">

        <div class="text-center max-w-xl">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                School Management System
            </h1>
            <p class="text-gray-600 mb-8">
                Manage classrooms, students, and teachers all in one place.
                Track enrollments, assign teachers to classes, and keep your
                school's records organized.
            </p>

            <div class="flex items-center justify-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="px-6 py-3 bg-gray-800 text-white rounded-md font-semibold text-sm hover:bg-gray-700">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-6 py-3 bg-gray-800 text-white rounded-md font-semibold text-sm hover:bg-gray-700">
                        Log in
                    </a>
                    <a href="{{ route('register') }}"
                       class="px-6 py-3 bg-white text-gray-800 border border-gray-300 rounded-md font-semibold text-sm hover:bg-gray-50">
                        Register
                    </a>
                @endauth
            </div>
        </div>

    </div>

</body>
</html>