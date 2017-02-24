<?php

namespace API\Http\Controllers;

use API\Repositories\Contracts\WorkoutPlanRepositoryInterface;
use Illuminate\Http\Request;

class WorkoutPlanController extends Controller
{
    public function show(WorkoutPlanRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function store(WorkoutPlanRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(WorkoutPlanRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(WorkoutPlanRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
