# Project 3
+ By: *Satya Palvadi*
+ Production URL: <http://p3.satyap.me>

## Outside resources
+ Formula used in this project are referred from [here](http://www.bmrcalculator.org/) and [here](https://en.wikipedia.org/wiki/Basal_metabolic_rate)
+ Bootstrap and css help from [here](http://getbootstrap.com/) and [here](https://www.w3schools.com/booTsTrap/default.asp)
+ Flexbox help from [here](https://css-tricks.com/snippets/css/a-guide-to-flexbox/)
+ Reused some code from the foobooks class example

## 3 Unique inputs
+ Text boxes to input age, weight, height.
+ Drop down to input activity levels.
+ Radio button groups to input gender, weight in inches or cms, height in kgs or lbs.
+ Checkbox to indicate if BMR to be calculated using Harris-Benedict equation. 

## Packages
+ barryvdh/laravel-debugbar

## Code style divergences
+ Some PHP and HTML code lines extend beyond 80 character limit (violation of a PSR-2 style guide)

## Notes for instructor
+ All form fields are in a separate blade module of their own. I decided to do this way as there is a lot of display logic for each field and having all fields in one blade file made the file unreadable.
