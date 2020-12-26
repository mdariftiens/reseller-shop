<?php

namespace App\Providers;

use Collective\Html\FormFacade as Form;
use Illuminate\Support\ServiceProvider;


class FormControlProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {


        Form::component('textGroup', 'partials.form.text_group', [
            'name',
            'value'=>'',
            'label'=>'',
            'attributes' => ['class'=>'form-control'],
            'icon'=> null,
            'col' => 'col-md-6',
            'group_class'=>''
        ]);

        Form::component('numberGroup', 'partials.form.number_group', [
            'name',
            'value'=>'',
            'label'=>'',
            'attributes' => ['class'=>'form-control'],
            'icon'=> null,
            'col' => 'col-md-6',
            'group_class'=>''
        ]);

        Form::component('textareaGroup', 'partials.form.text_area', [
            'name',
            'value' => null,
            'label'=>'',
            'attributes' => ['class'=>'form-control'],
            'icon'=> null,
            'col' => 'col-md-6',
            'group_class' => null
        ]);
        Form::component('submitGroup', 'partials.form.submit_group', [
            'name',
            'value',
            'icon'=> null,
            'attributes' => ['required' => 'required'],
            'col' => 'col-md-6',
        ]);

        Form::component('checkboxGroup', 'partials.form.checkbox_group', [
            'name',
            'value',
            'label',
            'icon'=> null,
            'attributes' => ['required' => 'required'],
            'col' => 'col-md-6',
        ]);

        Form::component('selectGroup', 'partials.form.select_group', [
            'name',
            'value'=>[],
            'defaultValue'=>null,
            'label'=>'',
            'icon'=> null,
            'attributes' => [],
            'col' => 'col-md-6',
        ]);

    }
}
