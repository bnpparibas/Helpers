<?php
/**
 * Created by iKNSA.
 * Author: Khalid Sookia <khalidsookia@gmail.com>
 * Date: 28/11/16
 * Time: 19:50
 */

namespace Romenys\Helpers;

trait CreatedAtTrait
{
    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @param null|array $createdAt
     *
     * @return $this
     */
    public function setCreatedAt($createdAt = null)
    {
        if (empty($createdAt)) {
            $this->createdAt = new \DateTime('NOW');
        } else {
            if (is_string($createdAt)) {
                $this->createdAt = new \DateTime($createdAt);
            }

            if ($createdAt instanceof \DateTime) {
                $this->createdAt = $createdAt;
            }
        }

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
