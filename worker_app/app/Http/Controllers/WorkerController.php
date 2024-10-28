<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\StoreRequest;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::all();

        return view('worker.index', compact('workers'));
    }

    public function show(Worker $worker)
    {
        return view('worker.show', compact('worker'));
    }

    public function create()
    {
        return view('worker.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        Worker::create($data);

        return redirect()->route('worker.index');
    }

    public function edit(Worker $worker)
    {
        return view('worker.edit', compact('worker'));
    }

    public function update(Worker $worker)
    {
        $worker->name = 'new name';
        $worker->save();

        return 'Was updated';
    }

    public function delete(Worker $worker)
    {
        $worker->delete();
        return 'Was deleted';
    }
}
