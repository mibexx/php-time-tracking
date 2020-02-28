<?php
declare(strict_types=1);

namespace Mibexx\TimeTracking;


use Mibexx\TimeTracking\Business\Factory;
use Mibexx\TimeTracking\Business\FactoryInterface;

class TimeTrackingFacade implements TimeTrackingFacadeInterface
{
    /**
     * @var \Mibexx\TimeTracking\Business\FactoryInterface
     */
    private $factory;

    /**
     * TimeTrackingFacade constructor.
     *
     * @param \Mibexx\TimeTracking\Business\FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory = null)
    {
        if ($factory === null) {
            $factory = new Factory();
        }

        $this->factory = $factory;
    }

    /**
     * @param string $name
     */
    public function track(string $name): void
    {
        $this->factory->getTrackingManager()->track($name);
    }

    /**
     * @param string $name
     */
    public function stop(): void
    {
        $this->factory->getTrackingManager()->stop();
    }

    /**
     * @return array
     */
    public function getTrackings(): array
    {
        return $this->factory->getTrackingManager()->getTrackings();
    }
}
