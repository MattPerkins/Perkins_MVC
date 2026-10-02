SDC310 MVC Assignment - Matthew Perkins

This project re-creates the Week 3 Midterm Address Book using MVC architecture.

FOLDER ORGANIZATION

model/
- AddressModel.php
- Contains the database connection and all SELECT, INSERT, UPDATE, and DELETE queries.

view/
- addresses.php
- edit.php
- Contains the user interface only.

controller/
- AddressController.php
- Handles user requests and connects the Model to the View.

public/
- style.css
- Contains all CSS styling.

index.php
- Starts the application and loads the controller.

database.sql
- Creates the same database/table and sample data used in the Week 3 Midterm.

LOCAL XAMPP SETUP

1. Copy the Perkins_MVC folder into:
   C:\xampp\htdocs\

2. Start Apache and MySQL in XAMPP.

3. If you already created the sdc310_midterm database for the Week 3 Midterm,
   you can keep using it.

4. If the database does not exist, open:
   http://localhost/phpmyadmin

5. Click Import, choose database.sql, and run the import.

6. Open the application at:
   http://localhost/Perkins_MVC/

The application should allow you to:
- View all address records
- Add a record
- Edit a record
- Delete a record

MVC REQUIREMENTS

Model:
All database access and query information is in model/AddressModel.php.

View:
All user interface code is in the view folder.
All styling is in public/style.css.

Controller:
All functions that connect the View and Model are in controller/AddressController.php.
