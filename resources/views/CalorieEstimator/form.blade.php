@extends('layouts.master')

@section('title')
    P3 - Calorie Burned Estimator
@endsection

@section('content')
    <div class='container container-style'>
        <!-- title -->
        <div class='col text-center'>
            <h1>Calories Burned Estimator</h1>
        </div>
        <div class='row'>
            <div class='col-sm-1'></div>
            <div class='col-sm-10 text-center text-secondary'>
                <p>This estimator calculates Basal metabolic rate (BMR), a metric which indicates the amount of calories expended when the body is at rest. Based on the calculated BMR and the activity level, it further estimates the calories burned every day.</p>
            </div>
            <div class='col-sm-1'></div>
        </div>

        <form action='calories/calculate' method='GET'>
            <!-- Age text box -->
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
                </div>
            </div>

            <!-- Gender radio -->
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

            <!-- Weight text box and units radio -->
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
                </div>
            </div>

            <!-- Height text box and units radio -->
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
                </div>
            </div>

            <!-- Drop down to select activity levels -->
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

            <!-- Checkbox to calculate using an alternate equation -->
            <div class='form-group row align-middle'>
                <div class='col-sm-5 no-right-gutter checkbox'>
                    <input type='checkbox' id='harrisBenedict' name='harrisBenedict' value='yes'
                    @if (isset($harrisBenedict) && $harrisBenedict == 'yes') {{ 'checked' }} @endif>
                </div>
                <div class='col-sm-7 text-left'>
                    <span>Show BMR value for Harris-Benedict equation</span>
                </div>
            </div>

            <!-- Checkbox to compare calories based on different activity levels -->
            <div class='form-group row align-middle'>
                <div class='col-sm-5 no-right-gutter checkbox'>
                    <input type='checkbox' id='compareCalories' name='compareCalories' value='yes'
                    @if (isset($compareCalories) && $compareCalories == 'yes') {{ 'checked' }} @endif>
                </div>
                <div class='col-sm-7 text-left'>
                    <span>Show how different activity levels impact the calories burned every day</span>
                </div>
            </div>
            <div class='col text-center'>
                <input class='btn btn-primary' type='submit' id='calculate' value='Calculate'>
            </div>
        </form>
    </div>

    @if($bmrMifflin)
        <div class='container'>
            <div class='row output-title'>
                <div class='col text-center'>
                    <h2>Results</h2>
                </div>
            </div>

            <!-- Displays BMR if it is set in the results -->
            <div class='row output-row'>
                <div class='col text-left'>
                    <span>BMR (MD Mifflin St Jeor equation): </span>
                    <span><strong><u>{{ $bmrMifflin }}</u></strong></span><span> calories/day</span>
                </div>
            </div>

            <!-- Displays calories burned if it is set in the results-->
            <div class='row output-row'>
                <div class='col text-left'>
                    <span>Calories burned based on your activity level: </span>
                    <span><strong><u>{{ $caloriesBurnedMifflin }}</u></strong></span><span> calories/day</span>
                </div>
            </div>

            <!-- Displays BMR calculated as per Harris-Benedict equation if the user selected the checkbox and if the value is set in results -->
            @if($harrisBenedict == 'yes')
                <div class='row output-row'>
                    <div class='col text-left'>
                        <span>BMR (Harris-Benedict equation): </span>
                        <span><strong><u>{{ $bmrHarris }}</u></strong></span><span> calories/day</span>
                    </div>
                </div>
            @endif

        <!-- Displays a table if the user selected the checkbox to compare and if the value array is set in results -->
            @if($compareCalories == 'yes')
                <div class='row justify-content-left table-row'>
                    <table class="table table-bordered">
                        <caption class='table-caption'>Table: Calories burned based on BMR (Mifflin St Jeor equation) and different activity levels.</caption>
                        <thead>
                        <tr>
                            <th scope='col'
                                class='text-center align-middle bg-light'
                                style='width:20%;'>Activity level
                            </th>
                            @foreach($caloriesForActivitiesMifflin as $key => $caloriesForActivityMifflin)
                                <th scope='col' style='width:16%;'
                                    class='text-center align-middle bg-light @if($key == $activity) matched-activity-table-cell text-primary @endif'>
                                    {{ ucwords(str_replace('_', ' ', $key)) }}
                                    @if ($key == $activity)
                                        <div class='text-primary'>(selected level)</div>
                                    @endif
                                </th>
                            @endforeach
                        </tr>
                        </thead>
                        <tr>
                            <th scope='col' class='text-center align-middle bg-light'>Calories burned/day</th>
                            @foreach ($caloriesForActivitiesMifflin as $key => $caloriesForActivityMifflin)
                                <td scope='col'
                                    class='text-center align-middle @if($key == $activity) matched-activity-table-cell text-primary @endif'>
                                    {{ $caloriesForActivitiesMifflin[$key] }}
                                </td>
                            @endforeach
                        </tr>
                    </table>
                </div>
            @endif
        </div>
    @endif
@endsection