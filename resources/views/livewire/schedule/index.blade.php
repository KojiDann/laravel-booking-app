    <x-adminlte-card>
        <div class="d-flex">
            <div class="mr-auto d-flex align-items-center justify-content-center">
                <h4>スケジュール</h4>
            </div>
            <div class="d-flex">
                <div class="mr-2 dropdown" wire:ignore>
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ユーザーフィルター
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        @foreach($users as $user)
                            <div class="dropdown-item">
                                <div class="icheck-info">
                                    <input type="checkbox" id="filter_user_{{ $user->id }}"
                                           name="selectStoreIds" value="{{ $user->id }}"
                                           wire:model.lazy="selectedUserIds"/>
                                    <label class="font-weight-normal" for="filter_user_{{ $user->id }}">
                                        {{ $user->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <livewire:schedule.create/>
            </div>
        </div>
        <div wire:loading.flex class="align-items-center justify-content-center">
            読み込み中...
        </div>
        <div id="calendar-container" wire:ignore>
            <div id="calendar" class="fc-container"></div>
        </div>
    </x-adminlte-card>


@push('js')
    <script>
        // ドロップダウン内クリックで閉じない
        $('.dropdown-menu').click(function (e) {
            e.stopPropagation();
        });

        window.addEventListener('load', function () {
            setTimeout(() => {
                const calendarEl = document.getElementById('calendar');

                if (!calendarEl) {
                    console.error('calendar element not found');
                    return;
                }

                const calendar = new FullCalendar.Calendar(calendarEl, {
                    schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                    themeSystem: 'bootstrap',
                    height: 700,

                    headerToolbar: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,resourceTimelineDay,resourceTimeGridDay",
                    },

                    initialView: 'dayGridMonth',
                    locale: 'ja',
                    displayEventTime: false,
                    navLinks: true,

                    dayCellContent: function (e) {
                        e.dayNumberText = e.dayNumberText.replace('日', '');
                    },

                    events: @json($events),
                });

                calendar.render();
                window.__calendar = calendar;

                console.log('FullCalendar rendered');
            }, 0);
        });

    </script>
@endpush
