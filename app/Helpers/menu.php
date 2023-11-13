<?php

use App\Model\Menu;
use Illuminate\Support\Facades\Auth;

if (! function_exists('getMenus')) {
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    function getMenus()
    {
        $menus = Menu::where('parent_id', 0)->where('status', true)->get();
        $user = Auth::user();
        foreach ($menus as $key => $menu)
        {
            /** check user permission and remove if don't have */
            if($menu->menu_type == 'menu' && !$user->can('read-' . $menu->route_name) && $menu->route_name != 'backend') {
                unset($menus[$key]);
            }
            foreach ($menu->allChildren as $subKey => $subMenu)
            {
                /** check user permission and remove if don't have */
                if($subMenu->menu_type == 'menu' && !$user->can('read-' . $subMenu->route_name)) {
                    unset($menu->allChildren[$subKey]);
                }
                foreach ($subMenu->allChildren as $subSubKey => $subSubMenu)
                {
                    /** check user permission and remove if don't have */
                    if($subSubMenu->menu_type == 'menu' && !$user->can('read-' . $subSubMenu->route_name)) {
                        unset($subMenu->allChildren[$subSubKey]);
                    }
                }
                /** check is has children and remove if don't have */
                if($subMenu->menu_type != 'menu' && count($subMenu->allChildren) == 0) {
                    unset($menu->allChildren[$subKey]);
                }
            }
            /** check is has children and remove if don't have */
            if($menu->menu_type != 'menu' && count($menu->allChildren) == 0) {
                unset($menus[$key]);
            }
        }
        return $menus;
    }
}

if (! function_exists('getCurrentMenu')) {
    /**
     * get current menu
     * @param $route_name
     * @return array
     */
    function getCurrentMenu($route_name)
    {
        $current = Menu::with('allParent')->where('route_name', $route_name)->first();
        $current_menu = [];
        if($current->allParent && $current->allParent->allParent && $current->allParent->allParent->name) {
            array_push($current_menu, $current->allParent->allParent->name);
        }
        if($current->allParent && $current->allParent->name) {
            array_push($current_menu, $current->allParent->name);
        }
        if($current->name) {
            array_push($current_menu, $current->name);
        }
        return $current_menu;
    }
}

if (! function_exists('getMenuFromCategories')) {
    /**
     * get current menu
     * @param $route_name
     * @return array
     */
    function getMenuFromCategories()
    {
        $categories = \App\Model\Category::where('parent_id', 0)->get();
        return $categories;
    }
}

if (! function_exists('getCategoriesByID')) {
    /**
     * get current menu
     * @param $route_name
     * @return array
     */
    function getCategoriesByID($id)
    {
        $category = \App\Model\Category::find($id);
        return $category;
    }
}

if (! function_exists('getMenuFromDestination')) {
    /**
     * get current menu
     * @param $route_name
     * @return array
     */
    function getMenuFromDestination()
    {
        return \App\Model\Country::get();
    }
}

if (! function_exists('getLanguages')) {
    /**
     * get current menu
     * @param $route_name
     * @return array
     */
    function getLanguages()
    {
        return \App\Model\Language::get();
    }
}
