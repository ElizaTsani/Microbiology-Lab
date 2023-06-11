@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reagent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reagents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reagent.fields.id') }}
                        </th>
                        <td>
                            {{ $reagent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reagent.fields.name') }}
                        </th>
                        <td>
                            {{ $reagent->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reagent.fields.code') }}
                        </th>
                        <td>
                            {{ $reagent->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reagent.fields.available_stock') }}
                        </th>
                        <td>
                            {{ $reagent->available_stock }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reagent.fields.minimum_reserve') }}
                        </th>
                        <td>
                            {{ $reagent->minimum_reserve }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reagents.index') }}">
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
            <a class="nav-link" href="#reagents_orders" role="tab" data-toggle="tab">
                {{ trans('cruds.order.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="reagents_orders">
            @includeIf('admin.reagents.relationships.reagentsOrders', ['orders' => $reagent->reagentsOrders])
        </div>
    </div>
</div>

@endsection