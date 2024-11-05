<?php

namespace Faker\Provider\el_CY;

class Company extends \Faker\Provider\Company
{
    protected static $companyuffix = [
        'ΛΤΔ',
        'Δημόσια εταιρεία',
        '& Υιοι',
        '& ΣΙΑ',
    ];

    protected static $formats = [
        '{{lastName}} {{companyuffix}}',
        '{{lastName}}-{{lastName}}',
    ];
}
