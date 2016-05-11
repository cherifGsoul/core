<?php

namespace core\specification;

class NotSpecification implements SpecificationInterface
{
		private $specification;

		public function __construct(SpecificationInterface $specification)
		{
			$this->specification = $specification;
		}
    public function isSatisfiedBy($object)
    {
    	return !$this->specification->isSatisfiedBy($object);
    }
}
