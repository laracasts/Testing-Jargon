<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Acme\UserRepository;
use Acme\Mailer;

class RegistersUserSpec extends ObjectBehavior {

    function let(UserRepository $repository, Mailer $mailer)
    {
        $this->beConstructedWith($repository, $mailer);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\RegistersUser');
    }

    function it_creates_a_new_user(UserRepository $repository)
    {

        $user = ['username' => 'JohnDoe', 'email' => 'john@example.com'];

        $repository->create($user)->shouldBeCalled();

        $this->register($user);
    }

    function it_sends_a_welcome_email(Mailer $mailer)
    {
        $user = ['username' => 'JohnDoe', 'email' => 'john@example.com'];

        $mailer->sendWelcome('john@example.com')->shouldBeCalled();

        $this->register($user);

    }
}
