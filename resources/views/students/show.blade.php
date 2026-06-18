<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $student->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-2">
                <p><strong>Date of Birth:</strong> {{ $student->birth_date->format('Y-m-d') }}</p>
                <p><strong>Email:</strong> {{ $student->email }}</p>
                <p><strong>Phone:</strong> {{ $student->phone }}</p>
                <p><strong>Classroom:</strong> {{ $student->classroom->name ?? '—' }}</p>

                <div class="mt-4">
                    <a href="{{ route('students.index') }}" class="text-blue-600 hover:underline">&larr; Back to students</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>