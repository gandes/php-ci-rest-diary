<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('username'))
{
    function username_validate_length($username){
        if(strlen($username) >= 6 && strlen($username) <= 32){
            return true;
        } else {
            return false;
        }
    }  
}

if ( ! function_exists('username_validate_upper'))
{
    function username_validate_upper($username){
        return preg_match('/[A-Z]+/', $username);
    }  
}

if ( ! function_exists('username_validate_lower'))
{
    function username_validate_lower($username){
        return preg_match('/[a-z]+/', $username);
    }  
}

if ( ! function_exists('username_validate_number'))
{
    function username_validate_number($username){
        return preg_match('/[0-9]+/', $username);
    }  
}

if ( ! function_exists('username_validate_special'))
{
    function username_validate_special($username){
        return preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]+/', $username);
    }  
}
    