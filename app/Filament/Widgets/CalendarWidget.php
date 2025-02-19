<?php

namespace App\Filament\Widgets;

use App\Models\Meeting;
use Saade\FilamentFullCalendar\Actions\MeetingData;
use App\Filament\Resources\MeetingResource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Widgets\Widget;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Saade\FilamentFullCalendar\Actions;
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Filament\Forms\Form;

class CalendarWidget extends FullCalendarWidget
{

    public string|null|\Illuminate\Database\Eloquent\Model $model = Meeting::class;
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

    public function getFormSchema(): array{
        return [
            TextInput::make('venue')
                ->required()
                ->label('Event venue'),
            DateTimePicker::make('start_time')
                ->required()
                ->label('Start Time'),
            DateTimePicker::make('end_time')
                ->required()
                ->label('End Time'),
        ];

    }

    protected function modalActions(): array
    {
        return[
            Actions\CreateAction::make()
            ->mountUsing(
                function ($form, array $arguments){
                    $form->fill([
                        'venue' => $arguments['venue'] ?? null,
                        'start_time' => $arguments['start'] ?? null,
                        'end_time' => $arguments['end'] ?? null,



                    ]);
                }
            ),

            Actions\DeleteAction::make(),
        ];
    }


    public function getEvents(array $fetchInfo): array
    {
   return Meeting::query()
       ->get()
       ->map(
        fn(Meeting $meeting)=>[
            'venue' => $meeting->venue,
            'start_time' => Carbon::createFromFormat('Y-m-d H:i:s', $meeting->start . ' ' . $meeting->start_time),
            'end_time'   => Carbon::createFromFormat('Y-m-d H:i:s', $meeting->end . ' ' . $meeting->end_time),
        ]
       )
       ->all();
    }


}
