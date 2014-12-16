<?php

namespace Acme;

class TasksController {

    protected $auth;

    protected $repository;

    public function __construct(Authorizer $auth, TaskRepository $repository)
    {
        $this->auth = $auth;
        $this->repository = $repository;
    }

    public function store()
    {
        if ($this->auth->guest())
        {
            return 'redirect';
        }

        $this->repository->create('...');
    }
}
