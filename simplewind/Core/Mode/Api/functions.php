<?php
function C($name = null, $value = null, $default = null)
{
	static $_config = array();
	if (empty($name)) {
		return $_config;
	}
	if (is_string($name)) {
		if (!strpos($name, '.')) {
			$name = strtolower($name);
			if (is_null($value)) return isset($_config[$name]) ? $_config[$name] : $default;
			$_config[$name] = $value;
			return;
		}
		$name = explode('.', $name);
		$name[0] = strtolower($name[0]);
		if (is_null($value)) return isset($_config[$name[0]][$name[1]]) ? $_config[$name[0]][$name[1]] : $default;
		$_config[$name[0]][$name[1]] = $value;
		return;
	}
	if (is_array($name)) {
		$_config = array_merge($_config, array_change_key_case($name));
		return;
	}
	return null;
}

function load_config($file, $parse = CONF_PARSE)
{
	$ext = pathinfo($file, PATHINFO_EXTENSION);
	switch ($ext) {
		case 'php':
			return include $file;
		case 'ini':
			return parse_ini_file($file);
		case 'yaml':
			return yaml_parse_file($file);
		case 'xml':
			return (array)simplexml_load_file($file);
		case 'json':
			return json_decode(file_get_contents($file), true);
		default:
			if (function_exists($parse)) {
				return $parse($file);
			} else {
				E(L('_NOT_SUPPORT_') . ':' . $ext);
			}
	}
}

function E($msg, $code = 0)
{
	throw new Think\Exception($msg, $code);
}

function G($start, $end = '', $dec = 4)
{
	static $_info = array();
	static $_mem = array();
	if (is_float($end)) {
		$_info[$start] = $end;
	} elseif (!empty($end)) {
		if (!isset($_info[$end])) $_info[$end] = microtime(TRUE);
		if (MEMORY_LIMIT_ON && $dec == 'm') {
			if (!isset($_mem[$end])) $_mem[$end] = memory_get_usage();
			return number_format(($_mem[$end] - $_mem[$start]) / 1024);
		} else {
			return number_format(($_info[$end] - $_info[$start]), $dec);
		}
	} else {
		$_info[$start] = microtime(TRUE);
		if (MEMORY_LIMIT_ON) $_mem[$start] = memory_get_usage();
	}
}

function L($name = null, $value = null)
{
	static $_lang = array();
	if (empty($name)) return $_lang;
	if (is_string($name)) {
		$name = strtoupper($name);
		if (is_null($value)) return isset($_lang[$name]) ? $_lang[$name] : $name;
		$_lang[$name] = $value;
		return;
	}
	if (is_array($name)) $_lang = array_merge($_lang, array_change_key_case($name, CASE_UPPER));
	return;
}

function trace($value = '[think]', $label = '', $level = 'DEBUG', $record = false)
{
	return Think\Think::trace($value, $label, $level, $record);
}

function compile($filename)
{
	$content = php_strip_whitespace($filename);
	$content = trim(substr($content, 5));
	$content = preg_replace('/\/\/\[RUNTIME\](.*?)\/\/\[\/RUNTIME\]/s', '', $content);
	if (0 === strpos($content, 'namespace')) {
		$content = preg_replace('/namespace\s(.*?);/', 'namespace \\1{', $content, 1);
	} else {
		$content = 'namespace {' . $content;
	}
	if ('?>' == substr($content, -2)) $content = substr($content, 0, -2);
	return $content . '}';
}

