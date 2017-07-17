<?php
if(!defined("__XE__")) {
	exit();
}

/**
 * @file replace_word.addon.php
 * @author Wincomi (admin@wincomi.com)
 * @brief 글과 댓글에 포함된 특정 단어를 치환합니다.
*/	

if($called_position == 'before_module_init' && ($this->act === 'procBoardInsertDocument' || $this->act === 'procBoardInsertComment'))
{
	$replace_words = array();
	
	$title = Context::get('title');
	$content = Context::get('content');

	if($addon_info->type1 == 'Y')
	{
		$replace_words[] = array("됬", "됐");
	}
	
	if($addon_info->type2 == 'Y')
	{
		$replace_words[] = array("되요", "돼요");
	}
	
	if($addon_info->type3 == 'Y')
	{
		$replace_words[] = array("되서", "돼서");
	}	

	for($i = 0; $i < count($replace_words); $i++) 
	{
		$title = preg_replace("/".$replace_words[$i][0]."/", $replace_words[$i][1], $title);
		$content = preg_replace("/".$replace_words[$i][0]."/", $replace_words[$i][1], $content);		
	}

	Context::set('title', $title);
	Context::set('content', $content);
}

/* End of file replace_word.addon.php */
/* Location: ./addons/replace_word */