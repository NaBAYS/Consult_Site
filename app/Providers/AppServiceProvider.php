<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Define custom form components
	    Form::component('bsInput', 'partials.forms.input-component', ['name', 'value' => null, 'attributes' => []]);
	    Form::component('bsSelect', 'partials.forms.select-component', ['name', 'options' => [], 'value' => null, 'attributes' => []]);
	    Form::component('bsTextarea', 'partials.forms.textarea-component', ['name', 'value' => null, 'attributes' => []]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
