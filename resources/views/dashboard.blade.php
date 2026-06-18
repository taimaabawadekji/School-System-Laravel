<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
        <h2 class="text-sm text-gray-600 mt-1">
        Welcome {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Classrooms</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['classrooms'] }}</p>
                    <a href="{{ route('classrooms.index') }}"
                        class="inline-flex items-center justify-center h-9 px-3 mt-3 bg-gray-800 text-white text-xs font-semibold uppercase tracking-widest rounded-md hover:bg-gray-700">
                        View all &rarr;
                    </a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Students</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['students'] }}</p>
                    <a href="{{ route('students.index') }}"
                        class="inline-flex items-center justify-center h-9 px-3 mt-3 bg-gray-800 text-white text-xs font-semibold uppercase tracking-widest rounded-md hover:bg-gray-700">
                        View all &rarr;
                    </a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Teachers</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['teachers'] }}</p>
                    <a href="{{ route('teachers.index') }}"
                        class="inline-flex items-center justify-center h-9 px-3 mt-3 bg-gray-800 text-white text-xs font-semibold uppercase tracking-widest rounded-md hover:bg-gray-700">
                        View all &rarr;
                    </a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-lg text-gray-800">Recent Classrooms</h3>
                    <a href="{{ route('classrooms.create') }}" class="text-sm text-gray-600 hover:underline">
                        + Add Classroom
                    </a>
                </div>

                @if ($recentClassrooms->isEmpty())
                    <p class="text-gray-500">No classrooms yet. Add your first one to get started.</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Capacity</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Students</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Teachers</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($recentClassrooms as $classroom)
                                <tr>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('classrooms.show', $classroom) }}" class="text-blue-600 hover:underline">
                                            {{ $classroom->name }}
                                        </a>
                                    </td>
                                    <td class="px-4 py-2">{{ $classroom->capacity }}</td>
                                    <td class="px-4 py-2">{{ $classroom->students_count }}</td>
                                    <td class="px-4 py-2">{{ $classroom->teachers_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>