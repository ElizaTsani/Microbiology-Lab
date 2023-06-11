@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.patient.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.patients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.id') }}
                        </th>
                        <td>
                            {{ $patient->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.first_name') }}
                        </th>
                        <td>
                            {{ $patient->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.last_name') }}
                        </th>
                        <td>
                            {{ $patient->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.phone') }}
                        </th>
                        <td>
                            {{ $patient->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.address') }}
                        </th>
                        <td>
                            {{ $patient->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.social_security_number') }}
                        </th>
                        <td>
                            {{ $patient->social_security_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exam.fields.disease') }}
                        </th>
                        <td>
                            @foreach($diseases_list as $disease)
                                <span class="badge badge-info">{{ $disease }} </span>
                                <br>

                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.patients.index') }}">
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
            <a class="nav-link" href="#patient_tests" role="tab" data-toggle="tab">
                {{ trans('cruds.test.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="patient_tests">
            @includeIf('admin.patients.relationships.patientTests', ['tests' => $patient->patientTests])
        </div>
    </div>
</div>

@endsection