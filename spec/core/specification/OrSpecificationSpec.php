<?php

namespace spec\core\specification;

use core\specification\SpecificationInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OrSpecificationSpec extends ObjectBehavior
{
  public function let(SpecificationInterface $firstSpecification,SpecificationInterface $secondSpecification)
  {
    $this->beConstructedWith($firstSpecification,$secondSpecification);
  }
    function it_is_initializable()
    {
        $this->shouldHaveType('core\specification\OrSpecification');
    }

    public function it_returns_true_if_one_of_the_specifications_is_satisified(SpecificationInterface $firstSpecification,
      SpecificationInterface $secondSpecification,
      \stdClass $object)
    {
      
      $firstSpecification->isSatisfiedBy($object)->willReturn(true);
      $secondSpecification->isSatisfiedBy($object)->willReturn(false);

      $this->isSatisfiedBy($object)->shouldReturn(true);
    }

    public function it_returns_false_if_both_of_the_specifications_are_not_satisified(SpecificationInterface $firstSpecification,
      SpecificationInterface $secondSpecification,
      \stdClass $object)
    {
      
      $firstSpecification->isSatisfiedBy($object)->willReturn(false);
      $secondSpecification->isSatisfiedBy($object)->willReturn(false);

      $this->isSatisfiedBy($object)->shouldReturn(false);
    }
}
