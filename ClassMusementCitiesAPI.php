<?php
/**
 * @class           MusementCitiesAPI
 * @description     Class has two functions to list all cities and city information.
 */
class MusementCitiesAPI {

    private $musement_api_url = "https://api.musement.com/api/";
    public $m_a_ver = 'v3/'; //Musement Api Version

    //Get Cities List
    function getCitiesInformation() {
        $cities_endpoint_url = $this->musement_api_url . $this->m_a_ver . "cities.json";
        $cities_json = file_get_contents($cities_endpoint_url);
        $cities_info = json_decode($cities_json, true);

        return $cities_info;
    }

    //Get City Information
    function getCityInformationByID($id) {
        $city_endpoint_url = $this->musement_api_url . $this->m_a_ver . "cities/" . $id . ".json";
        $city_json = file_get_contents($city_endpoint_url);
        $city_info = json_decode($city_json, true);

        return $city_info;
    }
}