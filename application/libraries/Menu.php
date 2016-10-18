<?php
	class Menu{
		function show_menu(){
			$obj =& get_instance();
			$obj->load->helper('url');
			$menu = "<ul id='navigation'>";
			$menu .= "<li>";
			$menu .= anchor("books/main","List of Books");
			$menu .= "</li>";
			$menu .= "<li>";
			$menu .= anchor("books/input","Input Book");
			$menu .= "</li>";
			$menu .= "<li>";
			$menu .= anchor("books/booklist","Update book");
			$menu .= "</li>";
			$menu .= "</ul>";
			
			return $menu;
		}
	}


?>