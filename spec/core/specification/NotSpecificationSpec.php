<?php

namespace spec\core\specification;

use core\specification\SpecificationInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NotSpecificationSpec extends ObjectBehavior
{
    public function let(SpecificationInterface $specification)
    {
        $this->beConstructedWith($specification);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('core\specification\NotSpecification');
    }

    public function it_does_not_satisfy_the_specification_constructed_with(
    	SpecificationInterface $specification,
    	\stdClass $object)
    {
    	$specification->isSatisfiedBy($object)->willReturn(true);
    	$this->isSatisfiedBy($object)->shouldReturn(false);
    }
}
