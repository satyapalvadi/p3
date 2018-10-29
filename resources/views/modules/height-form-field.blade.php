<div class='form-group row align-middle'>
    <div class='col-sm-5 text-right no-right-gutter'>
        <span><strong>Height</strong></span>
    </div>
    <div class='col-sm-7'>
        <input type='text' id='heightValue' name='heightValue'
               @if (old('heightValue')) value='{{old('heightValue')}}'
               @else
               @if(isset($heightValue)) value='{{ $heightValue }}' @endif
                @endif>
        <input type='radio' id='inches' name='heightRadio' value='inches'
        @if(old('heightRadio'))  @if(old('heightRadio') === 'inches') {{ 'checked'  }} @endif
                @else
            @if(isset($heightRadio)) @if($heightRadio === 'inches') {{ 'checked' }} @endif @else {{ 'checked' }} @endif
                @endif >
        <span>inches</span>
        <input type='radio' id='cms' name='heightRadio' value='cms'
        @if(old('heightRadio'))  @if(old('heightRadio') === 'cms') {{ 'checked'  }} @endif
                @else
            @if(isset($heightRadio) && $heightRadio === 'cms') {{ 'checked' }} @endif
                @endif >
        <span>cms</span>
        @include('modules.error-form-field', ['field' => 'heightValue'])
    </div>
</div>