<?php

class id3 {
	
	/*http://www.zedwood.com/article/php-calculate-duration-of-mp3*/
	public static function getMD5Hash($filename) {
		$fd = fopen($filename, "rb");
 
		$block = fread($fd, 100);
		$offset = $this->skipID3v2Tag($block);
		fseek($fd, $offset, SEEK_SET);
		return md5(fread($fd, 163840));
	}
	
	/*http://www.zedwood.com/article/php-calculate-duration-of-mp3*/
	public static function skipID3v2Tag(&$block) {
		if (substr($block, 0,3)=="ID3") {
			$id3v2_flags = ord($block[5]);
			$flag_footer_present = $id3v2_flags & 0x10 ? 1 : 0;
			$z0 = ord($block[6]);
			$z1 = ord($block[7]);
			$z2 = ord($block[8]);
			$z3 = ord($block[9]);
			if ((($z0&0x80) == 0) && (($z1&0x80) == 0) && (($z2&0x80) == 0) && (($z3&0x80) == 0)) {
				$header_size = 10;
				$tag_size = (($z0&0x7f) * 2097152) + (($z1&0x7f) * 16384) + (($z2&0x7f) * 128) + ($z3&0x7f);
				$footer_size = $flag_footer_present ? 10 : 0;
				
				return $header_size + $tag_size + $footer_size;
			}
		}
		return 0;
	}	

	public static function remove($args)
	{
		
		//args
		$name = $args->name;
		
		$version = id3_get_version($name);
		
		if($version & ID3_V1_0){
			id3_remove_tag($name, ID3_V1_0);
		}elseif($version & ID3_V1_1){
			id3_remove_tag($name, ID3_V1_1);
		}elseif($version & ID3_V2){
			id3_remove_tag($name, ID3_V2);
		}
		
	}
	
	public static function set($args)
	{
		
		//only 1.0, 1.1
		
		//args
		$name = $args->name;
		$tag = $args->tag;
		
		if($version & ID3_V1_0)
		{
			id3_set_tag($name, $tag, ID3_V1_0);
		}
		elseif($version & ID3_V1_1)
		{
			id3_set_tag($name, $tag, ID3_V1_1);
		}
		else{
			return FALSE;
		}
		
	}
	
	public static function version()
	{
		
		//args
		$name = $args->name;
		
		$version = id3_get_version($name);
		if ($version & ID3_V1_0) 
		{
			return 1;
		}
		elseif ($version & ID3_V1_1) 
		{
			return 1.1;
		}
		elseif ($version & ID3_V2) 
		{
			return 2;
		}
	}
	
	public static function genre_list()
	{
		return id3_get_genre_list();
	}
	
}

?>