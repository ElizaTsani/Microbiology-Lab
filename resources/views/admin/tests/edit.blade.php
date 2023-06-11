@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.test.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tests.update", [$test->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="exam_id">{{ trans('cruds.test.fields.exam') }}</label>
                <select class="form-control select2 {{ $errors->has('exam') ? 'is-invalid' : '' }}" name="exam_id" id="exam_id" required>
                    @foreach($exams as $id => $entry)
                        <option value="{{ $id }}" {{ (old('exam_id') ? old('exam_id') : $test->exam->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                        <option value="{{ $id }}" {{ (old('patient_id') ? old('patient_id') : $test->patient->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $test->date) }}" required>
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
                    <input class="form-check-input" type="checkbox" name="customer_received" id="customer_received" value="1" {{ $test->customer_received || old('customer_received', 0) === 1 ? 'checked' : '' }}>
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
                <textarea class="form-control ckeditor {{ $errors->has('results') ? 'is-invalid' : '' }}" name="results" id="results">{!! old('results', $test->results) !!}</textarea>
                @if($errors->has('results'))
                    <div class="invalid-feedback">
                        {{ $errors->first('results') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.results_helper') }}</span>
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