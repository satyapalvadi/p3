<div class='form-group row align-middle'>
    <div class='col-sm-5 text-right no-right-gutter'>
        <span><strong>Gender</strong></span>
    </div>
    <div class='col-sm-7'>
        <input type='radio' id='male' name='gender' value='male'
        @if(old('gender'))  @if(old('gender') === 'male') {{ 'checked'  }} @endif
                @else
            @if(isset($gender)) @if($gender === 'male') {{ 'checked' }} @endif @else {{ 'checked' }} @endif
                @endif>
        <span>Male</span>
        <input type='radio' id='female' name='gender' value='female'
        @if(old('gender'))  @if(old('gender') === 'female') {{ 'checked'  }} @endif
                @else
            @if(isset($gender) && $gender === 'female') {{ 'checked' }} @endif>
        @endif
        <span>Female</span>
    </div>
</div>