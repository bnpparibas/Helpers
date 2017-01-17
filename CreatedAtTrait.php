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
    private $createdAt;

    /**
     * @param null|array $createdAt
     *
     * @return $this
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = empty($createdAt) ? new \DateTime('NOW') : $createdAt;

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
