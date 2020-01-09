<?php

namespace Poutine\DevPagesWP;

final class Manager
{
	private static $__instance;
	private $pages = [];

	private function __construct()
	{

	}

	public static function init()
	{
		if (is_null(self::$__instance)) {
			self::$__instance = new self();
		}

		return self::$__instance;
	}

	public function register()
	{
		do_action('poutine_static_register'); // Allow users to add more at the right point.
		foreach ($this->pages as $page) {
			$page->register();
		}
	}

	public function add($url, $args)
	{
		if ($this->isURLTaken($url)) {
			throw new \Exception("The URL requested ('{$url}') has already been configured.");
		}

		array_push($this->pages, new Page($url, $args));
	}

	private function isURLTaken($url)
	{
		$url = strtolower($url);

		foreach ($this->pages as $page) {
			if ($page->getURL() === $url) {
				return true;
			}
		}

		return false;
	}
}