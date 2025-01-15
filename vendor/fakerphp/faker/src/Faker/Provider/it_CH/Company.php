<?php

namespace Faker\Provider\it_CH;

class Company extends \Faker\Provider\Company
{
    protected static $formats = [
        '{{lastName}} {{companyuffix}}',
        '{{lastName}} {{lastName}} {{companyuffix}}',
        '{{lastName}}',
        '{{lastName}}',
    ];

    protected static $companyuffix = ['SA', 'Sarl'];
}
