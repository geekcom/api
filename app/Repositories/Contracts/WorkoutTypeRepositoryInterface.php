<?php

namespace API\Repositories\Contracts;

interface WorkoutTypeRepositoryInterface
{
    public function store($request);

    public function show($uuid);

    public function update($request, $uuid);

    public function delete($uuid);
}