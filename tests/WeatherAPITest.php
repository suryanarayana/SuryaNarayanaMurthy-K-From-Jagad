<?php
use PHPUnit\Framework\TestCase;

ini_set('include_path', '../'.__DIR__);

require_once 'Configuration.php';

class WeatherAPITest extends TestCase
{
    public function testCityInformationByID()
    {
        $city_name = "London";
        $city_weather = G::Obj('WeatherAPI')->getWeatherForecastByCity($city_name);

        $today = @$city_weather['forecast']['forecastday'][0]['day']['condition']['text'];
        $tomorrow = @$city_weather['forecast']['forecastday'][1]['day']['condition']['text'];

        $this->assertNotNull($today, "Today climate data is empty - " . $today);
        $this->assertNotNull($tomorrow, "Tomorrow climate data is empty - " . $tomorrow);
    }

}