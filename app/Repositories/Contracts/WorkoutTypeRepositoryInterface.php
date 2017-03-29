<?php

namespace API\Repositories\Contracts;

interface WorkoutTypeRepositoryInterface
{
    public function store($request);

    public function show($id);

    public function update($request, $id);

    public function delete($id);
}