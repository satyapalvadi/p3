@extends('layouts.master')

@section('title')
    P3 - Calorie Burned Estimator
@endsection

@section('content')
    <div class='container container-style'>
        {{-- title --}}
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
        {{-- Age text box --}}
        @include('modules.age-form-field')

        {{-- Gender radio --}}
        @include('modules.gender-form-field')

        {{-- Weight text box and units radio --}}
        @include('modules.weight-form-field')

        {{-- Height text box and units radio --}}
        @include('modules.height-form-field')

        {{-- Drop down to select activity levels --}}
        @include('modules.activity-form-field')

        {{-- Checkbox to calculate using an alternate equation --}}
        @include('modules.harris-checkbox-form-field')

        {{-- Checkbox to compare calories based on different activity levels --}}
        @include('modules.compare-calories-checkbox-form-field')
        </form>
    </div>

    {{-- Validation error message --}}
    @if(count($errors) > 0)
        <div class='container alert alert-danger'>
            Please correct the errors above.
        </div>
    @endif

    {{-- Results --}}
    @if($bmrMifflin)
        @include('modules.results')
    @endif
@endsection