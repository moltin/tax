<?php namespace Moltin\Tax;

class Tax
{
    protected $percentage;
    protected $deductModifier;
    protected $addModifier;
    
    public function __construct($value, $after = null)
    {
        $this->percentage = $value;

        if (is_numeric($after)) {
            $this->percentage = (($after - $value) / $value) * 100;
        }

        $this->deductModifier = 1 - ($this->percentage / 100);
        $this->addModifier = 1 + ($this->percentage / 100);
    }

    public function deduct($price)
    {
        return $price * $this->deductModifier;
    }

    public function add($price)
    {
        return $price * $this->addModifier;
    }

    public function rate($price)
    {
        return $price - $this->deduct($price);
    }

    public function __get($property)
    {
        return $this->$property;
    }
}
