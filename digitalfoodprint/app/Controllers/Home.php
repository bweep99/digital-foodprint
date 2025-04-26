<?php

namespace App\Controllers;

class Home extends BaseController

{
    public function index(): string
    {
        return view('welcome_messsage');
    }

    public function DFPHome()
    {
        return view('home/index');
    }

    public function DFPtracetaste()
    {
        return view('home/tracetaste');
    }

    public function DFPgrowpedia()
    {
        return view('home/growpedia');
    }

    public function DFPshipitout()
    {
        return view('home/ship_it_out');
    }
    public function DFPnusantara()
    {
        return view('home/nusantara');
    }
    public function DFPecobit()
    {
        return view('home/ecobit');
    }

    public function DFPagritales()
    {
        return view('home/agritales');
    }
    
    
}

