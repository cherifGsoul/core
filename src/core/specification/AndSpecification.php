<?php

namespace core\specification;

class AndSpecification implements SpecificationInterface
{ 
    private $firstSpecification;
    private $seconfSpecification;

    public function __construct($firstSpecification, $secondSpecification)
    {
        $this->firstSpecification = $firstSpecification;
        $this->secondSpecification = $secondSpecification;
    }

    public function isSatisfiedBy($object)
    {
        return $this->firstSpecification->isSatisfiedBy($object) && $this->secondSpecification->isSatisfiedBy($object);
    }
}
