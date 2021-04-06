<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Attendance
 * @package App\Entity
 * @ORM\Entity
 */
class Attendance{
        /**
         * @var integer
         * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="ID"})
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="SEQUENCE")
         * @ORM\SequenceGenerator(sequenceName="seq_attendance_id", allocationSize=1, initialValue=1)
         */
        private $id;

        /**
         * @var boolean
         * @ORM\Column(name="attendance_check", type="boolean", nullable=false, options={"comment"="Attendance_check"})
         */
        private $attendace_check;

        /**
         * @var User
         * @ORM\ManyToOne(targetEntity="App\Entity\User")
         * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
         */
        private $user;

        /**
         * @var integer
         * @ORM\Column(name="user_id", type="integer", nullable=false, options={"comment"="User_id"})
         */
        protected $userId;

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
         * @return bool
         */
        public function isAttendaceCheck(): bool
        {
            return $this->attendace_check;
        }

        /**
         * @param bool $attendace_check
         */
        public function setAttendaceCheck(bool $attendace_check): void
        {
            $this->attendace_check = $attendace_check;
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
         * @return int
         */
        public function getUserId(): int
        {
            return $this->userId;
        }

        /**
         * @param int $userId
         */
        public function setUserId(int $userId): void
        {
            $this->userId = $userId;
        }

}
