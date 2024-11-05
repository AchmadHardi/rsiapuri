<?php

namespace Faker\Provider\fr_CH;

class Company extends \Faker\Provider\fr_FR\Company
{
    protected static $formats = [
        '{{lastName}} {{companyuffix}}',
        '{{lastName}} {{lastName}} {{companyuffix}}',
        '{{lastName}}',
        '{{lastName}}',
    ];

    protected static $companyuffix = ['AG', 'Sàrl', 'SA', 'GmbH'];
}
