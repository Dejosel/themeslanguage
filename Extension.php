<?php namespace Dejosel\ThemesLanguage;

use System\Classes\BaseExtension;
use Admin\Models\Locations_model;
use Admin\Controllers\Locations;
use Admin\Widgets\Form;

/**
 * ThemesLanguage Extension Information File
 */
class Extension extends BaseExtension
{
    /**
     * Register method, called when the extension is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {
        $this->extendLocations();
    }

    private function extendLocations()
    {
        Locations::extendFormFields(function (Form $form, $model, $context) {
            if (!$model instanceof Locations_model)
                return;

            if (!isset($form->tabs['fields']['location_name']))
                return;

            $form->addTabFields([
				'hero_image' => [
		            'type' => 'mediafinder',
                    'label' => 'lang:dejosel.themeslanguage::eatonline.hero-image.label_heroimage',
                    'comment' => 'lang:dejosel.themeslanguage::eatonline.hero-image.comment_heroimage',
                    'span' => 'left',
		        ],
            ]);
        });

    }
    /**
     * Registers any front-end components implemented in this extension.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
// Remove this line and uncomment the line below to activate
//            'Dejosel\ThemesLanguage\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any admin permissions used by this extension.
     *
     * @return array
     */
    public function registerPermissions()
    {
// Remove this line and uncomment block to activate
        return [
//            'Dejosel.ThemesLanguage.SomePermission' => [
//                'description' => 'Some permission',
//                'group' => 'module',
//            ],
        ];
    }
}
