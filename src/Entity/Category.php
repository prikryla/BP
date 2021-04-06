<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Category{

    /**
     * @var integer
     * @ORM\Column(name="category_id", type="integer", nullable=false, options={"comment"="Category_id"})
     * @ORM\Category_id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="seq_category_id", allocationSize=1, initialValue=1)
     */
    private $category_id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", nullable=false, options={"comment"="Name"})
     */
    private $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name): Category
    {
        $this->name = $name;

        return $this;
    }
}
