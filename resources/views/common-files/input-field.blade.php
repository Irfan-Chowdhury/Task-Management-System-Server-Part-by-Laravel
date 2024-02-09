<div class="col-md-{{ $colSize }}">
    <div class="form-group">
        @if ($fieldType !== 'checkbox')
            <label class="font-weight-bold">{{ $labelName }} @if($isRequired)<span class="text-danger">*</span> @endif </label>
        @endif

        @switch($fieldType)
            @case('text')
                <input {{ $isRequired ? 'required':'' }} type="text" name="{{ $nameData }}" id="{{ isset($idData) ? $idData : null }}" @if(isset($valueData)) value="{{ $valueData }}" @else placeholder="{{ $placeholderData }}" @endif class="form-control">
                @break
            @case('date')
                <input {{ $isRequired ? 'required':'' }} name="{{ $nameData }}" id="{{ isset($idData) ? $idData : null }}" @if(isset($valueData)) value="{{ $valueData }}" @else placeholder="{{ $placeholderData }}" @endif class="date form-control">
                @break
            @case('number')
                <input {{ $isRequired ? 'required':'' }} type="number" name="{{ $nameData }}" id="{{ isset($idData) ? $idData : null }}" @if(isset($valueData)) value="{{ $valueData }}" @else placeholder="{{ $placeholderData }}" @endif class="form-control">
                @break
            @case('file')
                <input {{ $isRequired ? 'required':'' }} type="file" name="{{ $nameData }}" id="{{ isset($idData) ? $idData : null }}" class="form-control">
                @break
            @case('password')
                <input {{ $isRequired ? 'required':'' }} type="password" name="{{ $nameData }}" id="{{ isset($idData) ? $idData : null }}" class="form-control">
                @break
            @case('textarea')
                <textarea  {{ $isRequired ? 'required':'' }} name="{{ $nameData }}" id="{{ isset($idData) ? $idData : null }}" @if(isset($placeholderData)) placeholder="{{ $placeholderData }}" @endif class="form-control ckeditor" rows="4"> @if(isset($valueData)) {{ $valueData }} @endif </textarea>
                @break
            @case('checkbox')
                <input  @if(isset($isChecked)) {{ $isChecked ? 'checked' : '' }}  @endif {{ $isRequired ? 'required':'' }} type="checkbox"  name="{{ $nameData }}" id="{{ isset($idData) ? $idData : null }}" @if(isset($valueData)) value="{{ $valueData }}" @endif> &nbsp;
                <label class="font-weight-bold">{{trans("file.$labelName")}}</label>
                @break
            @default
        @endswitch
    </div>
</div>
