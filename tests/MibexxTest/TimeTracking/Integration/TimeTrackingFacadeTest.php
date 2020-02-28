<?php
declare(strict_types=1);

namespace MibexxTest\TimeTracking\Integration;


use Codeception\TestCase\Test;
use Mibexx\TimeTracking\Adapter\TimeTracking;

class TimeTrackingFacadeTest extends Test
{
    public function testTracking()
    {
        TimeTracking::init();

        TimeTracking::track('First');
        usleep(1000000);
        TimeTracking::track('Second');
        usleep(1200000);
        TimeTracking::stop();
        TimeTracking::track('Second');
        usleep(1300000);
        TimeTracking::stop();
        TimeTracking::track('Third');
        usleep(1400000);
        TimeTracking::track('Fourth');
        usleep(1500000);
        TimeTracking::stop();
        TimeTracking::stop();
        TimeTracking::stop();

        $this->assertArrayHasKey(
            'First',
            TimeTracking::getTrackings()
        );
        $this->assertArrayHasKey(
            'First->Second',
            TimeTracking::getTrackings()
        );
        $this->assertArrayHasKey(
            'First->Third',
            TimeTracking::getTrackings()
        );
        $this->assertArrayHasKey(
            'First->Third->Fourth',
            TimeTracking::getTrackings()
        );
    }
}
