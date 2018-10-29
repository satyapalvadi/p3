<div class='form-group row align-middle'>
    <div class='col-sm-5 no-right-gutter checkbox'>
        <input type='checkbox' id='harrisBenedict' name='harrisBenedict' value='yes'
               @if(old('harrisBenedict')) @if(old('harrisBenedict') === 'yes')) {{ 'checked' }} @endif
        @else
            @if (isset($harrisBenedict) && $harrisBenedict == 'yes') {{ 'checked' }} @endif
                @endif>
    </div>
    <div class='col-sm-7 text-left'>
        <span>Show BMR value for Harris-Benedict equation</span>
    </div>
</div>