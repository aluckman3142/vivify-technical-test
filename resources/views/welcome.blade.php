<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    @livewireStyles
    @vite('resources/css/app.css')
        <title>Laravel</title>
    </head>
    <body>
        <h1 class="text-3xl text-red-500 font-bold underline">Adams Task Manager</h1>
        <livewire:showtasks>
    @livewireScripts   
    </body>
</html>