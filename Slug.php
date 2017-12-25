<?php
/**
 * Created by PhpStorm.
 * User: iKNSA
 * Date: 24/12/2017
 * Time: 16:30
 */

namespace PhpLight\Helpers;


use PhpLight\Helpers\Repository\SlugRepository;

class Slug
{
    /**
     * @var string
     */
    private static $property;

    /**
     * @var Object
     */
    private static $table;

    /**
     * @var array
     */
    private static $fields;

    /**
     * @param string $table
     * @param string $property
     * @param string $value
     * @param array $fields Optional parameter for unique fields
     *
     * @return string
     */
    public static function slugify($table, $property, $value, array $fields=[])
    {
        Slug::$table = $table;
        Slug::$property = $property;
        Slug::$fields = $fields;

        $slugRepository = new SlugRepository();

        return $slugRepository->generate($table, $property, $value, $fields);
    }
}
