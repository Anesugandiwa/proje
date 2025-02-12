<?php

namespace App\Filament\Widgets;

use App\Models\Meeting;
use Saade\FilamentFullCalendar\Actions\MeetingData;
use App\Filament\Resources\MeetingResource;



use Filament\Widgets\Widget;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    // protected static string $view = 'filament.widgets.calendar-widget';
    protected function getOptions():array
    {
        return[
            'initialView' => 'timeGridWeek',
            'headerToolbar' => [
                'left' => 'prev,next today',
                'center' => 'title',
                'right' => 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
            ],
        ];
    }

}
