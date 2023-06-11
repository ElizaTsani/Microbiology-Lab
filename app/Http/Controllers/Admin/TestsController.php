<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTestRequest;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Models\Exam;
use App\Models\Patient;
use App\Models\Reagent;
use App\Models\Test;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class TestsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('test_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tests = Test::where('customer_received',False)->with(['exam', 'patient','reagents'])->get();

        return view('admin.tests.index', compact('tests'));
    }

    public function create()
    {
        abort_if(Gate::denies('test_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exams = Exam::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $patients = Patient::pluck('social_security_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reagents = Reagent::pluck('code', 'id');

        return view('admin.tests.create', compact('exams', 'patients','reagents'));
    }

    public function store(StoreTestRequest $request)
    {
        $test = Test::create($request->all());
        $flag = False;
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $test->id]);
        }
        $quantities = $request['quantities'];
        $reagents = $request['reagents'];
        $all_details = array_map(function ($reagents, $quantities) {
            return array_combine(
              ['reagent_id', 'quantity'],
              [$reagents,$quantities]
            );
          }, $reagents, $quantities);
          $inserts = [];
          foreach ($all_details as $detail) {
                $inserts[] = [
                  'test_id' => $test->id,
                  'reagent_id' => $detail['reagent_id'],
                  'quantity' => $detail['quantity'],
                ];
                $reagent = Reagent::find($detail['reagent_id']);
                $reagent->available_stock -= $detail['quantity'];
                $reagent->save();
                if ($reagent->available_stock < $reagent->minimum_reserve) {
                    $flag = True; 
                }
            }
        DB::table('reagent_usages')->insert($inserts);
        if($flag){
            return redirect()->route('admin.tests.index')->with('alert', 'One or more reagents have less available stock than the minimum reserve.');
        }else{
            return redirect()->route('admin.tests.index');
        }
    }

    public function edit(Test $test)
    {
        abort_if(Gate::denies('test_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exams = Exam::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $patients = Patient::pluck('social_security_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $test->load('exam', 'patient');

        return view('admin.tests.edit', compact('exams', 'patients', 'test'));
    }

    public function update(UpdateTestRequest $request, Test $test)
    {
        $test->update($request->all());

        return redirect()->route('admin.tests.index');
    }

    public function show(Test $test)
    {
        abort_if(Gate::denies('test_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $test->load('exam', 'patient','reagents');

        return view('admin.tests.show', compact('test'));
    }

    public function destroy(Test $test)
    {
        abort_if(Gate::denies('test_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $test->delete();

        return back();
    }

    public function massDestroy(MassDestroyTestRequest $request)
    {
        $tests = Test::find(request('ids'));

        foreach ($tests as $test) {
            $test->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('test_create') && Gate::denies('test_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Test();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
