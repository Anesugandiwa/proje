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
    public function getViewOptions():array {
        return [
            'height' =>'50px',
        ];
    }
    public function fetchEvents(array $fetchInfo): array
    {
   return Meeting::query()
       ->whereBetween('start_time', [
            Carbon::parse($fetchInfo['start']),
            Carbon::parse($fetchInfo['end']),
       ])
       ->get()
       ->map(
        fn (Meeting $meeting)=>[
            'id' => $meeting->id,
            'title' => $meeting->venue,
            'start' => Carbon::parse($meeting->start_time)->toIso8601String(),
            'end'   => Carbon::parse($meeting->end_time)->toIso8601String(),
        ]
       )
       ->toArray();
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
            Actions\EditAction::make()
                ->mountUsing(
                    function (Meeting $record, Forms\Form $form,array $arguments){
                        $form->fill([
                            'id' =>$record->id,
                            'venue' =>$record->venue,
                            'start_time' => $arguments['meeting']['start'] ?? $record->start_time,
                            'end_time' => $arguments['meeting']['end'] ?? $record->end_time,
                        ]);

                    }
                ),
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

    // public function eventDidMount(): string
    // {
    //     return <<<JS
    //         function({event, timeText, isStart, isEnd, isMirror, isPast, isFuture,isToday, el, view}){
    //             el.setAttribute("x-tooltrip", "tooltrip");
    //             el.setAttribute("x-data", "{tooltrip:' "+event.title+ "'}");
    //         }
    //         JS;
    // }





}
