<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {
        $plans = $this->repository->latest()->paginate();

        return view('admin/pages/plans/index', [
            'plans' =>$plans,
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }
    
    public function store(Request $request)
    {
        dd($request->all());
    }
}
