<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Edit page</h1>
<div>
    <div>
        <form action="{{ route('worker.update', $worker->id) }}" method="post">
            @csrf
            @method('Patch')
            <div style="margin-bottom: 15px;">
                <input type="text" name="name" placeholder="name" value="{{ old('name') ?? $worker->name }}">
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <input type="text" name="surname" placeholder="surname" value="{{ old('surname') ?? $worker->surname }}">
                @error('surname')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <input type="email" name="email" placeholder="email" value="{{ old('email') ?? $worker->email }}">
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <input type="number" name="age" placeholder="age" value="{{ old('age') ?? $worker->age }}">
                @error('age')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <textarea type="text" name="description" placeholder="description">{{ old('description') ?? $worker->description }}</textarea>
                @error('description')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <input id="isMarried" type="checkbox" name="is_married" {{ $worker->is_married ? 'checked' : '' }}>
                <lable for="isMarried">Is married</lable>
                @error('is_married')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <input type="submit" value="Edit">
            </div>
        </form>
    </div>
</div>
</body>
</html>
