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
    public function fetchMeetings(array $fetchInfo): array
    {
        return Meeting::query()
            ->where('start_time', '>=', $fetchInfo['start'])
            ->where('end_time', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn (Meeting $meeting) => MeetingData::make()
                    ->id($meeting->id)
                    ->title($meeting->venue)
                    ->start($meeting->start_time)
                    ->end($meeting->end_time)
                    ->url(
                        url: MeetingResource::getUrl(name: 'view', parameters: ['record' => $meeting]),
                        shouldOpenUrlInNewTab: true
                    )
            )
            ->toArray();
    }
}
