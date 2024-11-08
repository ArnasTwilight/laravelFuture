@extends('layout.main')
@section('content')
<div>
    <a href="{{ route('worker.create') }}">Add</a>
</div>
<div>
    <hr>
    <form action="{{ route('worker.index') }}">
        <input type="text" name="name" placeholder="name" value="{{ request()->get('name') }}">
        <input type="text" name="surname" placeholder="surname" value="{{ request()->get('surname') }}">
        <input type="text" name="email" placeholder="email" value="{{ request()->get('email') }}">

        <input type="number" name="from" placeholder="from" value="{{ request()->get('from') }}">
        @error('from')<div>{{ $message }}</div>@enderror
        <input type="number" name="to" placeholder="to" value="{{ request()->get('to') }}">
        @error('to')<div>{{ $message }}</div>@enderror

        <input type="text" name="description" placeholder="description" value="{{ request()->get('description') }}">

        <input
            {{ request()->get('is_married') == 'on' ? 'checked' : '' }}
            id="isMarried" type="checkbox" name="is_married">
        <label for="is_married">Is married</label>

        <input type="submit" value="Filter">
        <a href="{{ route('worker.index') }}">Reset</a>
    </form>
    <hr>
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
        {!! $workers->withQueryString()->render() !!}
    </div>
</div>
@endsection
