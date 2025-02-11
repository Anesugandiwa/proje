<x-filament-panels::page>
    <div id="app">
        <calendar :events="{{json_encode($events)}}"></calendar>
    </div>

</x-filament-panels::page>

@vite(['resources/js/app.js'])
