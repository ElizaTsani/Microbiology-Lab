<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReagentRequest;
use App\Http\Requests\StoreReagentRequest;
use App\Http\Requests\UpdateReagentRequest;
use App\Models\Reagent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReagentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reagent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reagents = Reagent::all();

        return view('admin.reagents.index', compact('reagents'));
    }

    public function create()
    {
        abort_if(Gate::denies('reagent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reagents.create');
    }

    public function store(StoreReagentRequest $request)
    {
        $reagent = Reagent::create($request->all());

        return redirect()->route('admin.reagents.index');
    }

    public function edit(Reagent $reagent)
    {
        abort_if(Gate::denies('reagent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reagents.edit', compact('reagent'));
    }

    public function update(UpdateReagentRequest $request, Reagent $reagent)
    {
        $reagent->update($request->all());

        return redirect()->route('admin.reagents.index');
    }

    public function show(Reagent $reagent)
    {
        abort_if(Gate::denies('reagent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reagent->load('reagentsOrders');

        return view('admin.reagents.show', compact('reagent'));
    }

    public function destroy(Reagent $reagent)
    {
        abort_if(Gate::denies('reagent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reagent->delete();

        return back();
    }

    public function massDestroy(MassDestroyReagentRequest $request)
    {
        $reagents = Reagent::find(request('ids'));

        foreach ($reagents as $reagent) {
            $reagent->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
