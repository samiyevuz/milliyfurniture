@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 space-y-6">

    <h1 class="text-3xl font-bold">Contact</h1>

    {{-- BASIC INFO --}}
    <div class="space-y-2">
        @if($setting?->phone)
            <p><strong>Phone:</strong> {{ $setting->phone }}</p>
        @endif

        @if($setting?->email)
            <p><strong>Email:</strong> {{ $setting->email }}</p>
        @endif

        @if($setting?->address)
            <p><strong>Address:</strong> {{ $setting->address }}</p>
        @endif
    </div>

    {{-- WORK DAYS --}}
    @if($setting?->work_days)
        <div>
            <h2 class="text-xl font-semibold mt-4 mb-2">Working hours</h2>

            <ul class="space-y-1">
                @foreach($setting->work_days as $day => $time)
                    <li>
                        <strong>{{ ucfirst($day) }}:</strong>
                        @if(!empty($time['from']) && !empty($time['to']))
                            {{ $time['from'] }} – {{ $time['to'] }}
                        @else
                            Closed
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- SOCIAL --}}
    <div class="flex gap-4 mt-4">
        @if($setting?->telegram)
            <a href="{{ $setting->telegram }}" target="_blank" class="text-blue-600">
                Telegram
            </a>
        @endif

        @if($setting?->instagram)
            <a href="{{ $setting->instagram }}" target="_blank" class="text-pink-600">
                Instagram
            </a>
        @endif
    </div>

</div>
@endsection
