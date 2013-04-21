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
            $this->percentage = ($value - $after) / ($after * 100);
        }

        $this->deductModifier = 1 - ($value / 100);
        $this->addModifier = 1 + ($value / 100);
    }

    public function deduct($price)
    {
        return $price * $this->deductModifier;
    }

    public function add($price)
    {
        return $price * $this->addMofidier;
    }

    public function rate($price)
    {
        return $price - $this->deduct($price);
    }
}
