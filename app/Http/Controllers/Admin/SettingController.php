<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class SettingController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index(): View
    {
        $setting = Setting::getSetting();
        return view('admin.settings.index', compact('setting'));
    }

    /**
     * Update the settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:500',
            'telegram' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'work_days' => 'nullable|array',
            'work_days.*.from' => 'nullable|string|max:10',
            'work_days.*.to' => 'nullable|string|max:10',
        ]);

        $setting = Setting::getSetting();

        // Prepare work_days data
        $workDays = [];
        $days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
        
        foreach ($days as $day) {
            $workDays[$day] = [
                'from' => $request->input("work_days.{$day}.from", null),
                'to' => $request->input("work_days.{$day}.to", null),
            ];
        }

        $setting->update([
            'phone' => $validated['phone'] ?? '',
            'email' => $validated['email'] ?? '',
            'address' => $validated['address'] ?? '',
            'telegram' => $validated['telegram'] ?? '',
            'instagram' => $validated['instagram'] ?? '',
            'work_days' => $workDays,
        ]);

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Settings updated successfully');
    }
}
