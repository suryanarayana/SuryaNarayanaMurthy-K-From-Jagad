<?php
/**
 * @class           WeatherAPI
 * @description     Class has two functions to list weather forecast for all cities and weather forecast for city information.
 */
class WeatherAPI {

    private $weather_api_url = "http://api.weatherapi.com/";
    public $w_a_ver = "v1/";
    private $api_key = "d783eeec46404f54b0c92346211508";
    public $days = '2';

    function getWeatherForecastByCity($city) {
        $w_f_endpoint = $this->weather_api_url . $this->w_a_ver . "forecast.json?key=".$this->api_key."&q=".$city."&days=".$this->days;

        $weather_forecast_info = $this->getInfoByUrl($w_f_endpoint);

        return $weather_forecast_info;
    }

    function getWeatherForecastForAllCities() {
        $cities_list = G::Obj('MusementCitiesAPI')->getCitiesInformation();

        $out_put = "";
        foreach($cities_list as $city_info) {
            $city_name = $city_info['name'];

            $city_weather = $this->getWeatherForecastByCity($city_name);

            $today = @$city_weather['forecast']['forecastday'][0]['day']['condition']['text'];
            $tomorrow = @$city_weather['forecast']['forecastday'][1]['day']['condition']['text'];

            $out_put .=  "Processed city " . $city_name." | ".$today." - " . $tomorrow . "\n";
        }

        $out = fopen('php://stdout', 'w'); //output handler
        fputs($out, $out_put); //writing output operation
        fclose($out); //closing handler

        header("Content-Type:text");
        exit();
    }

    function getInfoByUrl($url) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        $result['error'] = '';
        if (curl_errno($ch)) {
            $result['error'] = curl_error($ch);
        }
        curl_close($ch); // Close the connection

        return $result;
    }
}