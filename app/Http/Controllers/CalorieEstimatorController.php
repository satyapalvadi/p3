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
        'gender' => $request->session()->get('gender'),
        'heightValue' => $request->session()->get('heightValue',''),
        'heightRadio' => $request->session()->get('heightRadio'),
        'weightValue' => $request->session()->get('weightValue',''),
        'weightRadio' => $request->session()->get('weightRadio'),
        'activity' => $request->session()->get('activity'),
        'compareCalories' => $request->session()->get('compareCalories','no'),
        'harrisBenedict' => $request->session()->get('harrisBenedict','no'),

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
        $gender = $request->get('gender');
        $heightValue = $request->get('heightValue');
        $weightValue = $request->get('weightValue');
        $heightRadio = $request->get('heightRadio');
        $weightRadio = $request->get('weightRadio');
        $height = $heightRadio === 'inches' ? ($heightValue/0.3937) : $heightValue;
        $weight = $weightRadio === 'lbs' ? ($weightValue/2.2046) : $weightValue;
        $activity = $request->get('activity');
        $harrisBenedict = $request->get('harrisBenedict');
        $compareCalories = $request->get('compareCalories');

        # instantiate the Person class
        $person = new Person($age, $height, $weight, $gender, $activity);

        # Calculate BMR based on Mifflin St.Jeor equation
        $bmrMifflin = $person->calculateBMRMifflin();

        # Calculate calories burned/day based on activity levels and round the value
        $caloriesBurnedMifflin = $person->caloriesBurnedMifflin();

        # Calculate BMR based on Harris-Benedict equation and round the value
        ($harrisBenedict === 'yes') ? $bmrHarris = $person->calculateBMRHarris() : null;

        # Calculate calories burned based on different activity levels
        ($compareCalories === 'yes') ? $caloriesForActivitiesMifflin = $person->compareCaloriesBurned() : null;

        $resultArray = [
            'age' => $age,
            'gender' => $gender,
            'heightValue' => $heightValue,
            'weightValue' => $weightValue,
            'heightRadio' => $heightRadio,
            'weightRadio' => $weightRadio,
            'activity' => $activity,
            'harrisBenedict' => $harrisBenedict,
            'compareCalories' => $compareCalories,
            'bmrMifflin' => $bmrMifflin,
            'caloriesBurnedMifflin' => $caloriesBurnedMifflin
        ];

        ($harrisBenedict === 'yes') ? $resultArray['bmrHarris'] = $bmrHarris : null;
        ($compareCalories === 'yes') ? $resultArray['caloriesForActivitiesMifflin'] = $caloriesForActivitiesMifflin : null;

        return redirect('/')->with($resultArray);
    }
}

