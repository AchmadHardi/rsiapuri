<?php

namespace Faker\Provider\is_IS;

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
    protected static $companyuffix = ['ehf.', 'hf.', 'sf.'];

    /**
     * @see http://www.rsk.is/atvinnurekstur/virdisaukaskattur/
     *
     * @var string VSK number format.
     */
    protected static $vskFormat = '%####';

    /**
     * Generates a VSK number (5 digits).
     *
     * @return string
     */
    public static function vsk()
    {
        return static::numerify(static::$vskFormat);
    }
}
