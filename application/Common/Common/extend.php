<?php
function msubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = true)
{
	if (function_exists("mb_substr")) $slice = mb_substr($str, $start, $length, $charset); elseif (function_exists('iconv_substr')) {
		$slice = iconv_substr($str, $start, $length, $charset);
		if (false === $slice) {
			$slice = '';
		}
	} else {
		$re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
		$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
		$re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
		$re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
		preg_match_all($re[$charset], $str, $match);
		$slice = join("", array_slice($match[0], $start, $length));
	}
	return $suffix ? $slice . '...' : $slice;
}

function rand_string($len = 6, $type = '', $addChars = '')
{
	$str = '';
	switch ($type) {
		case 0:
			$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' . $addChars;
			break;
		case 1:
			$chars = str_repeat('0123456789', 3);
			break;
		case 2:
			$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . $addChars;
			break;
		case 3:
			$chars = 'abcdefghijklmnopqrstuvwxyz' . $addChars;
			break;
		case 4:
			$chars = "们以我到他会作时要动国产的一是工就年阶义发成部民可出能方进在了不和有大这主中人上为来分生对于学下级地个用同行面说种过命度革而多子后自社加小机也经力线本电高量长党得实家定深法表着水理化争现所二起政三好十战无农使性前等反体合斗路图把结第里正新开论之物从当两些还天资事队批点育重其思与间内去因件日利相由压员气业代全组数果期导平各基或月毛然如应形想制心样干都向变关问比展那它最及外没看治提五解系林者米群头意只明四道马认次文通但条较克又公孔领军流入接席位情运器并飞原油放立题质指建区验活众很教决特此常石强极土少已根共直团统式转别造切九你取西持总料连任志观调七么山程百报更见必真保热委手改管处己将修支识病象几先老光专什六型具示复安带每东增则完风回南广劳轮科北打积车计给节做务被整联步类集号列温装即毫知轴研单色坚据速防史拉世设达尔场织历花受求传口断况采精金界品判参层止边清至万确究书术状厂须离再目海交权且儿青才证低越际八试规斯近注办布门铁需走议县兵固除般引齿千胜细影济白格效置推空配刀叶率述今选养德话查差半敌始片施响收华觉备名红续均药标记难存测士身紧液派准斤角降维板许破述技消底床田势端感往神便贺村构照容非搞亚磨族火段算适讲按值美态黄易彪服早班麦削信排台声该击素张密害侯草何树肥继右属市严径螺检左页抗苏显苦英快称坏移约巴材省黑武培著河帝仅针怎植京助升王眼她抓含苗副杂普谈围食射源例致酸旧却充足短划剂宣环落首尺波承粉践府鱼随考刻靠够满夫失包住促枝局菌杆周护岩师举曲春元超负砂封换太模贫减阳扬江析亩木言球朝医校古呢稻宋听唯输滑站另卫字鼓刚写刘微略范供阿块某功套友限项余倒卷创律雨让骨远帮初皮播优占死毒圈伟季训控激找叫云互跟裂粮粒母练塞钢顶策双留误础吸阻故寸盾晚丝女散焊功株亲院冷彻弹错散商视艺灭版烈零室轻血倍缺厘泵察绝富城冲喷壤简否柱李望盘磁雄似困巩益洲脱投送奴侧润盖挥距触星松送获兴独官混纪依未突架宽冬章湿偏纹吃执阀矿寨责熟稳夺硬价努翻奇甲预职评读背协损棉侵灰虽矛厚罗泥辟告卵箱掌氧恩爱停曾溶营终纲孟钱待尽俄缩沙退陈讨奋械载胞幼哪剥迫旋征槽倒握担仍呀鲜吧卡粗介钻逐弱脚怕盐末阴丰雾冠丙街莱贝辐肠付吉渗瑞惊顿挤秒悬姆烂森糖圣凹陶词迟蚕亿矩康遵牧遭幅园腔订香肉弟屋敏恢忘编印蜂急拿扩伤飞露核缘游振操央伍域甚迅辉异序免纸夜乡久隶缸夹念兰映沟乙吗儒杀汽磷艰晶插埃燃欢铁补咱芽永瓦倾阵碳演威附牙芽永瓦斜灌欧献顺猪洋腐请透司危括脉宜笑若尾束壮暴企菜穗楚汉愈绿拖牛份染既秋遍锻玉夏疗尖殖井费州访吹荣铜沿替滚客召旱悟刺脑措贯藏敢令隙炉壳硫煤迎铸粘探临薄旬善福纵择礼愿伏残雷延烟句纯渐耕跑泽慢栽鲁赤繁境潮横掉锥希池败船假亮谓托伙哲怀割摆贡呈劲财仪沉炼麻罪祖息车穿货销齐鼠抽画饲龙库守筑房歌寒喜哥洗蚀废纳腹乎录镜妇恶脂庄擦险赞钟摇典柄辩竹谷卖乱虚桥奥伯赶垂途额壁网截野遗静谋弄挂课镇妄盛耐援扎虑键归符庆聚绕摩忙舞遇索顾胶羊湖钉仁音迹碎伸灯避泛亡答勇频皇柳哈揭甘诺概宪浓岛袭谁洪谢炮浇斑讯懂灵蛋闭孩释乳巨徒私银伊景坦累匀霉杜乐勒隔弯绩招绍胡呼痛峰零柴簧午跳居尚丁秦稍追梁折耗碱殊岗挖氏刃剧堆赫荷胸衡勤膜篇登驻案刊秧缓凸役剪川雪链渔啦脸户洛孢勃盟买杨宗焦赛旗滤硅炭股坐蒸凝竟陷枪黎救冒暗洞犯筒您宋弧爆谬涂味津臂障褐陆啊健尊豆拔莫抵桑坡缝警挑污冰柬嘴啥饭塑寄赵喊垫丹渡耳刨虎笔稀昆浪萨茶滴浅拥穴覆伦娘吨浸袖珠雌妈紫戏塔锤震岁貌洁剖牢锋疑霸闪埔猛诉刷狠忽灾闹乔唐漏闻沈熔氯荒茎男凡抢像浆旁玻亦忠唱蒙予纷捕锁尤乘乌智淡允叛畜俘摸锈扫毕璃宝芯爷鉴秘净蒋钙肩腾枯抛轨堂拌爸循诱祝励肯酒绳穷塘燥泡袋朗喂铝软渠颗惯贸粪综墙趋彼届墨碍启逆卸航衣孙龄岭骗休借" . $addChars;
			break;
		default :
			$chars = 'ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789' . $addChars;
			break;
	}
	if ($len > 10) {
		$chars = $type == 1 ? str_repeat($chars, $len) : str_repeat($chars, 5);
	}
	if ($type != 4) {
		$chars = str_shuffle($chars);
		$str = substr($chars, 0, $len);
	} else {
		for ($i = 0; $i < $len; $i++) {
			$str .= msubstr($chars, floor(mt_rand(0, mb_strlen($chars, 'utf-8') - 1)), 1);
		}
	}
	return $str;
}

