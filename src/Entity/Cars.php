<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Cars
 * @package App\Entity
 * @ORM\Entity
 */
class Cars{
    /**
     * @var integer
     * @ORM\Column(name="cars_id", type="integer", nullable=false, options={"comment"="Cars_id"})
     * @ORM\Cars_id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="seq_cars_id", allocationSize=1, initialValue=1)
     */
    private $cars_id;

    /**
     * @var string
     * @ORM\Column(name="car_name", type="string", nullable=false, options={"comment"="Car_name"})
     */
    private $car_name;

    /**
     * @var string
     * @ORM\Column(name="spz", type="string", nullable=false, options={"comment"="Spz"})
     */
    private $spz;

    /**
     * @var integer
     * @ORM\Column(name="number_of_seats", type="integer", nullable=false, options={"comment"="Number_of_seats"})
     */
    private $number_of_seats;

    /**
     * @var string
     * @ORM\Column(name="driver_first_name", type="string", nullable=false, options={"comment"="Driver_first_name")
     */
    private $driver_first_name;

    /**
     * @var string
     * @ORM\Column(name="driver_last_name", type="string", nullable=false, options={"comment"="Driver_last_name")
     */
    private $driver_last_name;

    /**
     * @return string
     */
    public function getCarName(): string
    {
        return $this->car_name;
    }

    /**
     * @param $car_name
     * @return $this
     */
    public function setCarName($car_name): Cars
    {
        $this->car_name = $car_name;

        return $this;
    }

    /**
     * @return string
     */
    public function getSpz(): string
    {
        return $this->spz;
    }

    /**
     * @param $spz
     * @return $this
     */
    public function setSpz($spz): Cars
    {
        $this->spz = $spz;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumberOfSeats(): int
    {
        return $this->number_of_seats;
    }

    /**
     * @param $number_of_seats
     * @return $this
     */
    public function setNumberOfSeats($number_of_seats): Cars
    {
        $this->number_of_seats = $number_of_seats;

        return $this;
    }

    /**
     * @return string
     */
    public function getDriverFirstName(): string
    {
        return $this->driver_first_name;
    }

    /**
     * @param $driver_first_name
     * @return $this
     */
    public function setDriverFirstName($driver_first_name): Cars
    {
        $this->driver_first_name = $driver_first_name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDriverLastName(): string
    {
        return $this->driver_last_name;
    }

    /**
     * @param $driver_last_name
     * @return $this
     */
    public function setDriverLastName($driver_last_name): Cars
    {
        $this->driver_last_name = $driver_last_name;

        return $this;
    }




}
