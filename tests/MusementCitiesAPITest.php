<?php
use PHPUnit\Framework\TestCase;

ini_set('include_path', 'C:\xampp\htdocs\jagad');

require_once 'Configuration.php';

class MusementCitiesAPITest extends TestCase
{
    public function testCitiesInformation()
    {
        $cities_list = G::Obj('MusementCitiesAPI')->getCitiesInformation();
        foreach($cities_list as $key=>$city_info) {
            $this->assertArrayHasKey('code', $city_info);
        }
    }

    public function testCityInformationByID()
    {
        $city_info = G::Obj('MusementCitiesAPI')->getCityInformationByID(47);
        $this->assertArrayHasKey('code', $city_info);
    }

}