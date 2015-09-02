<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sweety extends Model
{
    protected $fillable = ['name', 'price', 'type'];

    protected $table = 'sweeties';

    private $name;

    private $price;

    /**
     * Gets Name.
     *
     * @return mixed|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * @param mixed $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets Pricate.
     *
     * @return mixed|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets Pricate.
     *
     * @param mixed $price
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public $timestamps = false;
}
