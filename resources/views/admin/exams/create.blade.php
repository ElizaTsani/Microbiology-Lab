@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.exam.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.exams.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.exam.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exam.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.exam.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exam.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disease">{{ trans('cruds.exam.fields.disease') }}</label>
                <input class="form-control {{ $errors->has('disease') ? 'is-invalid' : '' }}" type="text" name="disease" id="disease" value="{{ old('disease', '') }}">
                @if($errors->has('disease'))
                    <div class="invalid-feedback">
                        {{ $errors->first('disease') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exam.fields.disease_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection