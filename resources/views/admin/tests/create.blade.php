@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.test.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tests.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="exam_id">{{ trans('cruds.test.fields.exam') }}</label>
                <select class="form-control select2 {{ $errors->has('exam') ? 'is-invalid' : '' }}" name="exam_id" id="exam_id" required>
                    @foreach($exams as $id => $entry)
                        <option value="{{ $id }}" {{ old('exam_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('exam'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exam') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.exam_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="patient_id">{{ trans('cruds.test.fields.patient') }}</label>
                <select class="form-control select2 {{ $errors->has('patient') ? 'is-invalid' : '' }}" name="patient_id" id="patient_id" required>
                    @foreach($patients as $id => $entry)
                        <option value="{{ $id }}" {{ old('patient_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('patient'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.patient_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.test.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('customer_received') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="customer_received" value="0">
                    <input class="form-check-input" type="checkbox" name="customer_received" id="customer_received" value="1" {{ old('customer_received', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="customer_received">{{ trans('cruds.test.fields.customer_received') }}</label>
                </div>
                @if($errors->has('customer_received'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_received') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.customer_received_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="results">{{ trans('cruds.test.fields.results') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('results') ? 'is-invalid' : '' }}" name="results" id="results">{!! old('results') !!}</textarea>
                @if($errors->has('results'))
                    <div class="invalid-feedback">
                        {{ $errors->first('results') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.results_helper') }}</span>
            </div>

            <div class='form-group'>
              <button class="add_field_button btn btn-info btn-xs" style="border-radius: 0">Need More Reagents?</button>
          </div>
          <div class='row'>
                  <div class="col">
                      <label for="reagents">{{ trans('cruds.order.fields.reagents') }}</label>
                      <select class="form-control  select2 {{ $errors->has('reagents') ? 'is-invalid' : '' }}" name="reagents[]" id="reagents">
                          @foreach($reagents as $id => $reagent)
                              <option value="{{ $id }}" {{ in_array($id, old('reagents', [])) ? 'selected' : '' }}>{{ $reagent }}</option>
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


@section('scripts')
<script>
    $(document).ready(function() {
        var max_fields = 8; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append(`
                <div class="row">
                                <br>
                                <hr />
                                <br>
                                <div class="col">
                                    <label for="reagents">{{ trans('cruds.order.fields.reagents') }}</label>
                                    <select class="form-control  select2 {{ $errors->has('reagents') ? 'is-invalid' : '' }}" name="reagents[]" id="reagents">
                                        @foreach($reagents as $id => $reagent)
                                            <option value="{{ $id }}" {{ in_array($id, old('reagents', [])) ? 'selected' : '' }}>{{ $reagent }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="required" for="quantity">{{ trans('cruds.order.fields.quantity') }}</label>
                                    <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text" name="quantities[]" id="quantity" value="{{ old('quantity', '') }}" required>
                                </div>    
                                <div class="col-lg-2">	
                                <br>
                                            <button class="btn btn-outline-danger remove_field" type="button">Remove</button>
                                </div>
                                </div>
                                <br> <br>
                                `); //add input box
            }
        });
        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        })
    });
    </script>

<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.tests.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $test->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection