<section id="contact" class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-center">
            Contact
        </h2>

        @php
            if (!isset($setting)) {
                try {
                    $setting = \App\Models\Setting::first();
                } catch (\Exception $e) {
                    $setting = null;
                }
            }
            $days = [
                'mon' => 'Mon',
                'tue' => 'Tue',
                'wed' => 'Wed',
                'thu' => 'Thu',
                'fri' => 'Fri',
                'sat' => 'Sat',
                'sun' => 'Sun',
            ];
        @endphp

        <div class="grid md:grid-cols-2 gap-10">

            {{-- LEFT: CONTACT INFO --}}
            <div class="space-y-4 text-gray-700">

                @if($setting?->phone)
                    <p>
                        📞 <strong>Phone:</strong>
                        <a href="tel:{{ $setting->phone }}" class="text-blue-600 hover:underline">
                            {{ $setting->phone }}
                        </a>
                    </p>
                @endif

                @if($setting?->email)
                    <p>
                        📧 <strong>Email:</strong>
                        <a href="mailto:{{ $setting->email }}" class="text-blue-600 hover:underline">
                            {{ $setting->email }}
                        </a>
                    </p>
                @endif

                @if($setting?->address)
                    <p>
                        📍 <strong>Address:</strong>
                        {{ $setting->address }}
                    </p>
                @endif

                @if($setting?->telegram)
                    <p>
                        💬 <strong>Telegram:</strong>
                        <a href="{{ $setting->telegram }}" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline">
                            {{ $setting->telegram }}
                        </a>
                    </p>
                @endif

                @if($setting?->instagram)
                    <p>
                        📸 <strong>Instagram:</strong>
                        <a href="{{ $setting->instagram }}" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline">
                            {{ $setting->instagram }}
                        </a>
                    </p>
                @endif

            </div>

            {{-- RIGHT: WORK DAYS --}}
            <div>
                <h3 class="text-xl font-semibold mb-4">
                    Working hours
                </h3>

                <ul class="space-y-2 text-gray-700">
                    @foreach($days as $key => $label)
                        @php
                            $from = $setting->work_days[$key]['from'] ?? null;
                            $to   = $setting->work_days[$key]['to'] ?? null;
                        @endphp

                        <li class="flex justify-between border-b pb-1">
                            <span>{{ $label }}</span>

                            @if($from && $to)
                                <span>{{ $from }} – {{ $to }}</span>
                            @else
                                <span class="text-gray-400">Closed</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</section>
