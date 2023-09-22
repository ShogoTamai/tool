<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My page
        </h2>
    </x-slot>
    <a href='/companies/create' class="inline-block bg-green-400 text-black font-bold py-2 px-4 rounded mb-4">create</a>
    <div class="space-y-8">
        @foreach($industries as $industry)
            <a href="/companies/{{$industry->id}}" class="block text-center text-2xl bg-blue-100 border border-blue-500 text-black font-bold py-2 px-4 rounded">
                {{ $industry->name }}
            </a>
        @endforeach
    </div>
</x-app-layout>

