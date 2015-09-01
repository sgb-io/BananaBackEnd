<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    private $total;

    public function sweeties()
    {
        return $this->belongsToMany(Sweety::class);
    }

    /**
     * Gets Total.
     *
     * @return mixed|null
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Sets Total.
     *
     * @param mixed $total
     *
     * @return $this
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
}
