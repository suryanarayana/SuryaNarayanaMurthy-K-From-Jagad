<?php
require_once 'Configuration.php';

//Get Weather Forecast Inforamtion For All Cities
G::Obj('WeatherAPI')->getWeatherForecastForAllCities();
?>