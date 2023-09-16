<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gambling.com Test</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.5" integrity="sha384-xcuj3WpfgjlKF+FXhSQFQ0ZNr39ln+hwjN3npfM9VBnUskLolQAcN80McRIVOPuO" crossorigin="anonymous"></script>
    <meta name="htmx-config" content='{"globalViewTransitions":"true"}'>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="antialiased bg-gray-900 py-10">

    <h1 class="text-lg text-gray-400 text-center font-medium mb-6">Affiliates</h1>

    <div class="max-w-xs mx-auto flex items-baseline justify-evenly">
        <label for="distance" class="block mb-2 text-sm text-center font-medium text-white">Distance from Dublin office</label>
        <input type="number" name="distance" id="distance" hx-get="/" hx-target="#affiliates-table" hx-select="#affiliates-table" hx-swap="outerHTML transition:true" hx-trigger="input changed delay:1000ms" class="w-20 mb-6 border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" value="100">
    </div>

    <div class="max-w-4xl m-auto relative overflow-x-auto shadow-md sm:rounded-lg">
        @include('partials/table')
    </div>

</body>

</html>