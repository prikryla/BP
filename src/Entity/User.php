<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints as Assert;

    /**
     * Class User
     * @package App\Entity
     * @ORM\Entity
     */
    class User
    {

        /**
         * @var integer
         * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="Id"})
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="SEQUENCE")
         * @ORM\SequenceGenerator(sequenceName="seq_user_id", allocationSize=1, initialValue=1)
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
         * @ORM\Column(name="email", type="string", nullable=false, options={"comment"="Email"})
         */
        private $email;

        /**
         * @var string
         * @Assert\NotBlank()
         * @ORM\Column(name="username", type="string", nullable=false, options={"comment"="Username"})
         */
        private $username;

        /**
         * @var string
         * @Assert\NotBlank()
         * @ORM\Column(name="password", type="string", nullable=false, options={"comment"="Password"})
         */
        private $password;

        /**
         * @var string
         * @ORM\Column(name="salt", type="string", nullable=false, options={"default"="tmpSolution"})
         */
        private $salt;

        /**
         * @var string
         * @ORM\Column(name="address", type="string", nullable=false, options={"comment"="Address"})
         */
        private $address;

        /**
         * @var string
         * @ORM\Column(name="City", type="string", nullable=false, options={"comment"="City"})
         */
        private $city;

        /**
         * @var string
         * @ORM\Column(name="postal_code", type="string", nullable=false, options={"comment"="Postal_code"})
         */
        private $postal_code;

        /**
         * @var string
         * @ORM\Column(name="school", type="string", nullable=false, options={"comment"="School"})
         */
        private $school;

        /**
         * @var Date
         * @ORM\Column(name="date_of_birth", type="date", nullable=false, options={"comment"="Date_of_birth"})
         */
        private $date_of_birth;

        /**
         * @var integer
         * @ORM\Column(name="fines", type="integer", nullable=false, options={"comment"="Fines"})
         */
        private $fines;

        /**
         * @var integer
         * @ORM\Column(name="dress_number", type="integer", nullable=false, options={"comment"="Dress_number"})
         */
        private $dress_number;

        /**
         * @var string
         * @ORM\Column(name="auth_role", type="string", nullable=false, options={"comment"="Auth_role"})
         */
        private $auth_role;

        /**
         * @var string
         * @ORM\Column(name="phone_number_player", type="string", nullable=true, options={"comment"="Phone_number_player"})
         */
        private $phone_number_player;

        /**
         * @var string
         * @ORM\Column(name="phone_number_mother", type="string", nullable=true, options={"comment"="Phone_number_mother"})
         */
        private $phone_number_mother;

        /**
         * @var string
         * @ORM\Column(name="phone_number_father", type="string", nullable=true, options={"comment"="Phone_number_father"})
         */
        private $phone_number_father;

        /**
         * @var Nomination
         * @ORM\ManyToOne(targetEntity="App\Entity\Nomination")
         * @ORM\JoinColumn(name="nomination_id", referencedColumnName="id")
         */
        private $nomination;

        /**
         * @var integer
         * @ORM\Column(name="nomination_id", type="integer", nullable=false, options={"comment"="Nomination_id"})
         */
        protected $nomination_id;

        /**
         * @Assert\Length(min=7,
         *     minMessage="Heslo musí obsahovat minimálně 7 znaků.")
         * @Assert\Length(max=4096,
         *     maxMessage="Heslo může obsahovat maximálně 4096 znaků.")
         * @Assert\Regex(
         *     pattern="/\d/",
         *     match=true,
         *     message="Heslo musí obsahovat číslo."
         * )
         * @Assert\Regex(
         *     pattern="/[A-Z]/",
         *     match=true,
         *     message="Heslo musí obsahovat velké písmeno."
         * )
         * @Assert\Regex(
         *     pattern="/[a-z]/",
         *     match=true,
         *     message="Heslo musí obsahovat malé písmeno."
         * )
         */
        private $plainPassword;

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
        public function getUsername(): string
        {
            return $this->username;
        }

        /**
         * @param string $username
         */
        public function setUsername(string $username): void
        {
            $this->username = $username;
        }

        /**
         * @return string
         */
        public function getPassword(): string
        {
            return $this->password;
        }

        /**
         * @param string $password
         */
        public function setPassword(string $password): void
        {
            $this->password = $password;
        }

        /**
         * @return string
         */
        public function getSalt(): string
        {
            return $this->salt;
        }

        /**
         * @param string $salt
         */
        public function setSalt(string $salt): void
        {
            $this->salt = $salt;
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
         * @return Date
         */
        public function getDateOfBirth(): Date
        {
            return $this->date_of_birth;
        }

        /**
         * @param Date $date_of_birth
         */
        public function setDateOfBirth(Date $date_of_birth): void
        {
            $this->date_of_birth = $date_of_birth;
        }

        /**
         * @return int
         */
        public function getFines(): int
        {
            return $this->fines;
        }

        /**
         * @param int $fines
         */
        public function setFines(int $fines): void
        {
            $this->fines = $fines;
        }

        /**
         * @return int
         */
        public function getDressNumber(): int
        {
            return $this->dress_number;
        }

        /**
         * @param int $dress_number
         */
        public function setDressNumber(int $dress_number): void
        {
            $this->dress_number = $dress_number;
        }

        /**
         * @return string
         */
        public function getAuthRole(): string
        {
            return $this->auth_role;
        }

        /**
         * @param string $auth_role
         */
        public function setAuthRole(string $auth_role): void
        {
            $this->auth_role = $auth_role;
        }

        /**
         * @return string
         */
        public function getPhoneNumberPlayer(): string
        {
            return $this->phone_number_player;
        }

        /**
         * @param string $phone_number_player
         */
        public function setPhoneNumberPlayer(string $phone_number_player): void
        {
            $this->phone_number_player = $phone_number_player;
        }

        /**
         * @return string
         */
        public function getPhoneNumberMother(): string
        {
            return $this->phone_number_mother;
        }

        /**
         * @param string $phone_number_mother
         */
        public function setPhoneNumberMother(string $phone_number_mother): void
        {
            $this->phone_number_mother = $phone_number_mother;
        }

        /**
         * @return string
         */
        public function getPhoneNumberFather(): string
        {
            return $this->phone_number_father;
        }

        /**
         * @param string $phone_number_father
         */
        public function setPhoneNumberFather(string $phone_number_father): void
        {
            $this->phone_number_father = $phone_number_father;
        }

        /**
         * @return Nomination
         */
        public function getNomination(): Nomination
        {
            return $this->nomination;
        }

        /**
         * @param Nomination $nomination
         */
        public function setNomination(Nomination $nomination): void
        {
            $this->nomination = $nomination;
        }

        /**
         * @return int
         */
        public function getNominationId(): int
        {
            return $this->nomination_id;
        }

        /**
         * @param int $nomination_id
         */
        public function setNominationId(int $nomination_id): void
        {
            $this->nomination_id = $nomination_id;
        }

        /**
         * @return mixed
         */
        public function getPlainPassword()
        {
            return $this->plainPassword;
        }

        /**
         * @param mixed $plainPassword
         */
        public function setPlainPassword($plainPassword): void
        {
            $this->plainPassword = $plainPassword;
        }
    }