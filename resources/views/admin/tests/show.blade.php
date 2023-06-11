@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.test.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.id') }}
                        </th>
                        <td>
                            {{ $test->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.exam') }}
                        </th>
                        <td>
                            {{ $test->exam->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.patient') }}
                        </th>
                        <td>
                            {{ $test->patient->social_security_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.date') }}
                        </th>
                        <td>
                            {{ $test->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.customer_received') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $test->customer_received ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.reagents') }}
                        </th>
                        <td>
                            @foreach($test->reagents as $key => $reagents)
                                <span class="badge badge-info">Code: {{ $reagents->code }}, Stock Available: {{ $reagents->available_stock }}</span>
                                <br>
                                @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.results') }}
                        </th>
                        <td>
                            {!! $test->results !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection