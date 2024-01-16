<?php

namespace TelQ\Sdk\Models;

class RangeFilter
{
    /** @var \DateTime */
    private $from;
    /** @var \DateTime */
    private $to;

    /**
     * @param \DateTime $from
     * @param \DateTime $to
     */
    public function __construct(\DateTime $from, \DateTime $to)
    {
        $from->setTimezone(new \DateTimeZone('UTC'));
        $this->from = $from;
        $to->setTimezone(new \DateTimeZone('UTC'));
        $this->to = $to;
    }

    /**
     * @return \DateTime
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return \DateTime
     */
    public function getTo()
    {
        return $this->to;
    }
}