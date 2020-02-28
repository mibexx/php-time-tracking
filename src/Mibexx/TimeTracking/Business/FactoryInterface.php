<?php
declare(strict_types=1);

namespace Mibexx\TimeTracking\Business;


use Mibexx\TimeTracking\Business\Tracking\TrackingManagerInterface;

interface FactoryInterface
{
    public function createTrackingManager(): TrackingManagerInterface;

    public function getTrackingManager(): TrackingManagerInterface;
}
