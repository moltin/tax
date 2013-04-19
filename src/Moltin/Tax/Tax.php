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
}