<?php

namespace Faker\Provider;

class Company extends Base
{
    protected static $formats = [
        '{{lastName}} {{companyuffix}}',
    ];

    protected static $companyuffix = ['Ltd'];

    protected static $jobTitleFormat = [
        '{{word}}',
    ];

    /**
     * @example 'Acme Ltd'
     *
     * @return string
     */
    public function company()
    {
        $format = static::randomElement(static::$formats);

        return $this->generator->parse($format);
    }

    /**
     * @example 'Ltd'
     *
     * @return string
     */
    public static function companyuffix()
    {
        return static::randomElement(static::$companyuffix);
    }

    /**
     * @example 'Job'
     *
     * @return string
     */
    public function jobTitle()
    {
        $format = static::randomElement(static::$jobTitleFormat);

        return $this->generator->parse($format);
    }
}
