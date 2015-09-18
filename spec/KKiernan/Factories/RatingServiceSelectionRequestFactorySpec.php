<?php

namespace spec\KKiernan\Factories;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RatingServiceSelectionRequestFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('KKiernan\Factories\RatingServiceSelectionRequestFactory');
    }
}
