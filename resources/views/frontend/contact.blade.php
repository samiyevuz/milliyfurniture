@extends('frontend.layouts.app')

@section('content')

{{-- CONTACT HERO SECTION --}}
<section class="contact-hero">
    <div class="contact-hero-container">
        <h1>Aloqa</h1>
        <p>
            Biz bilan bog'laning va bizning mebel kolleksiyamiz haqida batafsil ma'lumot oling.
            Biz sizga yordam berishdan xursandmiz.
        </p>
    </div>
</section>

{{-- CONTACT CONTENT --}}
<section id="contact" class="contact-section">
    <div class="contact-container">
        @php
            try {
                $setting = \App\Models\Setting::first();
            } catch (\Exception $e) {
                $setting = null;
            }
            $days = [
                'mon' => 'Dushanba',
                'tue' => 'Seshanba',
                'wed' => 'Chorshanba',
                'thu' => 'Payshanba',
                'fri' => 'Juma',
                'sat' => 'Shanba',
                'sun' => 'Yakshanba',
            ];
        @endphp

        <div class="contact-grid">
            {{-- LEFT: CONTACT INFO CARDS --}}
            <div class="contact-info-section">
                <h2 class="contact-section-title">Biz bilan bog'laning</h2>
                <p class="contact-section-subtitle">
                    Quyidagi usullar orqali biz bilan bog'lanishingiz mumkin
                </p>

                <div class="contact-cards">
                    @if($setting?->phone)
                        <div class="contact-card">
                            <div class="contact-card-icon phone-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                </svg>
                            </div>
                            <div class="contact-card-content">
                                <h3>Telefon</h3>
                                <a href="tel:{{ $setting->phone }}" class="contact-link">
                                    {{ $setting->phone }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if($setting?->email)
                        <div class="contact-card">
                            <div class="contact-card-icon email-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                    <polyline points="22,6 12,13 2,6"/>
                                </svg>
                            </div>
                            <div class="contact-card-content">
                                <h3>Elektron pochta</h3>
                                <a href="mailto:{{ $setting->email }}" class="contact-link">
                                    {{ $setting->email }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if($setting?->address)
                        <div class="contact-card">
                            <div class="contact-card-icon address-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                            </div>
                            <div class="contact-card-content">
                                <h3>Manzil</h3>
                                <p class="contact-text">{{ $setting->address }}</p>
                            </div>
                        </div>
                    @endif

                    @if($setting?->telegram)
                        <div class="contact-card">
                            <div class="contact-card-icon telegram-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.562 8.161l-1.87 8.816c-.139.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.12l-6.87 4.326-2.96-.924c-.64-.203-.658-.64.135-.954l11.566-4.458c.538-.196 1.006.128.832.941z"/>
                                </svg>
                            </div>
                            <div class="contact-card-content">
                                <h3>Telegram</h3>
                                <a href="{{ $setting->telegram }}" target="_blank" rel="noopener noreferrer" class="contact-link">
                                    Telegram kanalimiz
                                </a>
                            </div>
                        </div>
                    @endif

                    @if($setting?->instagram)
                        <div class="contact-card">
                            <div class="contact-card-icon instagram-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </div>
                            <div class="contact-card-content">
                                <h3>Instagram</h3>
                                <a href="{{ $setting->instagram }}" target="_blank" rel="noopener noreferrer" class="contact-link">
                                    Instagram sahifamiz
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- RIGHT: WORKING HOURS --}}
            <div class="working-hours-section">
                <div class="working-hours-card">
                    <h2 class="contact-section-title">Ish vaqti</h2>
                    <p class="contact-section-subtitle">
                        Bizning ish vaqtimiz
                    </p>

                    <div class="working-hours-list">
                        @foreach($days as $key => $label)
                            @php
                                $from = $setting->work_days[$key]['from'] ?? null;
                                $to   = $setting->work_days[$key]['to'] ?? null;
                            @endphp

                            <div class="working-hours-item">
                                <span class="day-name">{{ $label }}</span>
                                <div class="hours-info">
                                    @if($from && $to)
                                        <span class="hours-time">{{ $from }} – {{ $to }}</span>
                                    @else
                                        <span class="hours-closed">Yopiq</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection