<div class="row">
    <div class="col-md-6">
        @component('components.card', ['title' => 'File Upload Basics'])
            <fieldset>

                {{ Form::bsInput('name') }}

                {{ Form::bsTextarea('description') }}

            </fieldset>
        @endcomponent

        @isset($file)
            @component('components.card', ['title' => 'File Upload Info', 'class' => 'push-30-t'])
                {{ Form::bsInput('file_type', null, ['disabled' => true]) }}

                <div class="form-group">
                    <label>Existing File</label>
                    @if(Storage::disk($file->location)->exists($file->file_path))
                        <br>
                        <a href="{{ route('admin.file.view', $file->id) }}" target="_blank" class="btn btn-default">View
                            file</a>
                    @else
                        <div class="alert alert-danger">File cannot be found.</div>
                    @endif
                </div>
            @endcomponent
        @endisset
    </div>

    <div class="col-md-6">
        @component('components.card', ['title' => 'File Upload Classification', 'class' => 'push-30'])
            <fieldset>

                {{ Form::bsSelect('file_category_id', \App\FileCategory::all()->pluck('long_name', 'id')->toArray(), null, ['placeholder' => 'Category']) }}

                {{ Form::bsSelect('tags', \App\FileTag::all()->pluck('description', 'id')->toArray(), null, ['multi' => true]) }}

            </fieldset>
        @endcomponent

        @component('components.card', ['title' => 'File Upload'])
            {{ Form::bsInput('file_upload', null, ['file' => true]) }}
        @endcomponent
    </div>
</div>