function I($name, $default = '', $filter = null, $datas = null)
{
	if (strpos($name, '/')) {
		list($name, $type) = explode('/', $name, 2);
	}
	if (strpos($name, '.')) {
		list($method, $name) = explode('.', $name, 2);
	} else {
		$method = 'param';
	}
	switch (strtolower($method)) {
		case 'get' :
			$input =& $_GET;
			break;
		case 'post' :
			$input =& $_POST;
			break;
		case 'put' :
			parse_str(file_get_contents('php://input'), $input);
			break;
		case 'param' :
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'POST':
					$input = $_POST;
					break;
				case 'PUT':
					parse_str(file_get_contents('php://input'), $input);
					break;
				default:
					$input = $_GET;
			}
			break;
		case 'path' :
			$input = array();
			if (!empty($_SERVER['PATH_INFO'])) {
				$depr = C('URL_PATHINFO_DEPR');
				$input = explode($depr, trim($_SERVER['PATH_INFO'], $depr));
			}
			break;
		case 'request' :
			$input =& $_REQUEST;
			break;
		case 'session' :
			$input =& $_SESSION;
			break;
		case 'cookie' :
			$input =& $_COOKIE;
			break;
		case 'server' :
			$input =& $_SERVER;
			break;
		case 'globals' :
			$input =& $GLOBALS;
			break;
		case 'data' :
			$input =& $datas;
			break;
		default:
			return NULL;
	}
	if ('' == $name) {
		$data = $input;
		$filters = isset($filter) ? $filter : C('DEFAULT_FILTER');
		if ($filters) {
			if (is_string($filters)) {
				$filters = explode(',', $filters);
			}
			foreach ($filters as $filter) {
				$data = array_map_recursive($filter, $data);
			}
		}
	} elseif (isset($input[$name])) {
		$data = $input[$name];
		$filters = isset($filter) ? $filter : C('DEFAULT_FILTER');
		if ($filters) {
			if (is_string($filters)) {
				$filters = explode(',', $filters);
			} elseif (is_int($filters)) {
				$filters = array($filters);
			}
			foreach ($filters as $filter) {
				if (function_exists($filter)) {
					$data = is_array($data) ? array_map_recursive($filter, $data) : $filter($data);
				} elseif (0 === strpos($filter, '/')) {
					if (1 !== preg_match($filter, (string)$data)) {
						return isset($default) ? $default : NULL;
					}
				} else {
					$data = filter_var($data, is_int($filter) ? $filter : filter_id($filter));
					if (false === $data) {
						return isset($default) ? $default : NULL;
					}
				}
			}
		}
		if (!empty($type)) {
			switch (strtolower($type)) {
				case 's':
					$data = (string)$data;
					break;
				case 'a':
					$data = (array)$data;
					break;
				case 'd':
					$data = (int)$data;
					break;
				case 'f':
					$data = (float)$data;
					break;
				case 'b':
					$data = (boolean)$data;
					break;
			}
		}
	} else {
		$data = isset($default) ? $default : NULL;
	}
	is_array($data) && array_walk_recursive($data, 'think_filter');
	return $data;
}

function array_map_recursive($filter, $data)
{
	$result = array();
	foreach ($data as $key => $val) {
		$result[$key] = is_array($val) ? array_map_recursive($filter, $val) : call_user_func($filter, $val);
	}
	return $result;
}

function N($key, $step = 0, $save = false)
{
	static $_num = array();
	if (!isset($_num[$key])) {
		$_num[$key] = (false !== $save) ? S('N_' . $key) : 0;
	}
	if (empty($step)) return $_num[$key]; else $_num[$key] = $_num[$key] + (int)$step;
	if (false !== $save) {
		S('N_' . $key, $_num[$key], $save);
	}
}

function parse_name($name, $type = 0)
{
	if ($type) {
		return ucfirst(preg_replace_callback('/_([a-zA-Z])/', function ($match) {
			return strtoupper($match[1]);
		}, $name));
	} else {
		return strtolower(trim(preg_replace("/[A-Z]/", "_\\0", $name), "_"));
	}
}

function require_cache($filename)
{
	static $_importFiles = array();
	if (!isset($_importFiles[$filename])) {
		if (file_exists_case($filename)) {
			require $filename;
			$_importFiles[$filename] = true;
		} else {
			$_importFiles[$filename] = false;
		}
	}
	return $_importFiles[$filename];
}

function file_exists_case($filename)
{
	if (is_file($filename)) {
		if (IS_WIN && APP_DEBUG) {
			if (basename(realpath($filename)) != basename($filename)) return false;
		}
		return true;
	}
	return false;
}

function import($class, $baseUrl = '', $ext = EXT)
{
	static $_file = array();
	$class = str_replace(array('.', '#'), array('/', '.'), $class);
	if (isset($_file[$class . $baseUrl])) return true; else $_file[$class . $baseUrl] = true;
	$class_strut = explode('/', $class);
	if (empty($baseUrl)) {
		if ('@' == $class_strut[0] || MODULE_NAME == $class_strut[0]) {
			$baseUrl = MODULE_PATH;
			$class = substr_replace($class, '', 0, strlen($class_strut[0]) + 1);
		} elseif (in_array($class_strut[0], array('Think', 'Org', 'Behavior', 'Com', 'Vendor')) || is_dir(LIB_PATH . $class_strut[0])) {
			$baseUrl = LIB_PATH;
		} else {
			$baseUrl = APP_PATH;
		}
	}
	if (substr($baseUrl, -1) != '/') $baseUrl .= '/';
	$classfile = $baseUrl . $class . $ext;
	if (!class_exists(basename($class), false)) {
		return require_cache($classfile);
	}
}

