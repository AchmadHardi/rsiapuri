<?php

namespace Faker\Provider\pt_PT;

class Company extends \Faker\Provider\Company
{
    protected static $formats = [
        '{{lastName}} {{companyuffix}}',
        '{{lastName}} {{lastName}}',
        '{{lastName}} e {{lastName}}',
        '{{lastName}} {{lastName}} {{companyuffix}}',
        'Grupo {{lastName}} {{companyuffix}}',
    ];

    protected static $companyuffix = ['e Filhos', 'e Associados', 'Lda.', 'S.A.'];
}
