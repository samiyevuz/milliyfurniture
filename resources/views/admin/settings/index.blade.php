@extends('admin.layouts.app')

@section('page-title', 'Sozlamalar')

@section('content')
<div class="max-w-4xl">
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Sozlamalar</h1>

    <form method="POST" action="{{ route('admin.settings.update') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        @csrf

        <div class="space-y-6">
            {{-- Contact Information --}}
            <div>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Aloqa ma'lumotlari</h2>
                
                <div class="space-y-4">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Telefon
                        </label>
                        <input type="text"
                               id="phone"
                               name="phone"
                               value="{{ old('phone', $setting->phone ?? '') }}"
                               class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition"
                               placeholder="+998901234567">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Elektron pochta
                        </label>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email', $setting->email ?? '') }}"
                               class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition"
                               placeholder="info@example.com">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                            Manzil
                        </label>
                        <textarea id="address"
                                  name="address"
                                  rows="2"
                                  class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition"
                                  placeholder="Manzilingiz">{{ old('address', $setting->address ?? '') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Social Media --}}
            <div>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Ijtimoiy tarmoqlar</h2>
                
                <div class="space-y-4">
                    <div>
                        <label for="telegram" class="block text-sm font-medium text-gray-700 mb-2">
                            Telegram URL
                        </label>
                        <input type="url"
                               id="telegram"
                               name="telegram"
                               value="{{ old('telegram', $setting->telegram ?? '') }}"
                               class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition"
                               placeholder="https://t.me/username">
                        @error('telegram')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="instagram" class="block text-sm font-medium text-gray-700 mb-2">
                            Instagram URL
                        </label>
                        <input type="url"
                               id="instagram"
                               name="instagram"
                               value="{{ old('instagram', $setting->instagram ?? '') }}"
                               class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition"
                               placeholder="https://instagram.com/username">
                        @error('instagram')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Working Hours --}}
            <div>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Ish vaqti</h2>
                
                <div class="space-y-3">
                    @php
                        $days = [
                            'mon' => 'Dushanba',
                            'tue' => 'Seshanba',
                            'wed' => 'Chorshanba',
                            'thu' => 'Payshanba',
                            'fri' => 'Juma',
                            'sat' => 'Shanba',
                            'sun' => 'Yakshanba',
                        ];
                        $workDays = $setting->work_days ?? [];
                    @endphp

                    @foreach($days as $key => $label)
                        <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-lg">
                            <div class="w-24">
                                <label class="text-sm font-medium text-gray-700">{{ $label }}</label>
                            </div>
                            <div class="flex-1 flex items-center space-x-2">
                                <input type="text"
                                       name="work_days[{{ $key }}][from]"
                                       value="{{ old("work_days.{$key}.from", $workDays[$key]['from'] ?? '') }}"
                                       class="w-24 px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition"
                                       placeholder="09:00">
                                <span class="text-gray-500">–</span>
                                <input type="text"
                                       name="work_days[{{ $key }}][to]"
                                       value="{{ old("work_days.{$key}.to", $workDays[$key]['to'] ?? '') }}"
                                       class="w-24 px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition"
                                       placeholder="18:00">
                                <span class="text-xs text-gray-500">(Yopiq uchun bo'sh qoldiring)</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-8 flex items-center space-x-4">
            <button type="submit"
                    class="bg-[#0A4C8A] text-white px-6 py-2.5 rounded-lg hover:bg-[#083b6b] transition font-medium">
                Saqlash
            </button>
        </div>
    </form>
</div>
@endsection
