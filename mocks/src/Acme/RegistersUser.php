<?php

namespace Acme;

class RegistersUser {

    protected $repository;

    protected $mailer;

    public function __construct(UserRepository $repository, Mailer $mailer)
    {
        $this->repository = $repository;
        $this->mailer = $mailer;
    }

    public function register(array $user)
    {
        $this->repository->create($user);

        $this->mailer->sendWelcome($user['email']);
    }

}
