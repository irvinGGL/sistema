<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuario;

class Home extends BaseController
{
    public function index()
    {
        return view('signIn');
    }

}
