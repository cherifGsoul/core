<?php

namespace spec\core\specification;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use core\specification\CompositeSpecificationInterface;
use spec\core\specification\fixtures\Specification;
use core\specification\SpecificationInterface;

class CompositeSpecificationSpec extends ObjectBehavior
{
    public function let()
    {
      $this->beAnInstanceOf(Specification::class);
    }

    public function it_implements_specification_interface()
    {
      $this->shouldImplement(SpecificationInterface::class);
    }

    public function it_implements_composite_specification_interface()
    {
      $this->shouldImplement(Composite_SpecificationInterface::class);
    }


    public function it_returns_and_specification(SpecificationInterface $specification)
    {
      $this->andSatisfies($specification)->shouldReturnAnInstanceOf('core\specification\AndSpecification');
    }

    public function it_returns_or_specification(SpecificationInterface $specification)
    {
      $this->orSatisfies($specification)->shouldReturnAnInstanceOf('core\specification\orSpecification');
    }

    public function it_returns_not_specification(SpecificationInterface $specification)
    {
      $this->notSatisfies()->shouldReturnAnInstanceOf('core\specification\NotSpecification');
    }

    public function it_returns_xor_specification(SpecificationInterface $specification)
    {
      $this->xorSatisfies($specification)->shouldReturnAnInstanceOf('core\specification\XorSpecification'); 
    }
}
