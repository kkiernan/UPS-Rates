<?php

namespace spec\KKiernan\Factories;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RequestFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('KKiernan\Factories\RequestFactory');
    }
}