function load($name, $baseUrl = '', $ext = '.php')
{
	$name = str_replace(array('.', '#'), array('/', '.'), $name);
	if (empty($baseUrl)) {
		if (0 === strpos($name, '@/')) {
			$baseUrl = MODULE_PATH . 'Common/';
			$name = substr($name, 2);
		} else {
			$array = explode('/', $name);
			$baseUrl = APP_PATH . array_shift($array) . '/Common/';
			$name = implode('/', $array);
		}
	}
	if (substr($baseUrl, -1) != '/') $baseUrl .= '/';
	require_cache($baseUrl . $name . $ext);
}

function vendor($class, $baseUrl = '', $ext = '.php')
{
	if (empty($baseUrl)) $baseUrl = VENDOR_PATH;
	return import($class, $baseUrl, $ext);
}

function D($name = '', $layer = '')
{
	if (empty($name)) return new Think\Model;
	static $_model = array();
	$layer = $layer ?: C('DEFAULT_M_LAYER');
	if (isset($_model[$name . $layer])) return $_model[$name . $layer];
	$class = parse_res_name($name, $layer);
	if (class_exists($class)) {
		$model = new $class(basename($name));
	} elseif (false === strpos($name, '/')) {
		$class = '\\Common\\' . $layer . '\\' . $name . $layer;
		$model = class_exists($class) ? new $class($name) : new Think\Model($name);
	} else {
		Think\Log::record('D方法实例化没找到模型类' . $class, Think\Log::NOTICE);
		$model = new Think\Model(basename($name));
	}
	$_model[$name . $layer] = $model;
	return $model;
}

function M($name = '', $tablePrefix = '', $connection = '')
{
	static $_model = array();
	if (strpos($name, ':')) {
		list($class, $name) = explode(':', $name);
	} else {
		$class = 'Think\\Model';
	}
	$guid = (is_array($connection) ? implode('', $connection) : $connection) . $tablePrefix . $name . '_' . $class;
	if (!isset($_model[$guid])) $_model[$guid] = new $class($name, $tablePrefix, $connection);
	return $_model[$guid];
}

function parse_res_name($name, $layer, $level = 1)
{
	if (strpos($name, '://')) {
		list($extend, $name) = explode('://', $name);
	} else {
		$extend = '';
	}
	if (strpos($name, '/') && substr_count($name, '/') >= $level) {
		list($module, $name) = explode('/', $name, 2);
	} else {
		$module = MODULE_NAME;
	}
	$array = explode('/', $name);
	$class = $module . '\\' . $layer;
	foreach ($array as $name) {
		$class .= '\\' . parse_name($name, 1);
	}
	if ($extend) {
		$class = $extend . '\\' . $class;
	}
	return $class . $layer;
}

function A($name, $layer = '', $level = '')
{
	static $_action = array();
	$layer = $layer ?: C('DEFAULT_C_LAYER');
	$level = $level ?: ($layer == C('DEFAULT_C_LAYER') ? C('CONTROLLER_LEVEL') : 1);
	if (isset($_action[$name . $layer])) return $_action[$name . $layer];
	$class = parse_res_name($name, $layer, $level);
	if (class_exists($class)) {
		$action = new $class();
		$_action[$name . $layer] = $action;
		return $action;
	} else {
		return false;
	}
}

function R($url, $vars = array(), $layer = '')
{
	$info = pathinfo($url);
	$action = $info['basename'];
	$module = $info['dirname'];
	$class = A($module, $layer);
	if ($class) {
		if (is_string($vars)) {
			parse_str($vars, $vars);
		}
		return call_user_func_array(array(&$class, $action . C('ACTION_SUFFIX')), $vars);
	} else {
		return false;
	}
}

function B($name, &$params = NULL)
{
	if (strpos($name, '/')) {
		list($name, $tag) = explode('/', $name);
	} else {
		$tag = 'run';
	}
	return \Think\Hook::exec($name, $tag, $params);
}

