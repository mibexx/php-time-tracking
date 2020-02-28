<?php
declare(strict_types=1);

namespace Mibexx\TimeTracking\Adapter;


use Mibexx\TimeTracking\TimeTrackingFacade;
use Mibexx\TimeTracking\TimeTrackingFacadeInterface;

class TimeTracking
{
    /**
     * @var \Mibexx\TimeTracking\TimeTrackingFacadeInterface
     */
    private static $facade;

    /**
     * @param \Mibexx\TimeTracking\TimeTrackingFacadeInterface $facade
     */
    public static function init(TimeTrackingFacadeInterface $facade = null)
    {
        if ($facade === null) {
            $facade = new TimeTrackingFacade();
        }

        static::$facade = $facade;
    }


    /**
     * @param \Mibexx\TimeTracking\Adapter\string $name
     */
    public static function track(string $name): void
    {
        static::$facade->track($name);
    }

    /**
     * @param \Mibexx\TimeTracking\Adapter\string $name
     */
    public static function stop(): void
    {
        static::$facade->stop();
    }

    /**
     * @return array
     */
    public static function getTrackings(): array
    {
        return static::$facade->getTrackings();
    }
}
