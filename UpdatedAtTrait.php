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
    private $updatedAt;

    /**
     * @param null|\DateTime $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = empty($updatedAt) ? new \DateTime('NOW') : $updatedAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        $this->setUpdatedAt();

        return $this->getUpdatedAt();
    }
}
