<?php
//test this
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExamRequest;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Exam;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExamsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('exam_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exams = Exam::all();

        return view('admin.exams.index', compact('exams'));
    }

    public function create()
    {
        abort_if(Gate::denies('exam_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.exams.create');
    }

    public function store(StoreExamRequest $request)
    {
        $exam = Exam::create($request->all());

        return redirect()->route('admin.exams.index');
    }

    public function edit(Exam $exam)
    {
        abort_if(Gate::denies('exam_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.exams.edit', compact('exam'));
    }

    public function update(UpdateExamRequest $request, Exam $exam)
    {
        $exam->update($request->all());

        return redirect()->route('admin.exams.index');
    }

    public function show(Exam $exam)
    {
        abort_if(Gate::denies('exam_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exam->load('examTests');

        return view('admin.exams.show', compact('exam'));
    }

    public function destroy(Exam $exam)
    {
        abort_if(Gate::denies('exam_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exam->delete();

        return back();
    }

    public function massDestroy(MassDestroyExamRequest $request)
    {
        $exams = Exam::find(request('ids'));

        foreach ($exams as $exam) {
            $exam->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
