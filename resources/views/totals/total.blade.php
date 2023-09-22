<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Total
        </h2>
    </x-slot>
    <div class="p-6">
        <p class="underline text-black text-lg mb-4 font-bold">企業数: {{ $company_count }}</p>
        <table class="table-auto w-full divide-y divide-gray-300">
            <thead class="bg-red-100">
                <tr>
                    <th class="px-4 py-2 border border-red-500">Status</th>
                    <th class="px-4 py-2 border border-red-500">Count</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-500">
                @foreach ($selection_counts as $status_id => $selection_count)
                    @php
                        $company = $companies->firstWhere('status_id', $status_id);
                    @endphp
                    @if($company && $company->status)
                        <tr>
                            <td class="border border-red-500 px-4 py-2">{{ $company->status->selection }}</td>
                            <td class="border border-red-500 px-4 py-2">{{ $selection_count }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
