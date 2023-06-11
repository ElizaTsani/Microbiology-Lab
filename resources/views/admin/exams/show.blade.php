@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.exam.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.exams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.exam.fields.id') }}
                        </th>
                        <td>
                            {{ $exam->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exam.fields.name') }}
                        </th>
                        <td>
                            {{ $exam->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exam.fields.code') }}
                        </th>
                        <td>
                            {{ $exam->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exam.fields.disease') }}
                        </th>
                        <td>
                            {{ $exam->disease }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.exams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#exam_tests" role="tab" data-toggle="tab">
                {{ trans('cruds.test.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="exam_tests">
            @includeIf('admin.exams.relationships.examTests', ['tests' => $exam->examTests])
        </div>
    </div>
</div>

@endsection