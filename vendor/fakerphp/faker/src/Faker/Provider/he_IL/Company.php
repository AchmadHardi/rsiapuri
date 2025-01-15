<?php

namespace Faker\Provider\he_IL;

class Company extends \Faker\Provider\Company
{
    protected static $formats = [
        '{{lastName}} {{companyuffix}}',
        '{{lastName}} את {{lastName}} {{companyuffix}}',
        '{{lastName}} ו{{lastName}}',
    ];

    protected static $companyuffix = ['בע"מ', 'ובניו', 'סוכנויות', 'משווקים'];
}
