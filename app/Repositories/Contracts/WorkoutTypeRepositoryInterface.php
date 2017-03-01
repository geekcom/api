<?php

namespace API\Repositories\Contracts;

interface WorkoutTypeRepositoryInterface
{
    public function listAll();

    public function store($request);

    public function update($request, $id);

    public function delete($id);
}