function build_verify($length = 4, $mode = 1)
{
	return rand_string($length, $mode);
}

function byte_format($size, $dec = 2)
{
	$a = array("B", "KB", "MB", "GB", "TB", "PB");
	$pos = 0;
	while ($size >= 1024) {
		$size /= 1024;
		$pos++;
	}
	return round($size, $dec) . " " . $a[$pos];
}

function is_utf8($string)
{
	return preg_match('%^(?:
         [\x09\x0A\x0D\x20-\x7E]            # ASCII
       | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
       |  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs
       | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
       |  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates
       |  \xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3
       | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
       |  \xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16
    )*$%xs', $string);
}

function highlight_code($str, $show = false)
{
	if (file_exists($str)) {
		$str = file_get_contents($str);
	}
	$str = stripslashes(trim($str));
	$str = str_replace(array('&lt;', '&gt;'), array('<', '>'), $str);
	$str = str_replace(array('&lt;?php', '?&gt;', '\\'), array('phptagopen', 'phptagclose', 'backslashtmp'), $str);
	$str = '<?php //tempstart' . "\n" . $str . '//tempend ?>';
	$str = highlight_string($str, TRUE);
	if (abs(phpversion()) < 5) {
		$str = str_replace(array('<font ', '</font>'), array('<span ', '</span>'), $str);
		$str = preg_replace('#color="(.*?)"#', 'style="color: \\1"', $str);
	}
	$str = preg_replace("#\<code\>.+?//tempstart\<br />\</span\>#is", "<code>\n", $str);
	$str = preg_replace("#\<code\>.+?//tempstart\<br />#is", "<code>\n", $str);
	$str = preg_replace("#//tempend.+#is", "</span>\n</code>", $str);
	$str = str_replace(array('phptagopen', 'phptagclose', 'backslashtmp'), array('&lt;?php', '?&gt;', '\\'), $str);
	$line = explode("<br />", rtrim(ltrim($str, '<code>'), '</code>'));
	$result = '<div class="code"><ol>';
	foreach ($line as $key => $val) {
		$result .= '<li>' . $val . '</li>';
	}
	$result .= '</ol></div>';
	$result = str_replace("\n", "", $result);
	if ($show !== false) {
		echo($result);
	} else {
		return $result;
	}
}

