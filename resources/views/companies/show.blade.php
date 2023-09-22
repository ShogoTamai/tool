<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My page
        </h2>
    </x-slot>
    <div class="p-6">
        <div class="text-black py-3 px-6">
            <a href="/" class="underline text-black flex justify-end">戻る</a>
        </div>
        <form action="/companies/{{ $companies->first()->business->industry->id ?? 'default' }}" method="GET">
            @csrf
            <div class="flex items-center justify-end">
                <input type="text" name="keyword" value="{{ $keyword }}" placeholder="Search..." class="rounded-l-lg p-4 border-t border-b border-l text-gray-500 border-black-200">
                <button type="submit" class="rounded-r-lg bg-blue-600 text-white font-bold p-4 uppercase border-blue-600 border-t border-b border-r">search</button>
            </div>
        </form>
        <a href='/companies/create' class="inline-block bg-green-400 text-black font-bold py-2 px-4 rounded">create</a>
        <table class="w-full h-screen divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4 text-gray-500 text-center w-1/7">name</th>
                    <th class="p-4 text-gray-500 text-center w-1/7">upload_url</th>
                    <th class="p-4 text-gray-500 text-center w-1/7">selection</th>
                    <th class="p-4 text-gray-500 text-center w-1/7">business_name</th>
                    <th class="p-4 text-gray-500 text-center w-1/7">date</th>
                    <th class="p-4 text-gray-500 text-center w-1/7">delete</th>
                </tr>
            </thead>
            <tbody class="bg-white w-full divide-y divide-gray-300">
                @foreach ($companies as $company)
                    <tr>
                        <td class="p-4 w-1/7 whitespace-nowrap text-center">
                            <h2 class='company_name font-bold underline text-blue-500'>
                            <a href="/companies/{{ $company->id }}/edit">{{ $company->name}}</a>
                            </h2>
                        </td>
                        <td class="p-4 w-1/7 whitespace-nowrap text-center">
                            <div class='upload_url'>
                                <h2 class='company_url font-bold underline text-blue-500'>
                                    <a href="{{ $company->upload_url}}">開く</a>
                                </h2>
                            </div>
                        </td>
                        <td class="p-4 w-1/7 whitespace-nowrap text-center">
                            <div class='upload_url'>
                                <p>{{$company->status->selection}}</p>
                            </div>
                        </td>
                        <td class="p-4 w-1/7 whitespace-nowrap text-center">
                            <div class='industry'>
                                <p>{{$company->business->name}}</p>
                            </div>
                        </td>
                        <td class="p-4 w-1/7  whitespace-nowrap text-center">
                            <div class='upload_url font-bold underline text-blue-500'>
                                <a href="/calendar/{{ $company->id }}/create">
                                    @if(isset($company->calendar->start))
                                        {{ $company->calendar->start }}
                                    @else
                                        記録する
                                    @endif
                                </a>
                            </div>
                        </td>
                        <td class="p-4 w-1/7 whitespace-nowrap text-center">
                            <form action="/companies/{{ $company->id }}" id="form_{{ $company->id }}" method="post" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deleteCompany({{ $company->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">delete</button> 
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
    　　function deleteCompany(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
    　　}
　　　　</script>
　　</div>
</x-app-layout>

