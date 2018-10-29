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