<?php

namespace Faker\Provider\sl_SI;

class Company extends \Faker\Provider\Company
{
    protected static $formats = [
        '{{firstName}} {{lastName}} s.p.',
        '{{lastName}} {{companyuffix}}',
        '{{lastName}}, {{lastName}} in {{lastName}} {{companyuffix}}',
    ];

    protected static $companyuffix = ['d.o.o.', 'd.d.', 'k.d.', 'k.d.d.', 'd.n.o.', 'so.p.'];
}
