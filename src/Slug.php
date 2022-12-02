<?php

namespace Cserobiul\Slug;

use Illuminate\Support\Facades\DB;

class Slug
{
    public static function make($table, $value, $field, $separator = null)
    {
        //Check Separator has value or get form config file
        $separator = empty($separator) ? config('unique_slug.separator') : $separator;
        $id = 0;

        //If value is unicode
        if (strlen($value) != strlen(utf8_decode($value))) {
          $slug = preg_replace('/\s+/u', $separator, trim($value));
        }
        // if value isn't unicode
        else {
          $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', $separator, $value)));
        }

        //Check already slug is exist
        $checkSlugExist = Self::getExistSlug($table, $slug, $field, $id);

        //If slug not exist
        if (!$checkSlugExist->contains("$field", $slug)) {
            return $slug;
        }

        //If slug exist try generate new slug
        for ($i = 1; $i <= config('unique_slug.max_count'); $i++) {
            $newSlug = $slug . $separator . $i;
            if (!$checkSlugExist->contains("$field", $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Could not create a unique slug');
    }

    private static function getExistSlug($table, $slug, $field, $id)
    {
        if (empty($id)) {  $id = 0; }

        return DB::table($table)->select("$field")
            ->where("$field", 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }
}
