@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.reagent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reagents.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.reagent.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reagent.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.reagent.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reagent.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="available_stock">{{ trans('cruds.reagent.fields.available_stock') }}</label>
                <input class="form-control {{ $errors->has('available_stock') ? 'is-invalid' : '' }}" type="text" name="available_stock" id="available_stock" value="{{ old('available_stock', '') }}" required>
                @if($errors->has('available_stock'))
                    <div class="invalid-feedback">
                        {{ $errors->first('available_stock') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reagent.fields.available_stock_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="minimum_reserve">{{ trans('cruds.reagent.fields.minimum_reserve') }}</label>
                <input class="form-control {{ $errors->has('minimum_reserve') ? 'is-invalid' : '' }}" type="text" name="minimum_reserve" id="minimum_reserve" value="{{ old('minimum_reserve', '') }}" required>
                @if($errors->has('minimum_reserve'))
                    <div class="invalid-feedback">
                        {{ $errors->first('minimum_reserve') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reagent.fields.minimum_reserve_helper') }}</span>
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