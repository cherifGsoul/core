<?php

namespace spec\core\specification;

use core\specification\SpecificationInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AndSpecificationSpec extends ObjectBehavior
{
    public function let(
      SpecificationInterface $firstSpecification,
      SpecificationInterface $secondSpecification
    )
    {
      $this->beConstructedWith($firstSpecification,$secondSpecification);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('core\specification\AndSpecification');
    }

    public function it_implements_specification_interface()
    {
      $this->shouldImplement(SpecificationInterface::class);
    }

    public function it_satisfies_the_specification_if_both_specification_are_satisfied(
      SpecificationInterface $firstSpecification,
      SpecificationInterface $secondSpecification,
      \stdClass $object
      ) 
    {
      $firstSpecification->isSatisfiedBy($object)->willReturn(true);
      $secondSpecification->isSatisfiedBy($object)->willReturn(true);

      $this->isSatisfiedBy($object)->shouldReturn(true);
    }

    public function it_returns_false_if_one_of_the_specification_is_not_satisfied(
      SpecificationInterface $firstSpecification,
      SpecificationInterface $secondSpecification,
      \stdClass $object
      ) 
    {
      $firstSpecification->isSatisfiedBy($object)->willReturn(true);
      $secondSpecification->isSatisfiedBy($object)->willReturn(false);

      $this->isSatisfiedBy($object)->shouldReturn(false);
    }
}
