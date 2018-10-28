<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CalorieEstimator\Person;

class CalorieEstimatorController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('CalorieEstimator.form')->with([
        'age' => $request->session()->get('age',''),
        'heightValue' => $request->session()->get('heightValue',''),
        'weightValue' => $request->session()->get('weightValue',''),
        'activity' => $request->session()->get('activity'),
        'compareCaloriesBurned' => $request->session()->get('$compareCaloriesBurned'),
        'calculateBmrHarris' => $request->session()->get('$calculateBmrHarris'),
        'bmrMifflin' => $request->session()->get('bmrMifflin',''),
        'bmrHarris' => $request->session()->get('bmrHarris',''),

        'caloriesBurnedMifflin' => $request->session()->get('caloriesBurnedMifflin',''),
        'caloriesForActivitiesMifflin' => $request->session()->get('caloriesForActivitiesMifflin','')
        ]);
    }

    public function calculateCaloriesBurned(Request $request)
    {
        $request->validate([
            'age' => 'required',
            'heightValue' => 'required',
            'weightValue' => 'required'
        ]);

        $age = $request->query('age');
        $gender = $request->query('gender');
        $heightValue = $request->query('heightValue');
        $weightValue = $request->query('weightValue');
        $heightRadio = $request->query('heightRadio');
        $weightRadio = $request->query('weightRadio');
        $height = $heightRadio == 'inches' ? ($heightValue/0.3937) : $heightValue;
        $weight = $weightRadio == 'lbs' ? ($weightValue/2.2046) : $weightValue;
        $activity = $request->query('activity');
        $calculateBmrHarris = $request->input('harrisBenedict', 'no');
        $compareCaloriesBurned = $request->input('compareCalories', 'no');

        # instantiate the Person class
        $person = new Person($age, $height, $weight, $gender, $activity);

        # Calculate BMR based on Mifflin St.Jeor equation
        $bmrMifflin = $person->calculateBMRMifflin();

        # Calculate calories burned/day based on activity levels and round the value
        $caloriesBurnedMifflin = $person->caloriesBurnedMifflin();

        # Calculate BMR based on Harris-Benedict equation and round the value
        if ($calculateBmrHarris == 'yes') {
            $bmrHarris = $person->calculateBMRHarris();
        }

        # Calculate calories burned based on different activity levels
        if ($compareCaloriesBurned == 'yes') {
            $caloriesForActivitiesMifflin = $person->compareCaloriesBurned();
        }

        return redirect('/')->with([
            'age' => $age,
            'gender' => $gender,
            'heightValue' => $heightValue,
            'weightValue' => $weightValue,
            'heightRadio' => $heightRadio,
            'weightRadio' => $weightRadio,
            'activity' => $activity,
            'calculateBmrHarris' => $calculateBmrHarris,
            'compareCaloriesBurned' => $compareCaloriesBurned,
            'bmrMifflin' => $bmrMifflin,
            'caloriesBurnedMifflin' => $caloriesBurnedMifflin,
            'bmrHarris' => $bmrHarris,
            'caloriesForActivitiesMifflin' => $caloriesForActivitiesMifflin
        ]);
    }
}

