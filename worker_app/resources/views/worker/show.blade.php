<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Show page</h1>
<div>
    <div>
        <div> name: {{ $worker->name }}</div>
        <div> surname: {{ $worker->surname }}</div>
        <div> email: {{ $worker->email }}</div>
        <div> age: {{ $worker->age }}</div>
        <div> description: {{ $worker->description }}</div>
        <div> is married: {{ $worker->is_married }}</div>
        <div>
            <a href="{{ route('worker.index') }}">Back</a>
        </div>
    </div>
</div>
</body>
</html>
