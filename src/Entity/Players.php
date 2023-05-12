<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints\Date;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Players
 * @package App\Entity
 * @ORM\Entity
 */
class Players {
    /**
     * @var integer
     * @ORM\Column (name="id", type="integer", nullable=false, options={"comment"="ID"})
     * @ORM\Id
     * @ORM\GeneratedValue (strategy="SEQUENCE")
     * @ORM\SequenceGenerator (sequenceName="seq_players_id", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="first_name", type="string", nullable=false, options={"comment"="First_name"})
     */
    private $first_name;

    /**
     * @var string
     * @ORM\Column(name="last_name", type="string", nullable=false, options={"comment"="Last_name"})
     */
    private $last_name;

    /**
     * @var string
     * @ORM\Column(name="postal_code", type="string", nullable=false, options={"comment"="Postal code"})
     */
    private $postal_code;

    /**
     * @var string
     * @ORM\Column(name="city", type="string", nullable=false, options={"comment"="City"})
     */
    private $city;

    /**
     * @var string
     * @ORM\Column(name="address", type="string", nullable=false, options={"comment"="Address"})
     */
    private $address;

    /**
     * @var string
     * @ORM\Column(name="school", type="string", nullable=true, options={"comment"="School"})
     */
    private $school;

    /**
     * @var string
     * @ORM\Column(name="birth_number", type="string", nullable=false, options={"comment"="birth_number"})
     */
    private $birth_number;

    /**
     * @var string
     * @ORM\Column(name="phone_mother", type="string", nullable=true, options={"comment"="phone_mother"})
     */
    private $phone_mother;

    /**
     * @var string
     * @ORM\Column(name="phone_father", type="string", nullable=true, options={"comment"="phone_father"})
     */
    private $phone_father;

    /**
     * @var string
     * @ORM\Column(name="phone_player", type="string", nullable=true, options={"comment"="phone_player"})
     */
    private $phone_player;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", nullable=false, options={"comment"="email"})
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(name="category", type="string", nullable=false, options={"comment"="category"})

     */
    private $category;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postal_code;
    }

    /**
     * @param string $postal_code
     */
    public function setPostalCode(string $postal_code): void
    {
        $this->postal_code = $postal_code;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }


    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getSchool(): string
    {
        return $this->school;
    }

    /**
     * @param string $school
     */
    public function setSchool(string $school): void
    {
        $this->school = $school;
    }

    /**
     * @return string
     */
    public function getBirthNumber(): string
    {
        return $this->birth_number;
    }

    /**
     * @param string $birth_number
     */
    public function setBirthNumber(string $birth_number): void
    {
        $this->birth_number = $birth_number;
    }

    /**
     * @return string
     */
    public function getPhoneMother(): string
    {
        return $this->phone_mother;
    }

    /**
     * @param string $phone_mother
     */
    public function setPhoneMother(string $phone_mother): void
    {
        $this->phone_mother = $phone_mother;
    }

    /**
     * @return string
     */
    public function getPhoneFather(): string
    {
        return $this->phone_father;
    }

    /**
     * @param string $phone_father
     */
    public function setPhoneFather(string $phone_father): void
    {
        $this->phone_father = $phone_father;
    }

    /**
     * @return string
     */
    public function getPhonePlayer(): string
    {
        return $this->phone_player;
    }

    /**
     * @param string $phone_player
     */
    public function setPhonePlayer(string $phone_player): void
    {
        $this->phone_player = $phone_player;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }




}