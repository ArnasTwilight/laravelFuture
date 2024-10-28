<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Create page</h1>
<div>
    <div>
        <form action="{{ route('worker.update', $worker->id) }}" method="post">
            @csrf
            @method('Patch')
            <div style="margin-bottom: 15px;">
                <input type="text" name="name" placeholder="name" value="{{ $worker->name }}">
            </div>
            <div style="margin-bottom: 15px;">
                <input type="text" name="surname" placeholder="surname" value="{{ $worker->surname }}">
            </div>
            <div style="margin-bottom: 15px;">
                <input type="email" name="email" placeholder="email" value="{{ $worker->email }}">
            </div>
            <div style="margin-bottom: 15px;">
                <input type="number" name="age" placeholder="age" value="{{ $worker->age }}">
            </div>
            <div style="margin-bottom: 15px;">
                <textarea type="text" name="description" placeholder="description">{{ $worker->description }}</textarea>
            </div>
            <div style="margin-bottom: 15px;">
                <input id="isMarried" type="checkbox" name="is_married" {{ $worker->is_married ? 'checked' : '' }}>
                <lable for="isMarried">Is married</lable>
            </div>
            <div style="margin-bottom: 15px;">
                <input type="submit" value="Edit">
            </div>
        </form>
    </div>
</div>
</body>
</html>
