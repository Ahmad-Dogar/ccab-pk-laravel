<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
	public function languageSwitch($locale)
	{

		setcookie('language', $locale, time() + (86400 * 365), "/");
		return back();
	}
}
