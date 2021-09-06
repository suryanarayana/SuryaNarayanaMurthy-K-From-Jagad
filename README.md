Get weather forecast for all musement cities:
--------------------------------------------

File: 
----
index.php

Run Command: 
-----------
php index.php

Example Output:
--------------
Processed city Milan | Heavy rain - Partly cloudy


Technical Information:
---------------------

    API Class Files:
    ---------------

        ClassMusementCitiesAPI.php:
        --------------------------

            Variables (Can be updated):
            ---------
            Developer can update the version by updating variable - $m_a_ver 

            Methods:
            -------
            getCitiesInformation
                Description: We can get all the cities information by using this function.
            getCityInformationByID
                Description: We can get the particular city information by ID of the city.

        ClassWeatherAPI.php:
        -------------------

            Variables (Can be updated):
            ---------
            Developer can update the version by updating variable - $w_a_ver;
            Developer can update the days by updating variable - $days;


            Methods:
            -------
            getWeatherForecastByCity
                Description: Get the weather forecast for a particular city.
            getWeatherForecastForAllCities
                Description: Get the Weather Forecast(today, tomorrow) for all the musement cities.
            getInfoByUrl
                Description: Get the API data by using "GET" request

    Traits:
    ------
    
        File:
        ---- 
        TraitG.php 
        
            Description: 
            -----------
            Have only one static function to generate and return the object of a class by "ClassName"

    Configuration:
    -------------

        File:
        ----
        Configuration.php
        
            Description:
            -----------
            It has require statements of Class files and Trait and we can add other relevant information, if needed.

    Tests:
    -----

        File:
        ----
        tests/MusementCitiesAPITest.php

            Command To Test:
            ---------------
            phpunit tests/MusementCitiesAPITest.php

            Description:
            -----------
            The test will do a check that whether the cities information is coming from api or not.

        File:
        ----
        tests/WeatherAPITest.php

            Command To Test:
            ---------------
            phpunit tests/WeatherAPITest.php
            
            Description:
            -----------
            The test will do a check that whether the forecast information is coming from api or not.


Docker Commands To Build Image:
------------------------------
docker build -t jagad .

docker run -it --rm --name jagad_test jagad