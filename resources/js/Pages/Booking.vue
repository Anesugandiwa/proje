<template>
    <div id="calendar"></div>
</template>
<script>
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

export default {
    props: {
        events: {
            type: Array,
            required:false,
            default: () =>[],
        },
    },

    mounted() {
        this.initializedCalendar();
    },

    methods: {
        initializeCalendar() {
            const calendarEl = this.$el;
            const calendar = new Calendar(calendarEl, {
                plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
                initialView: 'dayGridMonth',
                events: this.events,
                dateClick: this.onDateClick,
                eventClick: this.onEventClick,
            });
            calendar.render();

        },
        onDateClick(info){
            console.log('date clicked:', info.dateStr);
        },

        onEventClick(info){
            console.log('event clicked: ', info.event);
        },
    },
};


</script>
<style>
#calendar {
    max-width: 900px;
    margin: 0 auto;
}
</style>
