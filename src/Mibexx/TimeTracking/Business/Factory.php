<?php
declare(strict_types=1);

namespace Mibexx\TimeTracking\Business;


use Mibexx\TimeTracking\Business\Tracking\TrackingManager;
use Mibexx\TimeTracking\Business\Tracking\TrackingManagerInterface;

class Factory implements FactoryInterface
{
    /**
     * @var TrackingManagerInterface
     */
    private $trackingManager;

    public function createTrackingManager(): TrackingManagerInterface
    {
        return new TrackingManager();
    }

    public function getTrackingManager(): TrackingManagerInterface
    {
        if (!$this->trackingManager) {
            $this->trackingManager = $this->createTrackingManager();
        }

        return $this->trackingManager;
    }


}
