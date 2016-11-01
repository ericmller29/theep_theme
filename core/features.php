<?php

class Features {
	function __construct(){
		add_filter( 'image_send_to_editor', array($this, 'html5_insert_image'), 10, 10);
	}
	function html5_insert_image($html, $id, $caption, $title, $align, $url, $size, $alt) {
		$src  = wp_get_attachment_image_src( $id, $size, false );
		$html5 = "<figure class='align$align content-image'>";

		$html5 .= '<div class="image">';
			$html5 .= "<img src='$src[0]' alt='$alt' />";
		$html5 .= "</div>";

		if ($caption) {
			$html5 .= "<figcaption>$caption</figcaption>";
		}

		$html5 .= "</figure>";
		return $html5;
	}
}
$features = new Features();