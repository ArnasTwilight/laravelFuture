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
                <input type="text" name="name" placeholder="name">
            </div>
            <div style="margin-bottom: 15px;">
                <input type="text" name="surname" placeholder="surname">
            </div>
            <div style="margin-bottom: 15px;">
                <input type="email" name="email" placeholder="email">
            </div>
            <div style="margin-bottom: 15px;">
                <input type="number" name="age" placeholder="age">
            </div>
            <div style="margin-bottom: 15px;">
                <textarea type="text" name="description" placeholder="description"></textarea>
            </div>
            <div style="margin-bottom: 15px;">
                <input id="isMarried" type="checkbox" name="is_married">
                <lable for="isMarried">Is married</lable>
            </div>
            <div style="margin-bottom: 15px;">
                <input type="submit" value="Add">
            </div>
        </form>
    </div>
</div>
</body>
</html>
