<?php

namespace App\View\Composer\Sidebar;


class SidebarContent
{

    public static function hasActiveChild($menus)
    {
        foreach ($menus as $menu) {
            if (request()->routeIs($menu['route']) || (isset($menu['menus']) && static::hasActiveChild($menu['menus']))) {
                return true;
            }
        }
        return false;
    }

    public static function dashboard()
    {
        return [
            [
                'title' => 'Dashboard',
                'menus' => [
                    [
                        'title' => 'Home',
                        'route' => 'dashboard',
                        'icon' => @svg('heroicon-o-home'),
                        'menus' => [],
                    ],
                    [
                        'title' => 'Kegiatan',
                        'route' => 'activity.index',
                        'icon' => @svg('heroicon-o-document-text'),
                        'menus' => [],
                    ],
                ],
            ],
        ];
    }
}
