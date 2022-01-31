<?php

namespace App\Http\Controllers;

class ConfigurationController
{
    /**
     * Display the category list.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('configuration', [

        ]);
    }
}
