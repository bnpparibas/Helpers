<?php
/**
 * Created by PhpStorm.
 * User: iKNSA
 * Date: 24/12/2017
 * Time: 17:05
 */

namespace PhpLight\Helpers\Repository;


use Behat\Transliterator\Transliterator;
use PhpLight\Framework\Components\DB\DB;

class SlugRepository
{
    /**
     * @param string $table
     * @param string $field
     * @param string $string
     * @param array $filters
     * @param string $separator
     *
     * @return string
     */
    public function generate($table, $field, $string, $filters, $separator='-')
    {
        $string = str_replace(["\r\n", "\r", "\n", "\t"], '', $string);

        $slug = Transliterator::transliterate($string, $separator);

        $db = (new DB())->connect();

        $filter = " AND `" . $field . "` LIKE '" . $slug ."' OR `" . $field . "` LIKE '" . $slug . "-%'";

        if (!empty($filters)) {
            foreach ($filters as $column => $val) {
                $filter .= " AND `" . $column . "`= '" . $val ."'";
            }
        }

        $query = $db->query(
            "SELECT * FROM `" . $table . "` WHERE TRUE " . $filter . " ORDER BY `id` DESC"
        )->fetch($db::FETCH_ASSOC);

        /**
         * @todo Should improve this as the newly generated slug may already exist
         * @todo Use a while loop to update the slug value in a select statement to recheck if the slug exists
         */
        if (!!$query) {
            $existingSlug = $query[$field];

            if ($theoreticalCounter = explode('-', $existingSlug)) {
                $currentCounter = (int) end($theoreticalCounter) > 0 ? (int) end($theoreticalCounter) : 0;
                $newCounter = $slug . '-' . ($currentCounter + 1);

                return $newCounter;
            }
        }

        return $slug;
    }
}
