<?php

namespace spec\core\valueObject;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use core\valueObject\ValueObjectInterface;
use core\valueObject\Email;

class EmailSpec extends ObjectBehavior
{
    public function let()
    {
    	$this->beConstructedWith('fake@email.address');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('core\valueObject\Email');
    }

    public function it_implements_value_object_interface()
    {
    	$this->shouldImplement(ValueObjectInterface::class);
    }

    public function it_throws_exception_when_email_is_not_valid()
    {
    	$this->beConstructedWith('Not a valid email');
    	$this->shouldThrow('\InvalidArgumentException')->duringInstantiation();
    }

    public function it_compares_equality_of_two_emails_value_objects()
    {
    	$email = new Email('fake@email.address');
    	$this->equals($email)->shouldReturn(true);
    }

    public function it_creates_instance_from_its_factory_method()
    {
    	$email = Email::createFromString('fake@email.address');
    	$this->equals($email)->shouldReturn(true);
    }
}
