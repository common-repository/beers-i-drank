<?php
/*
 Copyright (C) 2012 Sven Sommerfeld

 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program.  If not, see <http://www.gnu.org/licenses/>.

 **************************************************************************/

class PHPBeerRepository implements IBeerRepository{
	
	private static $countriesUrl = 'http://localhost/beersWebService/countries.php';
	private static $beersUrl = 'http://localhost/beersWebService/beers.php?country=%s';
	
	/**
	 * (non-PHPdoc)
	 * @see IBeerRepository::getAllCountries()
	 */
	public function getAllCountries(){
		$json = file_get_contents(self::$countriesUrl);
		return BIDJSONSerializer::deserlialize($json);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see IBeerRepository::getBeersForCountry()
	 */
	public function getBeersForCountry($countryName){
		$country = urlencode(str_replace(" ", "_", $countryName));
		$json = file_get_contents(sprintf(self::$beersUrl, $country));
		return BIDJSONSerializer::deserlialize($json);				
	}
}
?>