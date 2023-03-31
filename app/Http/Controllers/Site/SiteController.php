<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $plans = Plan::with('details')->orderBy('price', 'ASC')->get(); // em uma consulta traz todos os palanos, com os detalhes, ordenado pelo preço do menor ao maior

        return view('site.pages.home.index', compact('plans'));
    }
}
