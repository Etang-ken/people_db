<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People Db - Find People Fast & Free!</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    @include('search.partials.hero')

    @include('search.partials.results')
    
    @include('search.partials.landing-content')

    @include('search.partials.scripts')

</body>
</html>
