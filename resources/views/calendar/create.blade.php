<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My page
        </h2>
    </x-slot>
    <p class="font-bold text-xl">{{ $company->name }}</p>
    <form action="/calendar" method="POST">
        @csrf
        <input type="hidden" name="calendar[companyId]" value="{{$company->id}}">
        <label>予定開始時刻
            <input type="date" name="calendar[start]">
            @if ($errors->has('calendar.start'))
                <p class="start_error" style="color:red">{{ $errors->first('calendar.start') }}</p>
            @endif
        </label>
        <label>予定終了時刻
            <input type="date" name="calendar[end]">
            @if ($errors->has('calendar.end'))
                <p class="end_error" style="color:red">{{ $errors->first('calendar.end') }}</p>
            @endif
        </label>
        <input type="submit" value="記録する">
    </form>
     <a href="/companies/{{$company->business->industry->id}}" class="underline text-black">戻る</a>
</x-app-layout>