function h($text, $tags = null)
{
	$text = trim($text);
	$text = preg_replace('/<!--?.*-->/', '', $text);
	$text = preg_replace('/<\?|\?' . '>/', '', $text);
	$text = preg_replace('/<script?.*\/script>/', '', $text);
	$text = str_replace('[', '&#091;', $text);
	$text = str_replace(']', '&#093;', $text);
	$text = str_replace('|', '&#124;', $text);
	$text = preg_replace('/<br(\s\/)?' . '>/i', '[br]', $text);
	$text = preg_replace('/<br(\s)?(\/)?' . '>/i', '[br/]', $text);
	$text = preg_replace('/<p(\s\/)?' . '>/i', '[p]', $text);
	$text = preg_replace('/(\[br\]\s*){10,}/i', '[br]', $text);
	while (preg_match('/(<[^><]+)( lang|on|action|background|codebase|dynsrc|lowsrc)[^><]+/i', $text, $mat)) {
		$text = str_replace($mat[0], $mat[1], $text);
	}
	while (preg_match('/(<[^><]+)(window\.|javascript:|js:|about:|file:|document\.|vbs:|cookie)([^><]*)/i', $text, $mat)) {
		$text = str_replace($mat[0], $mat[1] . $mat[3], $text);
	}
	if (empty($tags)) {
		$tags = 'table|td|th|tr|i|b|u|strong|img|p|br|div|strong|em|ul|ol|li|dl|dd|dt|a|h1|h2|h3|h4|h5|h6|pre';
	}
	$text = preg_replace('/<(' . $tags . ')([^><\[\]]*)>/i', '[\1\2]', $text);
	$text = preg_replace('/<\/(' . $tags . ')>/Ui', '[/\1]', $text);
	$text = preg_replace('/<\/?(html|head|meta|link|base|basefont|body|bgsound|title|style|script|form|iframe|frame|frameset|applet|id|ilayer|layer|name|script|style|xml)[^><]*>/i', '', $text);
	while (preg_match('/<([a-z]+)[^><\[\]]*>[^><]*<\/\1>/i', $text, $mat)) {
		$text = str_replace($mat[0], str_replace('>', ']', str_replace('<', '[', $mat[0])), $text);
	}
	while (preg_match('/(\[[^\[\]]*=\s*)(\"|\')([^\2=\[\]]+)\2([^\[\]]*\])/i', $text, $mat)) {
		$text = str_replace($mat[0], $mat[1] . '|' . $mat[3] . '|' . $mat[4], $text);
	}
	while (preg_match('/\[[^\[\]]*(\"|\')[^\[\]]*\]/i', $text, $mat)) {
		$text = str_replace($mat[0], str_replace($mat[1], '', $mat[0]), $text);
	}
	$text = str_replace('<', '&lt;', $text);
	$text = str_replace('>', '&gt;', $text);
	$text = str_replace('"', '&quot;', $text);
	$text = str_replace('[', '<', $text);
	$text = str_replace(']', '>', $text);
	$text = str_replace('|', '"', $text);
	return $text;
}

function hh($text, $tags = null)
{
	$text = trim($text);
	$text = preg_replace('/<!--?.*-->/', '', $text);
	$text = preg_replace('/<\?|\?' . '>/', '', $text);
	$text = preg_replace('/<script?.*\/script>/', '', $text);
	while (preg_match('/<[^><]+\s(lang|on|action|background|codebase|dynsrc|lowsrc)[^=]*=[^>]+>/i', $text, $mat)) {
		$text = preg_replace("/(\s)(lang|on|action|background|codebase|dynsrc|lowsrc)[^=]*=[^\s>]*/", "", $text);
	}
	while (preg_match('/(<[^><]+)(window\.|javascript:|js:|about:|file:|document\.|vbs:|cookie)([^><]*)/i', $text, $mat)) {
		$text = str_replace($mat[0], $mat[1] . $mat[3], $text);
	}
	$text = str_replace('  ', ' ', $text);
	return $text;
}

