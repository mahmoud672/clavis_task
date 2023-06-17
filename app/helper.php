<?php
/**
 * Created by PhpStorm.
 * User: Kidwany
 * User: Mr. Fifty
 */

if (!function_exists('setting'))
{
    /**
     * @return mixed
     */
    function setting()
    {
        return \App\Models\Setting::orderBy('id', 'desc')->first();
    }
}



if (!function_exists('lang'))
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed|string
     */
    function lang()
    {
        if (session() -> has('lang'))
        {
            return session('lang');
        }

        else
        {
            return 'en';
        }
    }
}


if (!function_exists('currentLang'))
{
    /**
     * @return string
     */
    function currentLang()
    {
        return app()->getLocale();
    }
}



if (!function_exists('direction'))
{
    /**
     * @return string
     */
    function direction()
    {
        if (session() -> has('lang'))
        {
            if (session('lang') == 'ar')
            {
                return 'rtl';
            }
            else
            {
                return 'ltr';
            }
        }

        else
        {
            return 'ltr';
        }
    }
}

if (!function_exists('adminUrl'))
{
    /**
     * @param null $url
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function adminUrl($url = null)
    {
        return  url('/alarabya-admin/' . $url);
    }
}

if (!function_exists('currentLangID'))
{
    function currentLangID()
    {
        if (app()->getLocale() == "en")
        {
            return 1;
        }
        elseif (app()->getLocale() == "ar")
        {
            return 2;
        }
    }
}


if (!function_exists('assetPath'))
{
    /**
     * @param null $path
     * @return string
     */
    function assetPath($path = null)
    {
        return  asset($path);
    }
}

if (!function_exists('uploadedImages'))
{
    /**
     * @return string
     */
    function uploadedImagePath()
    {
        return 'dashboardImages';
    }
}

if (!function_exists('apiUrl'))
{
    /**
     * @return string
     */
    function apiUrl($url = null)
    {
        return  url('/api/v1/' . $url);
    }
}

if (!function_exists('appName'))
{
    /**
     * @return string
     */
    function appName()
    {
        return  "Al-Arabiya";
    }
}
