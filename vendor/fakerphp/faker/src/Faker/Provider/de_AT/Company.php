<?php

namespace Faker\Provider\de_AT;

class Company extends \Faker\Provider\Company
{
    protected static $formats = [
        '{{lastName}} {{companyuffix}}',
        '{{lastName}}',
    ];

    protected static $companyuffix = ['AG', 'EWIV', 'Ges.m.b.H.', 'GmbH', 'KEG', 'KG', 'OEG', 'OG', 'OHG', 'SE'];
}
