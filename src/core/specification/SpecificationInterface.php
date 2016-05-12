<?php

namespace core\specification;

interface SpecificationInterface
{
		/**
		* @param mixed $object
		* @return boolean
		*/
    public function isSatisfiedBy($object);
}
