<script setup>
  import { ref } from 'vue';
  import FullCalendar from '@fullcalendar/vue3';
  import dayGridPlugin from '@fullcalendar/daygrid';
  import timeGridPlugin from '@fullcalendar/timegrid';
  import interactionPlugin from '@fullcalendar/interaction';
  
  const calendarOptions = ref({
    plugins: [dayGridPlugin, interactionPlugin, timeGridPlugin],
    initialView: 'timeGridWeek',
    height:600,
    
  
    headerToolbar: {
        left: 'prev,next',
        center: 'title',
        right: 'timeGridWeek,timeGridDay'

    },

    selectable: true,
    editable: true,
    events: [
      { title: 'Meeting', start: '2025-02-15T10:00:00', end: '2025-02-15T12:00:00' },
      { title: 'Conference', start: '2025-02-20', allDay: true }
    ],
    eventClick: ({ event }) => alert(`Event: ${event.title}`),
    dateClick: ({ dateStr }) => alert(`Date: ${dateStr}`)
  });
  </script>
  <template>
    <v-container>
      <v-row>
        <v-col cols="12" sm="12" >
          <!-- <v-card class="pa-4" > -->
            <FullCalendar :options="calendarOptions"  />
          <!-- </v-card> -->

        </v-col>

      </v-row>

    </v-container>
  </template>
  

  