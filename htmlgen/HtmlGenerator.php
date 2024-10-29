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
class HtmlGenerator{
	
	private static $checkbox = "<input type=\"checkbox\" name=\"%s\" value=\"%s\">%s";

	public static function generateCheckboxList($array, $key, $value, $options){
		$html = "<fieldset>";
		$html .= "<legend >". $options->title ."</legend>";
		$html .= "<ul style=\"height:200px; overflow:auto; width:200px; border:1px solid black;\">";
		foreach($array as $current){
			$html .= "<li>" . sprintf(self::$checkbox, $current->$key, $current->$key, $current->$value) . "</li>";
		}
		$html .= "</ul>";
		$html .= "</fieldset>";
		return $html;
	}
}
?>