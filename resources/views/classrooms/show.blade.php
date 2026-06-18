<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $classroom->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-700 mb-2"><strong>Description:</strong> {{ $classroom->description ?: '—' }}</p>
                <p class="text-gray-700"><strong>Capacity:</strong> {{ $classroom->capacity }}</p>
                <div class="mt-4">
                    <a href="{{ route('classrooms.index') }}" class="text-blue-600 hover:underline">&larr; Back to classrooms</a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="font-semibold text-lg mb-3">Teachers ({{ $classroom->teachers->count() }})</h3>
                @if ($classroom->teachers->isEmpty())
                    <p class="text-gray-500">No teachers assigned to this classroom.</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Specialization</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($classroom->teachers as $teacher)
                                <tr>
                                    <td class="px-4 py-2">{{ $teacher->name }}</td>
                                    <td class="px-4 py-2">{{ $teacher->email }}</td>
                                    <td class="px-4 py-2">{{ $teacher->specialization }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="font-semibold text-lg mb-3">Students ({{ $classroom->students->count() }})</h3>
                @if ($classroom->students->isEmpty())
                    <p class="text-gray-500">No students enrolled in this classroom.</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date of Birth</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($classroom->students as $student)
                                <tr>
                                    <td class="px-4 py-2">{{ $student->name }}</td>
                                    <td class="px-4 py-2">{{ $student->birth_date->format('Y-m-d') }}</td>
                                    <td class="px-4 py-2">{{ $student->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>