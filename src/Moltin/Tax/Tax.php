<?php namespace Moltin\Tax;

class Tax
{
    protected $percentage;
    protected $deductModifier;
    protected $addModifier;
    
    /**
     * When constructing the tax class, you can either
     * pass in a percentage, or a price before and after
     * tax and have the library work out the tax rate
     * automatically.
     * 
     * @param float $value The percentage of your tax (or price before tax)
     * @param float $after The value after tax
     */
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
