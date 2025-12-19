<?php

namespace App\Services\V1;

use Illuminate\Http\Request;

class CustomerQuery{
    // protected $allowedParms = [
    //     'postalCode' => ['eq', 'gt', 'lt']
    // ]

    protected $safeParms = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['eq', 'gt', 'lt']
    ];
}