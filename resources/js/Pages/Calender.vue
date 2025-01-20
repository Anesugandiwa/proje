<template>
    <div class='demo-app'>
        <div class='demo-app-sidebar'>
            <div class='demo-app-sidebar-section'>
                <h2>Instructions</h2>
                <ul>
                    <li>Select dates and you will be prompted to create a new event</li>
                    <li>Drag, drop, and resize events</li>
                    <li>Click an event to delete it</li>
                </ul>
            </div>
            <div class='demo-app-sidebar-section'>
                <label>
                    <input
                        type='checkbox'
                        :checked='calendarOptions.weekends'
                        @change='handleWeekendsToggle'
                    />
                    toggle weekends
                </label>
            </div>
            <div class='demo-app-sidebar-section'>
                <h2>All Events ({{ currrentEvents ? currentEvents.length : 0 }})</h2>
                <ul>
                    <li v-for='event in currentEvents' :key='event.id'>
                        <b>{{ event.startStr }}</b>
                        <i>{{ event.title }}</i>
                    </li>
                </ul>
            </div>
        </div>


        <FullCalendar :events ='events' :options="calendarOptions"/>

    </div>



</template>
<script>




import FullCalendar  from "@fullcalendar/vue3";
import dayGridPlugin from '@fullcalendar/daygrid';
import {Calendar} from '@fullcalendar/vue3';
import interactionPlugin, {Draggable} from '@fullcalendar/interaction';

export default {

    components:{FullCalendar},

    data(){
        return{
            events:[
                {title: 'Event 1', date: '2025-01-09'},
                {title: 'Event 2', date: '2025-08-10'},
            ],
            calendarOptions: {
                plugins: [dayGridPlugin],
                initialView: 'dayGridMonth',
                weekends: true,

                headerToolbar: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'dayGridMonth'
                }
            }


        };
    },

    methods: {
        handleWeekendsToggle() {
            this.calendarOptions.weekends = !this.calendarOptions.weekends
        },
        handleDateSelect(selectInfo){
            let title = prompt('Please Enter a new title for your Event')

            let calendarApi = selectInfo.view.calendar

            calendarApi.unselect()

            if (title){
                calendarApi.addEvent({
                    id: createEventId(),
                    title,
                    start: selectInfo.startStar,
                    end: selectInfo.endStr,
                    allDay: selectInfo.allDay
                })
            }
        },

        handleEventClick(clickInfor){
            if(confirm(`Are you sure you want to delete the event '${clickInfo.event.title}'`)){
                clickInfor.event.remove()
            }
        },

        handleEvents(events){
            this.currentEvents = events
        }

    }


};
</script>

<style>
h2 {
    margin: 0;
    font-size: 16px;
}

ul {
    margin: 0;
    padding: 0 0 0 1.5em;
}

li {
    margin: 1.5em 0;
    padding: 0;
}

b { /* used for event dates/times */
    margin-right: 3px;
}

.demo-app {
    display: flex;
    min-height: 100%;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
}

.demo-app-sidebar {
    width: 300px;
    line-height: 1.5;
    background: #eaf9ff;
    border-right: 1px solid #d3e2e8;
}

.demo-app-sidebar-section {
    padding: 2em;
}

.demo-app-main {
    flex-grow: 1;
    padding: 3em;
}

.fc { /* the calendar root */
    max-width: 1100px;
    margin: 0 auto;
}


</style>

