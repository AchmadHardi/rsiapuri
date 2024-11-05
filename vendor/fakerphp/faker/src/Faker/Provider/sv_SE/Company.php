<?php

namespace Faker\Provider\sv_SE;

class Company extends \Faker\Provider\Company
{
    protected static $formats = [
        '{{lastName}} {{companyuffix}}',
        '{{lastName}} {{companyuffix}}',
        '{{lastName}} {{companyuffix}}',
        '{{firstName}} {{lastName}} {{companyuffix}}',
        '{{lastName}} & {{lastName}} {{companyuffix}}',
        '{{lastName}} & {{lastName}}',
        '{{lastName}} och {{lastName}}',
        '{{lastName}} och {{lastName}} {{companyuffix}}',
    ];

    protected static $companyuffix = ['AB', 'HB'];

    protected static $jobTitles = ['Automationsingenjör', 'Bagare', 'Digital Designer', 'Ekonom', 'Ekonomichef', 'Elektronikingenjör', 'Försäljare', 'Försäljningschef', 'Innovationsdirektör', 'Investeringsdirektör', 'Journalist', 'Kock', 'Kulturstrateg', 'Läkare', 'Lokförare', 'Mäklare', 'Programmerare', 'Projektledare', 'Sjuksköterska', 'Utvecklare', 'UX Designer', 'Webbutvecklare'];

    public function jobTitle()
    {
        return static::randomElement(static::$jobTitles);
    }
}
