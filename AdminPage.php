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
/**
 * 
 * Represents the admin page
 * @author Sven
 *
 */
class AdminPage{
	
	/**
	 * 
	 * The beer repository
	 * @var IBeerRepository
	 */
	private $beerRepo;
	
	/**
	 * 
	 * C'tor
	 * @param IBeerRepository $beerRepo
	 */
	public function __construct($beerRepo){
		$this->beerRepo = $beerRepo;
	}
	
	/**
	 * 
	 * Generates the html representation of the page
	 */
	public function display(){
		$opts = new stdClass();
		$opts->title="countries";
		
		$html = "";
		$html .= '<div class="wrap">';
		$html .= "<div id=\"icon-options-general\" class=\"icon32\"><br /></div><h2>Beers I Drank Settings</h2>";
		$html .= HtmlGenerator::generateCheckboxList($this->beerRepo->getAllCountries(), "id", "name", $opts );
		$html .= '</div>';
		return $html;
	}
}
?>