function strip_whitespace($content)
{
	$stripStr = '';
	$tokens = token_get_all($content);
	$last_space = false;
	for ($i = 0, $j = count($tokens); $i < $j; $i++) {
		if (is_string($tokens[$i])) {
			$last_space = false;
			$stripStr .= $tokens[$i];
		} else {
			switch ($tokens[$i][0]) {
				case T_COMMENT:
				case T_DOC_COMMENT:
					break;
				case T_WHITESPACE:
					if (!$last_space) {
						$stripStr .= ' ';
						$last_space = true;
					}
					break;
				case T_START_HEREDOC:
					$stripStr .= "<<<THINK\n";
					break;
				case T_END_HEREDOC:
					$stripStr .= "THINK;\n";
					for ($k = $i + 1; $k < $j; $k++) {
						if (is_string($tokens[$k]) && $tokens[$k] == ';') {
							$i = $k;
							break;
						} else if ($tokens[$k][0] == T_CLOSE_TAG) {
							break;
						}
					}
					break;
				default:
					$last_space = false;
					$stripStr .= $tokens[$i][1];
			}
		}
	}
	return $stripStr;
}

function dump($var, $echo = true, $label = null, $strict = true)
{
	$label = ($label === null) ? '' : rtrim($label) . ' ';
	if (!$strict) {
		if (ini_get('html_errors')) {
			$output = print_r($var, true);
			$output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
		} else {
			$output = $label . print_r($var, true);
		}
	} else {
		ob_start();
		var_dump($var);
		$output = ob_get_clean();
		if (!extension_loaded('xdebug')) {
			$output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
			$output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
		}
	}
	if ($echo) {
		echo($output);
		return null;
	} else return $output;
}

function redirect($url, $time = 0, $msg = '')
{
	$url = str_replace(array("\n", "\r"), '', $url);
	if (empty($msg)) $msg = "系统将在{$time}秒之后自动跳转到{$url}！";
	if (!headers_sent()) {
		if (0 === $time) {
			header('Location: ' . $url);
		} else {
			header("refresh:{$time};url={$url}");
			echo($msg);
		}
		exit();
	} else {
		$str = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
		if ($time != 0) $str .= $msg;
		exit($str);
	}
}

function S($name, $value = '', $options = null)
{
	static $cache = '';
	if (is_array($options) && empty($cache)) {
		$type = isset($options['type']) ? $options['type'] : '';
		$cache = Think\Cache::getInstance($type, $options);
	} elseif (is_array($name)) {
		$type = isset($name['type']) ? $name['type'] : '';
		$cache = Think\Cache::getInstance($type, $name);
		return $cache;
	} elseif (empty($cache)) {
		$cache = Think\Cache::getInstance();
	}
	if ('' === $value) {
		return $cache->get($name);
	} elseif (is_null($value)) {
		return $cache->rm($name);
	} else {
		if (is_array($options)) {
			$expire = isset($options['expire']) ? $options['expire'] : NULL;
		} else {
			$expire = is_numeric($options) ? $options : NULL;
		}
		return $cache->set($name, $value, $expire);
	}
}

function F($name, $value = '', $path = DATA_PATH)
{
	static $_cache = array();
	$filename = $path . $name . '.php';
	if ('' !== $value) {
		if (is_null($value)) {
			if (false !== strpos($name, '*')) {
				return false;
			} else {
				unset($_cache[$name]);
				return Think\Storage::unlink($filename, 'F');
			}
		} else {
			Think\Storage::put($filename, serialize($value), 'F');
			$_cache[$name] = $value;
			return;
		}
	}
	if (isset($_cache[$name])) return $_cache[$name];
	if (Think\Storage::has($filename, 'F')) {
		$value = unserialize(Think\Storage::read($filename, 'F'));
		$_cache[$name] = $value;
	} else {
		$value = false;
	}
	return $value;
}

function to_guid_string($mix)
{
	if (is_object($mix)) {
		return spl_object_hash($mix);
	} elseif (is_resource($mix)) {
		$mix = get_resource_type($mix) . strval($mix);
	} else {
		$mix = serialize($mix);
	}
	return md5($mix);
}

