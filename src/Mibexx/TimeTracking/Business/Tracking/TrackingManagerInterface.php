<?php
declare(strict_types=1);

namespace Mibexx\TimeTracking\Business\Tracking;


interface TrackingManagerInterface
{
    /**
     * @param string $name
     */
    public function track(string $name): void;

    /**
     * @param string $name
     */
    public function stop(): void;

    /**
     * @return array
     */
    public function getTrackings(): array;
}
