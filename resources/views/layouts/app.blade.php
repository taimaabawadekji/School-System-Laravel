<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <div x-data="{ sidebarOpen: true }" class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <div class="flex">
            {{-- Sidebar: width animates between collapsed (icon rail) and expanded --}}
            <aside
                :class="sidebarOpen ? 'w-56' : 'w-16'"
                class="bg-gray-900 text-gray-300 min-h-[calc(100vh-4rem)] transition-all duration-200 flex flex-col">
                {{-- Toggle button lives inside the sidebar, top --}}
                <div class="p-3 flex" :class="sidebarOpen ? 'justify-end' : 'justify-center'">
                    <button
                        @click="sidebarOpen = !sidebarOpen"
                        class="p-2 rounded-md hover:bg-gray-800"
                        title="Toggle sidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="16" rx="2" />
                            <line x1="9" y1="4" x2="9" y2="20" />
                        </svg>
                    </button>
                </div>
                <nav class="px-2 space-y-1">
                    <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800' }}"
                    title="Dashboard">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                        </svg>
                        <span x-show="sidebarOpen" x-transition class="whitespace-nowrap">Dashboard</span>
                    </a>

                    <a href="{{ route('classrooms.index') }}"
                        class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('classrooms.*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800' }}"
                        title="Classrooms">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 0 0-.491 6.347A48.627 48.627 0 0 1 12 20.904a48.627 48.627 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.57 50.57 0 0 0-2.658-.813A59.905 59.905 0 0 1 12 3.493a59.902 59.902 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                        <span x-show="sidebarOpen" x-transition class="whitespace-nowrap">Classrooms</span>
                    </a>

                    <a href="{{ route('teachers.index') }}"
                        class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('teachers.*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800' }}"
                        title="Teachers">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5h15M4.5 19.5V12a3 3 0 0 1 3-3h9a3 3 0 0 1 3 3v7.5M4.5 19.5H3m16.5 0H21m-9-15a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                        </svg>
                        <span x-show="sidebarOpen" x-transition class="whitespace-nowrap">Teachers</span>
                    </a>

                    <a href="{{ route('students.index') }}"
                        class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('students.*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800' }}"
                        title="Students">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 0 0-.491 6.347A48.627 48.627 0 0 1 12 20.904a48.627 48.627 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347M12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                        </svg>
                        <span x-show="sidebarOpen" x-transition class="whitespace-nowrap">Students</span>
                    </a>
                </nav>
            </aside>

            {{-- Main content column --}}
            <div class="flex-1 min-w-0">

                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</html>
