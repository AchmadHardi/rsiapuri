<?php

namespace Faker\Provider\lt_LT;

class Company extends \Faker\Provider\Company
{
    protected static $formats = [
        '{{companyuffix}} {{lastNameMale}}',
        '{{companyuffix}} {{lastNameMale}} ir {{lastNameMale}}',
        '{{companyuffix}} "{{lastNameMale}} ir {{lastNameMale}}"',
        '{{companyuffix}} "{{lastNameMale}}"',
    ];

    protected static $companyuffix = ['UAB', 'AB', 'IĮ', 'MB', 'VŠĮ'];
}
