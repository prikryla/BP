<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Player_statistics
 * @package App\Entity
 * @ORM\Entity
 */
class Player_statistics{
        /**
         * @var integer
         * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="ID"})
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="SEQUENCE")
         * @ORM\SequenceGenerator(sequenceName="seq_player_statistics_id", allocationSize=1, initialValue=1)
         */
        private $id;

        /**
         * @var integer
         * @ORM\Column(name="successful_ft", type="integer", nullable=false, options={"comment"="Successful_ft"})
         */
        private $successful_ft;

        /**
         * @var integer
         * @ORM\Column(name="unsuccessful_ft", type="integer", nullable=false, options={"comment"="Unsuccessful_ft"})
         */
        private $unsuccessful_ft;

        /**
         * @var integer
         * @ORM\Column(name="two_points", type="integer", nullable=false, options={"comment"="Two_points"})
         */
        private $two_points;

        /**
         * @var integer
         * @ORM\Column(name="three_points", type="integer", nullable=false, options={"comment"="Three_points"})
         */
        private $three_points;

        /**
         * @var integer
         * @ORM\Column(name="fouls", type="integer", nullable=false, options={"comment"="Fouls"})
         */
        private $fouls;

        /**
         * @var integer
         * @ORM\Column(name="points", type="integer", nullable=false, options={"comment"="Points"})
         */
        private $points;

        /**
         * @var Users
         * @ORM\ManyToOne(targetEntity="App\Entity\Users")
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
         * @var Category
         * @ORM\ManyToOne(targetEntity="App\Entity\Category")
         * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
         */
        private $category;

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
         * @var integer
         * @ORM\Column(name="category_id", type="integer", nullable=false, options={"comment"="Category_id"})
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
         * @return int
         */
        public function getSuccessfulFt(): int
        {
            return $this->successful_ft;
        }

        /**
         * @param int $successful_ft
         */
        public function setSuccessfulFt(int $successful_ft): void
        {
            $this->successful_ft = $successful_ft;
        }

        /**
         * @return int
         */
        public function getUnsuccessfulFt(): int
        {
            return $this->unsuccessful_ft;
        }

        /**
         * @param int $unsuccessful_ft
         */
        public function setUnsuccessfulFt(int $unsuccessful_ft): void
        {
            $this->unsuccessful_ft = $unsuccessful_ft;
        }

        /**
         * @return int
         */
        public function getTwoPoints(): int
        {
            return $this->two_points;
        }

        /**
         * @param int $two_points
         */
        public function setTwoPoints(int $two_points): void
        {
            $this->two_points = $two_points;
        }

        /**
         * @return int
         */
        public function getThreePoints(): int
        {
            return $this->three_points;
        }

        /**
         * @param int $three_points
         */
        public function setThreePoints(int $three_points): void
        {
            $this->three_points = $three_points;
        }

        /**
         * @return int
         */
        public function getFouls(): int
        {
            return $this->fouls;
        }

        /**
         * @param int $fouls
         */
        public function setFouls(int $fouls): void
        {
            $this->fouls = $fouls;
        }

        /**
         * @return int
         */
        public function getPoints(): int
        {
            return $this->points;
        }

        /**
         * @param int $points
         */
        public function setPoints(int $points): void
        {
            $this->points = $points;
        }

        /**
         * @return Users
         */
        public function getUser(): Users
        {
            return $this->user;
        }

        /**
         * @param Users $user
         */
        public function setUser(Users $user): void
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


