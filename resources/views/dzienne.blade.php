<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App template</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green-200">
<div id="head" class="flex border-blue-800 border-t-2">
    <div class="w-full">
        @include('layouts.navigation')
    </div>
</div>
<div id="content" class="mx-auto" style="max-width:500px;">
    @include('livewire.includes.nav')
        @livewire('dzienne-list')
</div>
</body>

</html>


