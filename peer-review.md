## P3 Peer Review

+ Reviewer's name: Satya P
+ Reviwee's name: Joshua R
+ URL to Reviewe's P3 Github Repo URL: *https://github.com/jpersson74/p3*

## 1. Interface
+ It felt interface has a dated look. It was not immediately clear the purpose of the application. But, after spending a couple of minutes, it was clear.
+ I think UI would be in a much better shape had the data entry and search aspects of the application were in different pages.
+ It seems the data entry and search aspects worked well independently and as expected.
+ A bit more modern look for the UI. Clicking the "Search Projects" button without entering any Project ID could have displayed all projects present in the database (file), instead of displaying an error message.


## 2. Functional testing
+ Submitting data entry section w/o any data produced required error messages. Same with search section.
+ Worked as expected when submitting with partial data. 
+ Even though there is a placeholder text for Project ID textbox, it was not immediately evident that a validation rule exists for it. But, the validation works as expected.
+ With Project ID validation rule in mind, I thought the Project Location textbox would also have a similar rule to validate the data to be in "city, state" format as indicated by the placeholder text. But, no such rule exists, it accepts alphanumeric characters and all special chars text.
+ Accessing a URL that does not exist on site, produced expected error page.  
+ The application accepted multiple projects with same ID and when searched with data ID, it returned all projects with that ID. But, it overlapped the copyright text at the bottom    

## 3. Code: Routes
+ Seems all good. The project used both POST and GET routes.

## 4. Code: Views
+ Yes
+ No
+ No
+ No

## 5. Code: General
+ No
+ No
+ I was under the impression when using the application that a db is being used to save the data entered by the user. But, all data is stored in a json file.
+ No
+ No. The code is very clear and concise.