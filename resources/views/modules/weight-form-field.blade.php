<div class='form-group row align-middle'>
    <div class='col-sm-5 text-right no-right-gutter'>
        <span><strong>Weight</strong></span>
    </div>
    <div class='col-sm-7'>
        <input type='text' id='weightValue' name='weightValue'
               @if (old('weightValue')) value='{{old('weightValue')}}'
               @else
               @if(isset($weightValue)) value='{{ $weightValue }}' @endif
                @endif>
        <input type='radio' id='lbs' name='weightRadio' value='lbs'
        @if(old('weightRadio'))  @if(old('weightRadio') === 'lbs') {{ 'checked'  }} @endif
                @else
            @if(isset($weightRadio)) @if($weightRadio === 'lbs') {{ 'checked' }} @endif @else {{ 'checked' }} @endif
                @endif>
        <span>lbs</span>
        <input type='radio' id='kgs' name='weightRadio' value='kgs'
        @if(old('weightRadio'))  @if(old('weightRadio') === 'kgs') {{ 'checked'  }} @endif
                @else
            @if(isset($weightRadio) && $weightRadio === 'kgs') {{ 'checked' }} @endif
                @endif>
        <span>kgs</span>
        @include('modules.error-form-field', ['field' => 'weightValue'])
    </div>
</div>