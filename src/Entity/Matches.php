<?php

namespace App\Entity;

use DateTime;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\Date;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class Matches
 * @package App\Entity
 * @ORM\Entity
 */
class Matches{
        /**
         * @var integer
         * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="ID"})
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="SEQUENCE")
         * @ORM\SequenceGenerator(sequenceName="seq_matches_id", allocationSize=1, initialValue=1)
         */
        private $id;

        /**
         * @var string
         * @ORM\Column(name="home_team", type="string", nullable=false, options={"comment"="Home_team"})
         */
        private $home_team;

        /**
         * @var string
         * @ORM\Column(name="away_team", type="string", nullable=false, options={"comment"="Away_team"})
         */
        private $away_team;

        /**
         * @var DateTime
         * @ORM\Column(name="match_time", type="datetime", nullable=false, options={"comment"="Match_time"})
         */
        private $match_time;

        /**
         * @var string
         * @ORM\Column(name="address", type="string", nullable=false, options={"comment"="Address"})
         */
        private $address;

        /**
         * @var string
         * @ORM\Column(name="city", type="string", nullable=false, options={"comment"="City"})
         */
        private $city;

        /**
         * @var string
         * @ORM\Column(name="venue", type="string", nullable=false, options={"comment"="Venue"})
         */
        private $venue;

        /**
         * @var string
         * @ORM\Column(name="postal_code", type="string", nullable=false, options={"comment"="postal_code"})
         */
        private $postal_code;

        /**
         * @var Date
         * @ORM\Column(name="match_date", type="date", nullable=false, options={"comment"="match_date"})
         */
        private $match_date;

        /**
         * @var Nomination
         * @ORM\ManyToOne(targetEntity="App\Entity\Nomination")
         * @ORM\JoinColumn(name="nomination_id", referencedColumnName="id", nullable=false)
         */
        private $nomination;

        /**
         * @var integer
         * @ORM\Column(name="nomination_id", type="integer", nullable=true, options={"comment"="Nomination_id"})
         */
        protected $nomination_id;

        /**
         * @var Category
         * @ORM\ManyToOne(targetEntity="App\Entity\Category")
         * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=true)
         */
        private $category;

        /**
         * @var integer
         * @ORM\Column(name="category_id", type="integer", nullable=true,options={"comment"="Category_id"})
         */
        protected $category_id;

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
        public function getHomeTeam(): string
        {
            return $this->home_team;
        }

        /**
         * @param string $home_team
         */
        public function setHomeTeam(string $home_team): void
        {
            $this->home_team = $home_team;
        }

        /**
         * @return string
         */
        public function getAwayTeam(): string
        {
            return $this->away_team;
        }

        /**
         * @param string $away_team
         */
        public function setAwayTeam(string $away_team): void
        {
            $this->away_team = $away_team;
        }

        /**
         * @return DateTime
         */
        public function getMatchTime(): DateTime
        {
            return $this->match_time;
        }

        /**
         * @param DateTime $match_time
         */
        public function setMatchTime(DateTime $match_time): void
        {
            $this->match_time = $match_time;
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
        public function getVenue(): string
        {
            return $this->venue;
        }

        /**
         * @param string $venue
         */
        public function setVenue(string $venue): void
        {
            $this->venue = $venue;
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
         * @return Date
         */
        public function getMatchDate(): Date
        {
            return $this->match_date;
        }

        /**
         * @param Date $match_date
         */
        public function setMatchDate(Date $match_date): void
        {
            $this->match_date = $match_date;
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
         * @return Category
         */
        public function getCategory(): Category
        {
            return $this->category;
        }

        /**
         * @param Category $category
         */
        public function setCategory(Category $category): void
        {
            $this->category = $category;
        }

        /**
         * @return int
         */
        public function getCategoryId(): int
        {
            return $this->category_id;
        }

        /**
         * @param int $category_id
         */
        public function setCategoryId(int $category_id): void
        {
            $this->category_id = $category_id;
        }
}
