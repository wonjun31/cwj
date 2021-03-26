
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<body>

    <ul>
        @forelse($def['OccuName'] as $item)
            <li>{{ $item }}</li>
        @empty
            <li>아무것도 없군요!</li>
        @endforelse
    </ul>

</body>

</html>
