<?php

namespace App\Livewire\Schedule;

use App\Models\Schedule;
use App\Models\User;
use Carbon\CarbonImmutable;
use Livewire\Component;

class Index extends Component
{
    // 選択中のユーザーID
    public array $selectedUserIds = [];

    // calendar events (used by Blade @json)
    public array $events = [];

    protected $listeners = ['refreshCalendar'];

    public function mount(): void
    {
        // 初期状態では全ユーザー選択
        $this->selectedUserIds = User::pluck('id')->toArray();

        // 初期イベント取得
        $this->loadEvents();
    }

    public function updatedSelectedUserIds(): void
    {
        $this->loadEvents();
        $this->dispatchBrowserEvent('refreshCalendar');
    }

    private function loadEvents(): void
    {
        $this->events = Schedule::query()
            ->whereIn('user_id', $this->selectedUserIds)
            ->get()
            ->map(fn ($schedule) => [
                'title' => $schedule->title,
                'start' => $schedule->day . 'T' . $schedule->start,
                'end'   => $schedule->day . 'T' . $schedule->end,
            ])
            ->toArray();
    }

    public function render()
    {
        return view('livewire.schedule.index', [
            'users'  => User::all(),
            'events' => $this->events,
        ])->extends('adminlte::page')->section('content');
    }

    // ✅ 以下は将来 resource view / timeline 用（今はOK）
    public function getEvents($start, $end): array
    {
        $range = [
            CarbonImmutable::create($start)->format('Y-m-d'),
            CarbonImmutable::create($end)->format('Y-m-d'),
        ];

        return Schedule::query()
            ->whereIn('user_id', $this->selectedUserIds)
            ->whereBetween('day', $range)
            ->get()
            ->map(fn ($schedule) => [
                'title' => $schedule->title,
                'start' => CarbonImmutable::parse($schedule->day.' '.$schedule->start)->format('c'),
                'end'   => CarbonImmutable::parse($schedule->day.' '.$schedule->end)->format('c'),
            ])
            ->toArray();
    }

    public function refreshCalendar(): void
    {
        $this->dispatchBrowserEvent('refreshCalendar');
    }
}
