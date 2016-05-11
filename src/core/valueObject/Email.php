<?php
namespace core\valueObject;
use InvalidArgumentException;

final class Email implements ValueObjectInterface
{
	private $value;

	/**
	 * Returns an Email object instance given a native string as parametrer
	 * @param string $value 
	 */
  public function __construct($value)
  {
		$filtred = filter_var($value, FILTER_VALIDATE_EMAIL);
		if ($filtred === false) {
			throw new InvalidArgumentException('The email address is not valid');
		}
		$this->value = $filtred;
  }

  /**
   * Returns the email as native string
   * @return string
   */
  public function getValue()
  {
  	return $this->value;
  }

  /**
   * Factory method returns object instance given a native string as parameter
   * @param string $email
   * @return Email 
   */
  public static function createFromString($email)
  {
  	return new static($email);
  }

  /**
   * Returns the native string email value
   * @return string
   */
	public function __toString()
	{
		return $this->getValue();
	}

	/**
	 * Compares the equality of two emails value objects
	 * @return boolean
	 */
  public function equals(ValueObjectInterface $email)
  {
    if (\get_class($this) !== \get_class($email))
    {
      return false;
    }
  	return $this->getValue() === $email->getValue();
  }
}