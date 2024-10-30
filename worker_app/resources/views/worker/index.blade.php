<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Index page</h1>
<div>
    <a href="{{ route('worker.create') }}">Add</a>
</div>
<div>
    @foreach($workers as $worker)
    <div>
        <div> name: {{ $worker->name }}</div>
        <div> surname: {{ $worker->surname }}</div>
        <div> email: {{ $worker->email }}</div>
        <div> age: {{ $worker->age }}</div>
        <div> description: {{ $worker->description }}</div>
        <div> is married: {{ $worker->is_married }}</div>
        <div>
            <a href="{{ route('worker.show', $worker->id) }}">Show</a>
        </div>
        <div>
            <a href="{{ route('worker.edit', $worker->id) }}">Edit</a>
        </div>
        <div>
            <form action="{{ route('worker.delete', $worker->id) }}" method="post">
                @csrf
                @method('Delete')
                <input type="submit" value="Delete">
            </form>
        </div>
    </div>
    <hr>
    @endforeach
    <div class="my-nav">
        {!! $workers->render() !!}
    </div>
</div>
<style>
    .my-nav svg{
        width: 20px;
    }
</style>
</body>
</html>