function safe_html($text, $tags = null)
{
	$text = trim($text);
	$text = preg_replace('/<!--?.*-->/', '', $text);
	$text = preg_replace('/<\?|\?' . '>/', '', $text);
	$text = preg_replace('/<script?.*\/script>/', '', $text);
	$text = str_replace('[', '&#091;', $text);
	$text = str_replace(']', '&#093;', $text);
	$text = str_replace('|', '&#124;', $text);
	$text = preg_replace('/<br(\s\/)?' . '>/i', '[br]', $text);
	$text = preg_replace('/<br(\s)?(\/)?' . '>/i', '[br/]', $text);
	$text = preg_replace('/<p(\s\/)?' . '>/i', '[p]', $text);
	$text = preg_replace('/(\[br\]\s*){10,}/i', '[br]', $text);
	while (preg_match('/(<[^><]+)( lang|ondblclick|onclick|onload|onerror|unload|onmouseover|onmouseup|onmouseout|onmousedown|onkeydown|onkeypress|onkeyup|onblur|onchange|onfocus|action|background|codebase|dynsrc|lowsrc)[^><]+/i', $text, $mat)) {
		$text = str_replace($mat[0], $mat[1], $text);
	}
	while (preg_match('/(<[^><]+)(window\.|javascript:|js:|about:|file:|document\.|vbs:|cookie)([^><]*)/i', $text, $mat)) {
		$text = str_replace($mat[0], $mat[1] . $mat[3], $text);
	}
	if (empty($tags)) {
		$font_tags = 'i|b|u|s|em|strong|font|big|small|sup|sub|bdo|h1|h2|h3|h4|h5|h6|';
		$base_tags = $font_tags . 'p|br|hr|a|img|map|area|pre|code|q|blockquote|acronym|cite|ins|del|center|strike|';
		$tags = $base_tags . 'ul|ol|li|dl|dd|dt|table|caption|td|th|tr|thead|tbody|tfoot|col|colgroup|div|span|object|embed|param';
	}
	$text = preg_replace('/<(' . $tags . ')([^><\[\]]*)>/i', '[\1\2]', $text);
	$text = preg_replace('/<\/(' . $tags . ')>/Ui', '[/\1]', $text);
	$text = preg_replace('/<\/?(html|head|meta|link|base|basefont|body|bgsound|title|style|script|form|iframe|frame|frameset|applet|id|ilayer|layer|name|script|style|xml)[^><]*>/i', '', $text);
	while (preg_match('/<([a-z]+)[^><\[\]]*>[^><]*<\/\1>/i', $text, $mat)) {
		$text = str_replace($mat[0], str_replace('>', ']', str_replace('<', '[', $mat[0])), $text);
	}
	while (preg_match('/(\[[^\[\]]*=\s*)(\"|\')([^\2=\[\]]+)\2([^\[\]]*\])/i', $text, $mat)) {
		$text = str_replace($mat[0], $mat[1] . '|' . $mat[3] . '|' . $mat[4], $text);
	}
	while (preg_match('/\[[^\[\]]*(\"|\')[^\[\]]*\]/i', $text, $mat)) {
		$text = str_replace($mat[0], str_replace($mat[1], '', $mat[0]), $text);
	}
	$text = str_replace('<', '&lt;', $text);
	$text = str_replace('>', '&gt;', $text);
	$text = str_replace('"', '&quot;', $text);
	$text = str_replace('[', '<', $text);
	$text = str_replace(']', '>', $text);
	$text = str_replace('|', '"', $text);
	$text = str_replace('&#091;', '[', $text);
	$text = str_replace('&#093;', ']', $text);
	$text = str_replace('&#124;', '|', $text);
	return $text;
}

