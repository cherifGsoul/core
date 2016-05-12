<?php

namespace core\specification;


class OrSpecification
{
  private $firstSpecification;
  private $secondSpecification;


    public function __construct(SpecificationInterface $firstSpecification, SpecificationInterface $secondSpecification)
    {
        $this->firstSpecification = $firstSpecification;
        $this->secondSpecification = $secondSpecification;
    }

    public function isSatisfiedBy($object)
    {
      return $this->firstSpecification->isSatisfiedBy($object) || $this->secondSpecification->isSatisfiedBy($object);
    }
}
