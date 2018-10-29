<div class='form-group row align-middle'>
    <div class='col-sm-5 no-right-gutter checkbox'>
        <input type='checkbox' id='compareCalories' name='compareCalories' value='yes'
               @if(old('compareCalories')) @if(old('compareCalories') === 'yes')) {{ 'checked' }} @endif
        @else
            @if (isset($compareCalories) && $compareCalories == 'yes') {{ 'checked' }} @endif
                @endif>
    </div>
    <div class='col-sm-7 text-left'>
        <span>Show how different activity levels impact the calories burned every day</span>
    </div>
</div>
<div class='col text-center'>
    <input class='btn btn-primary' type='submit' id='calculate' value='Calculate'>
</div>