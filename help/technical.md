# Explanation of the application

    The app is a catalog for a music store. The application references all the instruments like guitar, piano, drums etc ... It arranges the instruments by brand, by sub-type example: wind family, string family, family percussion.

# Table relations


    > The Instrument_Type Table has a Many to One relationship to the Mark table, an instrument only has one Mark

    > The Mark table has a one to many relationship to the instrument_type table, a mark can have multiple instruments

    > The instrument_type table has a Many to One relationship to Family_instrument, an instrument with only one family.
    
    > The family_instrument table has a one to many relation to instrument_type, a family can have multiple instruments

    >  The instrument_type table has a Many to Many relationship to the replacement table, an instrument may have several spare parts.
    
    > The SparePart table has a Many to Many relation to the instrument_type table, a spare part can have several instruments

## To restore the database

    Go to your database as phpmyadmin from the internet.
    Create a database, to create the database on phpmyadmin on the left is write "new database", called the ECF-data.
    Then go to import, browse, choose the .sql file in the project folder and then run.

## To Save the database

    Click on your database name on the left, Then go to export.
    Click on customize and uncheck data. 
    Go to the compression spot, select "zipped" and all at the bottom and execute.

    Then redo the same manipulation as before just uncheck structure

    Now redo the same manipulation but leave everything checked
    
    Normally you have 3 files. These files moved them to the database file