@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.order.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $order->code) }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_done">{{ trans('cruds.order.fields.date_done') }}</label>
                <input class="form-control date {{ $errors->has('date_done') ? 'is-invalid' : '' }}" type="text" name="date_done" id="date_done" value="{{ old('date_done', $order->date_done) }}">
                @if($errors->has('date_done'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_done') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.date_done_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_skipped">{{ trans('cruds.order.fields.date_skipped') }}</label>
                <input class="form-control date {{ $errors->has('date_skipped') ? 'is-invalid' : '' }}" type="text" name="date_skipped" id="date_skipped" value="{{ old('date_skipped', $order->date_skipped) }}" required>
                @if($errors->has('date_skipped'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_skipped') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.date_skipped_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label for="reagents">{{ trans('cruds.order.fields.reagents') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('reagents') ? 'is-invalid' : '' }}" name="reagents[]" id="reagents" multiple>
                    @foreach($reagents as $id => $reagent)
                        <option value="{{ $id }}" {{ (in_array($id, old('reagents', [])) || $order->reagents->contains($id)) ? 'selected' : '' }}>{{ $reagent }}</option>
                    @endforeach
                </select>
                @if($errors->has('reagents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reagents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.reagents_helper') }}</span>
            </div> --}}

            {{-- <div class='form-group'>
                <button class="add_field_button btn btn-info btn-xs" style="border-radius: 0">Need More Reagents?</button>
            </div>
            <div class='row'>
                    <div class="col">
                        <label for="reagents">{{ trans('cruds.order.fields.reagents') }}</label>
                        <select class="form-control  select2 {{ $errors->has('reagents') ? 'is-invalid' : '' }}" name="reagents[]" id="reagents">
                            @foreach($reagents as $id => $reagent)
                                <option value="{{ $id }}" {{ in_array($id, old('reagents', [])) || $order->reagents->contains($id) ? 'selected' : '' }}>{{ $reagent }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('reagents'))
                            <div class="invalid-feedback">
                                {{ $errors->first('reagents') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.order.fields.reagents_helper') }}</span>
                    </div>
                    <div class="col">
                        <label class="required" for="quantity">{{ trans('cruds.order.fields.quantity') }}</label>
                        <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text" name="quantities[]" id="quantity" value="{{ old('quantity', '') }}" required>
                        @if($errors->has('quantity'))
                            <div class="invalid-feedback">
                                {{ $errors->first('quantity') }}
                            </div>
                        @endif
                    </div>    
                    
            </div>
            <br>
            <div class='input_fields_wrap container'>
            </div> --}}


            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection