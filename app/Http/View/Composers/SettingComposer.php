<?php

namespace App\Http\View\Composers;

use App\Models\Setting;
use Illuminate\View\View;

class SettingComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $settings;

    /**
     * Create a new profile composer.
     *
     * @param  setting $se
     * @return void
     */
    public function __construct(Setting $settings)
    {
        // Dependencies automatically resolved by service container...
        $this->settings = $settings;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('ui_config', $this->settings->pluck('value','name'));
    }
}