<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $teacher->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-2">
                <p><strong>Email:</strong> {{ $teacher->email }}</p>
                <p><strong>Phone:</strong> {{ $teacher->phone }}</p>
                <p><strong>Specialization:</strong> {{ $teacher->specialization }}</p>
                <p><strong>Classroom:</strong> {{ $teacher->classroom->name ?? '—' }}</p>

                <div class="mt-4">
                    <a href="{{ route('teachers.index') }}" class="text-blue-600 hover:underline">&larr; Back to teachers</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>