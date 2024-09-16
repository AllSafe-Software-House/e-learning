<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Webinar;

class BonusCardController extends Controller
{
    public function index()
    {
        return view('web.default.pages.bonusCard');
    }
}
