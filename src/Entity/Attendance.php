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
     * @ORM\Column(name="attendance_id", type"integer", nullable=false, options={"comment"="Attendance_id"})
     * @ORM\Attendace_id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="seq_attendance_id", allocationSize=1, initialValue=1)
     */
    private $attendance_id;

    /**
     * @var boolean
     * @ORM\Column(name="attendance_check", type="boolean", nullable=false, options={"comment"="Attendance_check"})
     */
    private $attendace_check;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id", nullable=false)
     */
    private $user;

    /**
     * @var integer
     * @ORM\Column(name="user_id", type="integer", nullable=false, options={"comment"="User"}
     */
    protected $userId;

    /**
     * @param $attendance_check
     * @return $this
     */
    public function setAttendance($attendance_check): Attendance
    {
        $this->attendace_check = $attendance_check;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAttendance() : bool
    {
        return $this->attendance_check;
    }

    /**
     * @param Entity\User|null $user
     * @return $this
     */
    public function setUser(Entity\User $user = null): Attendance
    {
        $this->user = $user;
        $this->userId = $user->getId();

        return $this;
    }

    /**
     * @return Entity\User
     */
    public function getUser(): Entity\User
    {
        return $this->user;
    }

    /**
     * @param $userId
     */
    public function setUserId($userId): Attendance
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

}
