## P3 Peer Review

+ Reviewer's name: Satya P
+ Reviwee's name: Catherine L
+ URL to Reviewe's P3 Github Repo URL: *https://github.com/vanillacandy/project3*

## 1. Interface
+ The interface is very simple and straight forward.
+ The UI would be much better with a bit more CSS.
+ Submitting the form takes user to results page. User then need to click browser back button or reload the home page to resubmit data. 
+ No need for bullets for radio buttons.
+ Not sure about the "Search" button. I think it should say "Calculate".

## 2. Functional testing
+ Submitting page w/o any data produced required error messages. 
+ Worked as expected generating proper error messages when submitting the form with partial data. 
+ Submitted form with partial data. Produced expected error messages. At this point, entered data for all input fields and submitted form. Results displayed in a separate page. Pressing the back button still shows error messages regaarding missing inputs.
+ Results page showed correct calculated value based on user's selections.

## 3. Code: Routes
+ Not sure if the following routes are needed to be present in the web.php file.
```
Route::get('/food/search', 'FoodController@search');
Route::get('/food/{title}', 'FoodController@search');
```

## 4. Code: Views
+ Yes
+ No
+ No
+ No

## 5. Code: General
+ No
+ No
+ No
+ No
+ No.