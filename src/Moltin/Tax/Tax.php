<?php namespace Moltin\Tax;

class Tax
{
    protected $percentage;
    protected $taxModifier;
    
    public function __construct($value)
    {
        $this->percentage = $value;
        $this->taxModifier = 1 - ($value / 100);
    }

    public function deduct($price)
    {
        return $price * $this->taxModifier;
    }
}
