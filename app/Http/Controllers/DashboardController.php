<?php

namespace App\Http\Controllers;

class DashboardController
{
    /**
     * Display the category list.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('dashboard', [

        ]);
    }
}
