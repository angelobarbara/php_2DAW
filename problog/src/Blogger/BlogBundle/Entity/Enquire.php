<?php
namespace Blogger\BlogBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class Enquire{
    /**
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @Assert\Email(
     *     message=" The email '{{ value }}' is not a valid email",
     *     checkMX=true
     * )
     */
    protected $email;

    /**
     * @Assert\Length(
     *     min=2,
     *     max=50,
     *     minMessage="Your first name must be at least '{{ limit }}' characters long",
     *     maxMessage="Your first name cannot be longer than '{{ limit }}' characters"
     * )
     */
    protected $subject;

    /**
     * @Assert\NotBlank()
     */
    protected $body;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

}
?>