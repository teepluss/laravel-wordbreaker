<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Default Data From Dictionary
    |--------------------------------------------------------------------------
    |
    | The data should be array, this config can load the default
    | data from the database.
    |
    */

    'dict' => function()
    {
        // return Cache::remember('dictionary', 60, function()
        // {
        //     return Dictionary::orderBy('word')->lists('word');
        // });

        return array();
    },


    /*
    |--------------------------------------------------------------------------
    | Minimum Length
    |--------------------------------------------------------------------------
    |
    | Reduce the junk results by set minimum.
    |
    */

    'minLen' => 2,


    /*
    |--------------------------------------------------------------------------
    | Re-sorting Dictionary Array
    |--------------------------------------------------------------------------
    |
    | Sorting the wording by PHP native, this might drop your performance,
    | I suggest you to use native sorting from the database.
    |
    */

    'array_sorting' => true,


    /*
    |--------------------------------------------------------------------------
    | Cleaning Input
    |--------------------------------------------------------------------------
    |
    | You can interrupt the logic cleaning input here.
    |
    */

    'input_cleaning' => function($str)
    {
        //$str = htmlspecialchars($str);

        return $str;
    }

);