function ubb($Text)
{
	$Text = trim($Text);
	$Text = preg_replace("/\\t/is", "  ", $Text);
	$Text = preg_replace("/\[h1\](.+?)\[\/h1\]/is", "<h1>\\1</h1>", $Text);
	$Text = preg_replace("/\[h2\](.+?)\[\/h2\]/is", "<h2>\\1</h2>", $Text);
	$Text = preg_replace("/\[h3\](.+?)\[\/h3\]/is", "<h3>\\1</h3>", $Text);
	$Text = preg_replace("/\[h4\](.+?)\[\/h4\]/is", "<h4>\\1</h4>", $Text);
	$Text = preg_replace("/\[h5\](.+?)\[\/h5\]/is", "<h5>\\1</h5>", $Text);
	$Text = preg_replace("/\[h6\](.+?)\[\/h6\]/is", "<h6>\\1</h6>", $Text);
	$Text = preg_replace("/\[separator\]/is", "", $Text);
	$Text = preg_replace("/\[center\](.+?)\[\/center\]/is", "<center>\\1</center>", $Text);
	$Text = preg_replace("/\[url=http:\/\/([^\[]*)\](.+?)\[\/url\]/is", "<a href=\"http://\\1\" target=_blank>\\2</a>", $Text);
	$Text = preg_replace("/\[url=([^\[]*)\](.+?)\[\/url\]/is", "<a href=\"http://\\1\" target=_blank>\\2</a>", $Text);
	$Text = preg_replace("/\[url\]http:\/\/([^\[]*)\[\/url\]/is", "<a href=\"http://\\1\" target=_blank>\\1</a>", $Text);
	$Text = preg_replace("/\[url\]([^\[]*)\[\/url\]/is", "<a href=\"\\1\" target=_blank>\\1</a>", $Text);
	$Text = preg_replace("/\[img\](.+?)\[\/img\]/is", "<img src=\\1>", $Text);
	$Text = preg_replace("/\[color=(.+?)\](.+?)\[\/color\]/is", "<font color=\\1>\\2</font>", $Text);
	$Text = preg_replace("/\[size=(.+?)\](.+?)\[\/size\]/is", "<font size=\\1>\\2</font>", $Text);
	$Text = preg_replace("/\[sup\](.+?)\[\/sup\]/is", "<sup>\\1</sup>", $Text);
	$Text = preg_replace("/\[sub\](.+?)\[\/sub\]/is", "<sub>\\1</sub>", $Text);
	$Text = preg_replace("/\[pre\](.+?)\[\/pre\]/is", "<pre>\\1</pre>", $Text);
	$Text = preg_replace("/\[email\](.+?)\[\/email\]/is", "<a href='mailto:\\1'>\\1</a>", $Text);
	$Text = preg_replace("/\[colorTxt\](.+?)\[\/colorTxt\]/eis", "color_txt('\\1')", $Text);
	$Text = preg_replace("/\[emot\](.+?)\[\/emot\]/eis", "emot('\\1')", $Text);
	$Text = preg_replace("/\[i\](.+?)\[\/i\]/is", "<i>\\1</i>", $Text);
	$Text = preg_replace("/\[u\](.+?)\[\/u\]/is", "<u>\\1</u>", $Text);
	$Text = preg_replace("/\[b\](.+?)\[\/b\]/is", "<b>\\1</b>", $Text);
	$Text = preg_replace("/\[quote\](.+?)\[\/quote\]/is", " <div class='quote'><h5>引用:</h5><blockquote>\\1</blockquote></div>", $Text);
	$Text = preg_replace("/\[code\](.+?)\[\/code\]/eis", "highlight_code('\\1')", $Text);
	$Text = preg_replace("/\[php\](.+?)\[\/php\]/eis", "highlight_code('\\1')", $Text);
	$Text = preg_replace("/\[sig\](.+?)\[\/sig\]/is", "<div class='sign'>\\1</div>", $Text);
	$Text = preg_replace("/\\n/is", "<br/>", $Text);
	return $Text;
}

function build_count_rand($number, $length = 4, $mode = 1)
{
	if ($mode == 1 && $length < strlen($number)) {
		return false;
	}
	$rand = array();
	for ($i = 0; $i < $number; $i++) {
		$rand[] = rand_string($length, $mode);
	}
	$unqiue = array_unique($rand);
	if (count($unqiue) == count($rand)) {
		return $rand;
	}
	$count = count($rand) - count($unqiue);
	for ($i = 0; $i < $count * 3; $i++) {
		$rand[] = rand_string($length, $mode);
	}
	$rand = array_slice(array_unique($rand), 0, $number);
	return $rand;
}

