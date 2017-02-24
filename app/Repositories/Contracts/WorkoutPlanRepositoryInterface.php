<?php

namespace API\Repositories\Contracts;

interface WorkoutPlanRepositoryInterface
{
    public function show($id);

    public function store($request);

    public function update($request, $id);

    public function delete($id);
}