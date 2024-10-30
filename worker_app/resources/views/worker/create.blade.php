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
        <form action="{{ route('worker.store') }}" method="post">
            @csrf
            <div style="margin-bottom: 15px;">
                <input type="text" name="name" placeholder="name" value="{{ old('name') }}">
                @error('name')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <input type="text" name="surname" placeholder="surname" value="{{ old('surname') }}">
                @error('surname')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <input type="email" name="email" placeholder="email" value="{{ old('email') }}">
                @error('email')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <input type="number" name="age" placeholder="age" value="{{ old('age') }}">
                @error('age')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <textarea type="text" name="description" placeholder="description">{{ old('description') }}</textarea>
                @error('description')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <input
                    {{ old('is_married') == 'on' ? 'checked' : '' }}
                    id="isMarried" type="checkbox" name="is_married">
                <lable for="isMarried">Is married</lable>
                @error('is_married')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <input type="submit" value="Add">
            </div>
        </form>
    </div>
</div>
</body>
</html>
