<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait HandlesLocalization
{
    public static function getLabel(): ?string
    {
        if (App::getLocale() !== 'en') {
            $value = 'models.' . static::getModelSlug() . '.label.singular';
            $translated =  __($value);
            if (empty($translated) || $translated !== $value) {
                return $translated;
            }
        }

        return static::$label;
    }

    public static function getPluralLabel(): ?string
    {
        if (App::getLocale() !== 'en') {
            $value = 'models.' . static::getModelSlug() . '.label.plural';
            $translated =  __($value);
            if (empty($translated) || $translated !== $value) {
                return $translated;
            }
        }

        return static::$pluralLabel;
    }

    protected static function getModelSlug(): string
    {
        // A method to return the name of the model.
        return strtolower(class_basename(static::$model));
    }
}