function xml_encode($data, $root = 'think', $item = 'item', $attr = '', $id = 'id', $encoding = 'utf-8')
{
	if (is_array($attr)) {
		$_attr = array();
		foreach ($attr as $key => $value) {
			$_attr[] = "{$key}=\"{$value}\"";
		}
		$attr = implode(' ', $_attr);
	}
	$attr = trim($attr);
	$attr = empty($attr) ? '' : " {$attr}";
	$xml = "<?xml version=\"1.0\" encoding=\"{$encoding}\"?>";
	$xml .= "<{$root}{$attr}>";
	$xml .= data_to_xml($data, $item, $id);
	$xml .= "</{$root}>";
	return $xml;
}

function data_to_xml($data, $item = 'item', $id = 'id')
{
	$xml = $attr = '';
	foreach ($data as $key => $val) {
		if (is_numeric($key)) {
			$id && $attr = " {$id}=\"{$key}\"";
			$key = $item;
		}
		$xml .= "<{$key}{$attr}>";
		$xml .= (is_array($val) || is_object($val)) ? data_to_xml($val, $item, $id) : $val;
		$xml .= "</{$key}>";
	}
	return $xml;
}

function session($name, $value = '')
{
	$prefix = C('SESSION_PREFIX');
	if (is_array($name)) {
		if (isset($name['prefix'])) C('SESSION_PREFIX', $name['prefix']);
		if (C('VAR_SESSION_ID') && isset($_REQUEST[C('VAR_SESSION_ID')])) {
			session_id($_REQUEST[C('VAR_SESSION_ID')]);
		} elseif (isset($name['id'])) {
			session_id($name['id']);
		}
		if ('common' != APP_MODE) {
			ini_set('session.auto_start', 0);
		}
		if (isset($name['name'])) session_name($name['name']);
		if (isset($name['path'])) session_save_path($name['path']);
		if (isset($name['domain'])) ini_set('session.cookie_domain', $name['domain']);
		if (isset($name['expire'])) ini_set('session.gc_maxlifetime', $name['expire']);
		if (isset($name['use_trans_sid'])) ini_set('session.use_trans_sid', $name['use_trans_sid'] ? 1 : 0);
		if (isset($name['use_cookies'])) ini_set('session.use_cookies', $name['use_cookies'] ? 1 : 0);
		if (isset($name['cache_limiter'])) session_cache_limiter($name['cache_limiter']);
		if (isset($name['cache_expire'])) session_cache_expire($name['cache_expire']);
		if (isset($name['type'])) C('SESSION_TYPE', $name['type']);
		if (C('SESSION_TYPE')) {
			$type = C('SESSION_TYPE');
			$class = strpos($type, '\\') ? $type : 'Think\\Session\\Driver\\' . ucwords(strtolower($type));
			$hander = new $class();
			session_set_save_handler(array(&$hander, "open"), array(&$hander, "close"), array(&$hander, "read"), array(&$hander, "write"), array(&$hander, "destroy"), array(&$hander, "gc"));
		}
		if (C('SESSION_AUTO_START')) session_start();
	} elseif ('' === $value) {
		if (0 === strpos($name, '[')) {
			if ('[pause]' == $name) {
				session_write_close();
			} elseif ('[start]' == $name) {
				session_start();
			} elseif ('[destroy]' == $name) {
				$_SESSION = array();
				session_unset();
				session_destroy();
			} elseif ('[regenerate]' == $name) {
				session_regenerate_id();
			}
		} elseif (0 === strpos($name, '?')) {
			$name = substr($name, 1);
			if (strpos($name, '.')) {
				list($name1, $name2) = explode('.', $name);
				return $prefix ? isset($_SESSION[$prefix][$name1][$name2]) : isset($_SESSION[$name1][$name2]);
			} else {
				return $prefix ? isset($_SESSION[$prefix][$name]) : isset($_SESSION[$name]);
			}
		} elseif (is_null($name)) {
			if ($prefix) {
				unset($_SESSION[$prefix]);
			} else {
				$_SESSION = array();
			}
		} elseif ($prefix) {
			if (strpos($name, '.')) {
				list($name1, $name2) = explode('.', $name);
				return isset($_SESSION[$prefix][$name1][$name2]) ? $_SESSION[$prefix][$name1][$name2] : null;
			} else {
				return isset($_SESSION[$prefix][$name]) ? $_SESSION[$prefix][$name] : null;
			}
		} else {
			if (strpos($name, '.')) {
				list($name1, $name2) = explode('.', $name);
				return isset($_SESSION[$name1][$name2]) ? $_SESSION[$name1][$name2] : null;
			} else {
				return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
			}
		}
	} elseif (is_null($value)) {
		if ($prefix) {
			unset($_SESSION[$prefix][$name]);
		} else {
			unset($_SESSION[$name]);
		}
	} else {
		if ($prefix) {
			if (!is_array($_SESSION[$prefix])) {
				$_SESSION[$prefix] = array();
			}
			$_SESSION[$prefix][$name] = $value;
		} else {
			$_SESSION[$name] = $value;
		}
	}
}