function remove_xss($val)
{
	$val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);
	$search = 'abcdefghijklmnopqrstuvwxyz';
	$search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$search .= '1234567890!@#$%^&*()';
	$search .= '~`";:?+/={}[]-_|\'\\';
	for ($i = 0; $i < strlen($search); $i++) {
		$val = preg_replace('/(&#[xX]0{0,8}' . dechex(ord($search[$i])) . ';?)/i', $search[$i], $val);
		$val = preg_replace('/(&#0{0,8}' . ord($search[$i]) . ';?)/', $search[$i], $val);
	}
	$ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
	$ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
	$ra = array_merge($ra1, $ra2);
	$found = true;
	while ($found == true) {
		$val_before = $val;
		for ($i = 0; $i < sizeof($ra); $i++) {
			$pattern = '/';
			for ($j = 0; $j < strlen($ra[$i]); $j++) {
				if ($j > 0) {
					$pattern .= '(';
					$pattern .= '(&#[xX]0{0,8}([9ab]);)';
					$pattern .= '|';
					$pattern .= '|(&#0{0,8}([9|10|13]);)';
					$pattern .= ')*';
				}
				$pattern .= $ra[$i][$j];
			}
			$pattern .= '/i';
			$replacement = substr($ra[$i], 0, 2) . '<x>' . substr($ra[$i], 2);
			$val = preg_replace($pattern, $replacement, $val);
			if ($val_before == $val) {
				$found = false;
			}
		}
	}
	return $val;
}

function list_to_tree($list, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0)
{
	$tree = array();
	if (is_array($list)) {
		$refer = array();
		foreach ($list as $key => $data) {
			$refer[$data[$pk]] =& $list[$key];
		}
		foreach ($list as $key => $data) {
			$parentId = $data[$pid];
			if ($root == $parentId) {
				$tree[] =& $list[$key];
			} else {
				if (isset($refer[$parentId])) {
					$parent =& $refer[$parentId];
					$parent[$child][] =& $list[$key];
				}
			}
		}
	}
	return $tree;
}

function list_sort_by($list, $field, $sortby = 'asc')
{
	if (is_array($list)) {
		$refer = $resultSet = array();
		foreach ($list as $i => $data) $refer[$i] = &$data[$field];
		switch ($sortby) {
			case 'asc':
				asort($refer);
				break;
			case 'desc':
				arsort($refer);
				break;
			case 'nat':
				natcasesort($refer);
				break;
		}
		foreach ($refer as $key => $val) $resultSet[] = &$list[$key];
		return $resultSet;
	}
	return false;
}

function list_search($list, $condition)
{
	if (is_string($condition)) parse_str($condition, $condition);
	$resultSet = array();
	foreach ($list as $key => $data) {
		$find = false;
		foreach ($condition as $field => $value) {
			if (isset($data[$field])) {
				if (0 === strpos($value, '/')) {
					$find = preg_match($value, $data[$field]);
				} elseif ($data[$field] == $value) {
					$find = true;
				}
			}
		}
		if ($find) $resultSet[] = &$list[$key];
	}
	return $resultSet;
}

function auto_charset($fContents, $from = 'gbk', $to = 'utf-8')
{
	$from = strtoupper($from) == 'UTF8' ? 'utf-8' : $from;
	$to = strtoupper($to) == 'UTF8' ? 'utf-8' : $to;
	if (strtoupper($from) === strtoupper($to) || empty($fContents) || (is_scalar($fContents) && !is_string($fContents))) {
		return $fContents;
	}
	if (is_string($fContents)) {
		if (function_exists('mb_convert_encoding')) {
			return mb_convert_encoding($fContents, $to, $from);
		} elseif (function_exists('iconv')) {
			return iconv($from, $to, $fContents);
		} else {
			return $fContents;
		}
	} elseif (is_array($fContents)) {
		foreach ($fContents as $key => $val) {
			$_key = auto_charset($key, $from, $to);
			$fContents[$_key] = auto_charset($val, $from, $to);
			if ($key != $_key) unset($fContents[$key]);
		}
		return $fContents;
	} else {
		return $fContents;
	}
} 