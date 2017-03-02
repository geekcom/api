<?php

namespace API\Http\Controllers;

use API\Repositories\Contracts\WorkoutTypeRepositoryInterface;
use Illuminate\Http\Request;

class WorkoutTypeController extends Controller
{
    public function show(WorkoutTypeRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function listAll(WorkoutTypeRepositoryInterface $repository)
    {
        return $repository->listAll();
    }

    public function store(WorkoutTypeRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(WorkoutTypeRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(WorkoutTypeRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}