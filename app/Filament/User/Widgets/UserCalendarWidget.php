<?php

namespace App\Filament\User\Widgets;

use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Saade\FilamentFullCalendar\Actions\BookingData;
use Filament\Forms\Components\TextInput;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Select;
use App\Models\Booking;

class UserCalendarWidget extends FullCalendarWidget
{
    public string|null|\Illuminate\Database\Eloquent\Model $model = Booking::class;
    
    protected function getOptions(): array
    {
        return [
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
        DatePicker::make('date')
            ->label('DATE')
            ->required()
            ->rules(['date', 'after_or_equal:today'])
            ->placeholder('Enter date'),
        
        TimePicker::make('start_time')
            ->label('Time')
            ->required()
            ->placeholder('From')
            ->native(false) // Use Filament's custom picker instead of the browser's
            ->seconds(false),

        TimePicker::make('end_time')
            ->label('Time')
            ->required()
            ->placeholder('To')
            ->native(false)
            ->seconds(false),

        Select::make('spaces')
            ->options([
                'meeting_room_east'         => 'Meeting Room East',
                'meeting_room_west'         => 'Meeting Room West',
                'boardroom'                 =>'Board Room',
                'event_space'               => 'Event Space',
            ])
            ->label('Spaces')
            ->required()
            ->placeholder('No  space selected'),

        TextInput::make('title')
            ->label('Booking Tittle')
            ->required()
            ->placeholder('Add title'),
        
        TextInput::make('company_name')
            ->label('Enter Company/Individual Name')
            ->placeholder('e.g. Omni Learning')
            ->required(),

        TextInput::make('phone_number')
            ->label('Phone')
            ->placeholder('Phone')
            ->required(),


           
        
        ];

    }
    public function getViewOptions(): array
    {
        return [
            'height' => '500px',
        ];
    }
    public function fetchEvents(array $fetchInfo): array
    {
   return Booking::query()
       ->whereBetween('start_time', [
            Carbon::parse($fetchInfo['start']),
            Carbon::parse($fetchInfo['end']),
       ])
       ->get()
       ->map(
        fn (Booking $booking)=>[
            'id' => $booking->id,
            'title' => $booking->spaces,
            'start' => Carbon::parse($booking->start_time)->toIso8601String(),
            'end'   => Carbon::parse($booking->end_time)->toIso8601String(),
        ]
       )
       ->toArray();
    }


}