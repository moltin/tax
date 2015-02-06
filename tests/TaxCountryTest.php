<?php

/**
 * This file is part of Moltin Tax, a PHP package to calculate
 * tax rates.
 *
 * Copyright (c) 2015 Moltin Ltd.
 * http://github.com/moltin/tax
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package moltin/tax
 * @author Chris Harvey <chris@molt.in>
 * @copyright 2015 Moltin Ltd.
 * @version dev
 * @link http://github.com/moltin/tax
 *
 */

use Moltin\Tax\TaxCountry;

class TaxCountryTest extends \PHPUnit_Framework_TestCase
{
    protected $country;
    protected $countryCode;

    public function setUp()
    {
        $this->taxCountry = new TaxCountry;
        $this->country = "United States";
        $this->countryCode = "US";
    }

    /**
     * Test country name and code validation
     */
    public function testValidateCountry()
    {
        // Check we get a country from a country name
        $this->assertEquals($this->taxCountry->validateCountry($this->country), $this->countryCode);

        // Check we get a country from a country code
        $this->assertEquals($this->taxCountry->validateCountry($this->countryCode), $this->countryCode);

        // Check we fail on a non country name
        $this->assertFalse($this->taxCountry->validateCountry("Narnia"));

        // Check we fail on a non country code
        $this->assertFalse($this->taxCountry->validateCountry("ZGH"));
    }

    /**
     * Test getting a full list of countries as an array
     */
    public function testGetCountries()
    {
        $this->assertInternalType("array", $this->taxCountry->getCountries());
    }
}