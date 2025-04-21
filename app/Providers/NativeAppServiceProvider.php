<?php

namespace App\Providers;

use Native\Laravel\Facades\Window;
use Native\Laravel\Contracts\ProvidesPhpIni;
use Native\Laravel\Facades\Menu;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        Menu::create(
            Menu::file(),
            Menu::edit(),
            Menu::view(),
            Menu::make(
                Menu::route('categories.index', 'List'),
            )->label('Category'),
            Menu::make(
                Menu::route('urls.create', 'Create'),
                Menu::route('urls.index', 'List'),
            )->label('Bookmarks'),
        );

        Window::open()
            ->url(route('urls.index'))
            ->maximized();
    }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [];
    }
}
