<?php

namespace App\Validation;

class CustomRules
{

    // Rule is to validate mobile number digits
    // public function mobileValidation(string $str, string $fields, array $data)
    public function mobileValidation(string $str)
    {

        /*Checking: Number must start from 5-9{Rest Numbers}*/
        // if (preg_match('/^[5-9]{1}[0-9]+/', $data['mobile'])) {
        if (preg_match('/^[8]{1}[0-9]+/', $str)) {

            /*Checking: Mobile number must be of 10 digits*/
            // $bool = preg_match('/^[0-9]{10}+$/', $data['mobile']);
            // return $bool == 0 ? false : true;
            return true;
        } else {

            return false;
        }
    }

    public function namaValidation(string $str)
    {
        if (preg_match('/^[a-z .,]+$/i', $str)) {
            return true;
        } else {
            return false;
        }
    }

    public function oldpass(string $str)
    {
    }
}
