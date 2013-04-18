<?php namespace Moltin\Tax;

class Tax
{
    protected $taxModifier;
    
    public function __construct($value)
    {
        $this->taxModifier = 1 - ($value - 100);
    }
}