<x-filament::page>
    <div id="calendar"></div>

    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            height: 'auto',
            dayMaxEvents: true, // enables "+n more" link if too many events
            events: @json($events),
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek' // adds view switcher
            },
            eventClick: function(info) {
                info.jsEvent.preventDefault();
                if (info.event.url) {
                    window.open(info.event.url, '_blank');
                }
            }
        });

        calendar.render();
    });
</script>


    <style>
    #calendar {
        margin-top: 2rem;
    }

    .fc-event-title {
        white-space: normal !important;
        overflow-wrap: break-word;
        word-break: break-word;
    }

    .fc-event {
        padding: 2px !important;
    }
    </style>
</x-filament::page>