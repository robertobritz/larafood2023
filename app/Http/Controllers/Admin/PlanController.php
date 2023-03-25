<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $data = $request->all();
        $data['url'] = Str::of($request->name)->kebab();
        $this->repository->create($data);
    
        return redirect()->route('plans.index');
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();
        
        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    public function destroy($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();
        
        $plan->delete();

        return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token'); //para quando for utilizado o filtro, não passar o código do token

        $plans = $this->repository->search($request->filter); //método search foi incluido na model Plan, onde ele seleciona os filtros
        
        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters // serve para mandar para a view o filtro, só existe no método search, para não perder a paginação
        ]);
    }
}
