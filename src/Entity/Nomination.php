<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Nomination
 * @package App\Entity
 * @ORM\Entity
 */
class Nomination{
        /**
         * @var integer
         * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="ID"})
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="SEQUENCE")
         * @ORM\SequenceGenerator(sequenceName="seq_nomination_id", allocationSize=1, initialValue=1)
         */
        private $id;

        /**
         * @var User
         * @ORM\ManyToOne(targetEntity="App\Entity\User")
         * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
         */
        private $user;

        /**
         * @var Matches
         * @ORM\ManyToOne(targetEntity="App\Entity\Matches")
         * @ORM\JoinColumn(name="matches_id", referencedColumnName="id", nullable=false)
         */
        private $matches;

        /**
         * @var integer
         * @ORM\Column(name="user_id", type="integer", nullable=false, options={"comment"="User_id"})
         */
        protected $user_id;

        /**
         * @var integer
         * @ORM\Column(name="matches_id", type="integer", nullable=false, options={"comment"="Matches_id"})

         */
        protected $matches_id;

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
         * @return User
         */
        public function getUser(): User
        {
            return $this->user;
        }

        /**
         * @param User $user
         */
        public function setUser(User $user): void
        {
            $this->user = $user;
        }

        /**
         * @return Matches
         */
        public function getMatches(): Matches
        {
            return $this->matches;
        }

        /**
         * @param Matches $matches
         */
        public function setMatches(Matches $matches): void
        {
            $this->matches = $matches;
        }

        /**
         * @return int
         */
        public function getUserId(): int
        {
            return $this->user_id;
        }

        /**
         * @param int $user_id
         */
        public function setUserId(int $user_id): void
        {
            $this->user_id = $user_id;
        }

        /**
         * @return int
         */
        public function getMatchesId(): int
        {
            return $this->matches_id;
        }

        /**
         * @param int $matches_id
         */
        public function setMatchesId(int $matches_id): void
        {
            $this->matches_id = $matches_id;
        }


}
