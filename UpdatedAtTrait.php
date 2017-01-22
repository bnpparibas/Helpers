<?php
/**
 * Created by iKNSA.
 * Author: Khalid Sookia <khalidsookia@gmail.com>
 * Date: 28/11/16
 * Time: 19:50
 */

namespace Romenys\Helpers;

trait UpdatedAtTrait
{
    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @param null|\DateTime $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt($updatedAt = null)
    {
        if (empty($updatedAt)) {
            $this->updatedAt = new \DateTime('NOW');
        } else {
            if (is_string($updatedAt)) {
                $this->updatedAt = new \DateTime($updatedAt);
            }

            if ($updatedAt instanceof \DateTime) {
                $this->updatedAt = $updatedAt;
            }
        }

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
