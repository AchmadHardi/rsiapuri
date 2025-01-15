<?php

namespace Faker\Provider\fr_BE;

class Company extends \Faker\Provider\fr_FR\Company
{
    protected static $formats = [
        '{{lastName}} {{companyuffix}}',
        '{{lastName}}',
    ];

    protected static $companyuffix = ['ASBL', 'SCS', 'SNC', 'SPRL', 'Associations', 'Entreprise individuelle', 'GEIE', 'GIE', 'SA', 'SCA', 'SCRI', 'SCRL'];
}
