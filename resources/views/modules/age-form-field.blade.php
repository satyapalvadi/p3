<div class='form-group row align-middle'>
    <div class='col-sm-5 text-right no-right-gutter'>
        <span><strong>Age</strong></span>
    </div>
    <div class='col-sm-7'>
        <input id='age' type='text' name='age'
               @if (old('age')) value='{{ old('age') }}'
               @else
               @if(isset($age)) value='{{ $age }}' @endif
                @endif >
        <span> Years</span>
        @include('modules.error-form-field', ['field' => 'age'])
    </div>
</div>
