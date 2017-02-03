<?php

namespace RubahApi\KelurahanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kelurahan
 *
 * @ORM\Table(name="kelurahan")
 * @ORM\Entity(repositoryClass="RubahApi\KelurahanBundle\Repository\KelurahanRepository")
 */
class Kelurahan
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lurah", type="string", length=255)
     */
    private $lurah;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=30, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text", nullable=true)
     */
    private $address;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Kelurahan
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lurah
     *
     * @param string $lurah
     *
     * @return Kelurahan
     */
    public function setLurah($lurah)
    {
        $this->lurah = $lurah;

        return $this;
    }

    /**
     * Get lurah
     *
     * @return string
     */
    public function getLurah()
    {
        return $this->lurah;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Kelurahan
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Kelurahan
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
}