function cookie($name, $value = '', $option = null)
{
	$config = array('prefix' => C('COOKIE_PREFIX'), 'expire' => C('COOKIE_EXPIRE'), 'path' => C('COOKIE_PATH'), 'domain' => C('COOKIE_DOMAIN'),);
	if (!is_null($option)) {
		if (is_numeric($option)) $option = array('expire' => $option); elseif (is_string($option)) parse_str($option, $option);
		$config = array_merge($config, array_change_key_case($option));
	}
	if (is_null($name)) {
		if (empty($_COOKIE)) return;
		$prefix = empty($value) ? $config['prefix'] : $value;
		if (!empty($prefix)) {
			foreach ($_COOKIE as $key => $val) {
				if (0 === stripos($key, $prefix)) {
					setcookie($key, '', time() - 3600, $config['path'], $config['domain']);
					unset($_COOKIE[$key]);
				}
			}
		}
		return;
	}
	$name = $config['prefix'] . $name;
	if ('' === $value) {
		if (isset($_COOKIE[$name])) {
			$value = $_COOKIE[$name];
			if (0 === strpos($value, 'think:')) {
				$value = substr($value, 6);
				return array_map('urldecode', json_decode(MAGIC_QUOTES_GPC ? stripslashes($value) : $value, true));
			} else {
				return $value;
			}
		} else {
			return null;
		}
	} else {
		if (is_null($value)) {
			setcookie($name, '', time() - 3600, $config['path'], $config['domain']);
			unset($_COOKIE[$name]);
		} else {
			if (is_array($value)) {
				$value = 'think:' . json_encode(array_map('urlencode', $value));
			}
			$expire = !empty($config['expire']) ? time() + intval($config['expire']) : 0;
			setcookie($name, $value, $expire, $config['path'], $config['domain']);
			$_COOKIE[$name] = $value;
		}
	}
}

function load_ext_file($path)
{
	if (C('LOAD_EXT_FILE')) {
		$files = explode(',', C('LOAD_EXT_FILE'));
		foreach ($files as $file) {
			$file = $path . 'Common/' . $file . '.php';
			if (is_file($file)) include $file;
		}
	}
	if (C('LOAD_EXT_CONFIG')) {
		$configs = C('LOAD_EXT_CONFIG');
		if (is_string($configs)) $configs = explode(',', $configs);
		foreach ($configs as $key => $config) {
			$file = $path . 'Conf/' . $config . '.php';
			if (is_file($file)) {
				is_numeric($key) ? C(include $file) : C($key, include $file);
			}
		}
	}
}

function get_client_ip($type = 0)
{
	$type = $type ? 1 : 0;
	static $ip = NULL;
	if ($ip !== NULL) return $ip[$type];
	if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
		$pos = array_search('unknown', $arr);
		if (false !== $pos) unset($arr[$pos]);
		$ip = trim($arr[0]);
	} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (isset($_SERVER['REMOTE_ADDR'])) {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	$long = sprintf("%u", ip2long($ip));
	$ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
	return $ip[$type];
}

function send_http_status($code)
{
	static $_status = array(200 => 'OK', 301 => 'Moved Permanently', 302 => 'Moved Temporarily ', 400 => 'Bad Request', 403 => 'Forbidden', 404 => 'Not Found', 500 => 'Internal Server Error', 503 => 'Service Unavailable',);
	if (isset($_status[$code])) {
		header('HTTP/1.1 ' . $code . ' ' . $_status[$code]);
		header('Status:' . $code . ' ' . $_status[$code]);
	}
}

function in_array_case($value, $array)
{
	return in_array(strtolower($value), array_map('strtolower', $array));
}

function think_filter(&$value)
{
	if (preg_match('/^(EXP|NEQ|GT|EGT|LT|ELT|OR|XOR|LIKE|NOTLIKE|NOT BETWEEN|NOTBETWEEN|BETWEEN|NOTIN|NOT IN|IN)$/i', $value)) {
		$value .= ' ';
	}
}