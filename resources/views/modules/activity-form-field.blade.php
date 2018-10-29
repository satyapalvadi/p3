<div class='form-group row align-middle'>
    <div class='col-sm-5 text-right no-right-gutter'>
        <span><strong>Activity level</strong></span>
    </div>
    <div class='col-sm-7'>
        <select name='activity'>
            <option value='low'
                    @if(old('activity')) @if(old('activity') === 'low')) {{ 'selected' }} @endif
            @else
                @if(isset($activity) && $activity === 'low') {{  'selected' }} @endif
                    @endif>Low - You get little to no exercise</option>
            <option value='light'
                    @if(old('activity')) @if(old('activity') === 'light')) {{ 'selected' }} @endif
            @else
                @if(isset($activity) && $activity === 'light') {{  'selected' }} @endif
                    @endif>Light - You exercise lightly (1-3 days per week)</option>
            <option value='moderate'
                    @if(old('activity')) @if(old('activity') === 'moderate')) {{ 'selected' }} @endif
            @else
                @if(isset($activity) && $activity === 'moderate') {{  'selected' }} @endif
                    @endif>Moderate - You exercise moderately (3-5 days per week)</option>
            <option value='high'
                    @if(old('activity')) @if(old('activity') === 'high')) {{ 'selected' }} @endif
            @else
                @if(isset($activity) && $activity === 'high') {{  'selected' }} @endif
                    @endif>High - You exercise heavily (6-7 days per week)</option>
            <option value='very_high'
                    @if(old('activity')) @if(old('activity') === 'very_high')) {{ 'selected' }} @endif
            @else
                @if(isset($activity) && $activity === 'very_high') {{  'selected' }} @endif
                    @endif>Very High - You exercise very heavily (i.e. 2x per day, extra heavy workouts)</option>
        </select>
    </div>
</div>