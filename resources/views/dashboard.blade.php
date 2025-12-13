<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href='/laravel-booking-app/public/rooms'>会議室</a>
        <a href='/laravel-booking-app/public/schedules/index'>予約する</a>
        <a href='/laravel-booking-app/public/schedules/index'>予約一覧</a>
    </div>
</x-app-layout>
