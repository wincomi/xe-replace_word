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
	$content = Context::get('content');

	if($addon_info->type1 == 'Y') {
		$content = preg_replace("/됬/", "됐", $content);
	}
	
	if($addon_info->type2 == 'Y') {
		$content = preg_replace("/되요/", "돼요", $content);
	}

	Context::set('content', $content);
}

/* End of file replace_word.addon.php */
/* Location: ./addons/replace_word */