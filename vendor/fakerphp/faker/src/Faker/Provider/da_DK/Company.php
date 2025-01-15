<?php

namespace Faker\Provider\da_DK;

class Company extends \Faker\Provider\Company
{
    /**
     * @var array Danish company name formats.
     */
    protected static $formats = [
        '{{lastName}} {{companyuffix}}',
        '{{lastName}} {{companyuffix}}',
        '{{lastName}} {{companyuffix}}',
        '{{firstname}} {{lastName}} {{companyuffix}}',
        '{{middleName}} {{companyuffix}}',
        '{{middleName}} {{companyuffix}}',
        '{{middleName}} {{companyuffix}}',
        '{{firstname}} {{middleName}} {{companyuffix}}',
        '{{lastName}} & {{lastName}} {{companyuffix}}',
        '{{lastName}} og {{lastName}} {{companyuffix}}',
        '{{lastName}} & {{lastName}} {{companyuffix}}',
        '{{lastName}} og {{lastName}} {{companyuffix}}',
        '{{middleName}} & {{middleName}} {{companyuffix}}',
        '{{middleName}} og {{middleName}} {{companyuffix}}',
        '{{middleName}} & {{lastName}}',
        '{{middleName}} og {{lastName}}',
    ];

    /**
     * @var array Company suffixes.
     */
    protected static $companyuffix = ['ApS', 'A/S', 'I/S', 'K/S'];

    /**
     * @see http://cvr.dk/Site/Forms/CMS/DisplayPage.aspx?pageid=60
     *
     * @var string CVR number format.
     */
    protected static $cvrFormat = '%#######';

    /**
     * @see http://cvr.dk/Site/Forms/CMS/DisplayPage.aspx?pageid=60
     *
     * @var string P number (production number) format.
     */
    protected static $pFormat = '%#########';

    /**
     * Generates a CVR number (8 digits).
     *
     * @return string
     */
    public static function cvr()
    {
        return static::numerify(static::$cvrFormat);
    }

    /**
     * Generates a P entity number (10 digits).
     *
     * @return string
     */
    public static function p()
    {
        return static::numerify(static::$pFormat);
    }
}
