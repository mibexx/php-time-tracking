<?php
declare(strict_types=1);

namespace Mibexx\TimeTracking\Business\Tracking;


class TrackingManager implements TrackingManagerInterface
{
    /**
     * @var array
     */
    private $trackings = [];

    /**
     * @var array
     */
    private $path = [];

    private $maxDeep = 0;

    /**
     * @param string $name
     */
    public function track(string $name): void
    {
        $this->path[] = $name;
        $this->maxDeep = count($this->path);

        $ident = implode('->', $this->path);
        if (!isset($this->trackings[$ident])) {
            $this->trackings[$ident] = [
                'current' => 0,
                'trackings' => []
            ];
        }

        $this->trackings[$ident]['trackings'][$this->trackings[$ident]['current']] = [
            'start' => microtime(true),
            'end' => 0,
            'time' => 0,
            'timeincl' => 0,
        ];
    }

    /**
     * @param string $name
     */
    public function stop(): void
    {
        $ident = implode('->', $this->path);

        $this->trackings[$ident]['trackings'][$this->trackings[$ident]['current']]['end'] = microtime(true);
        $this->trackings[$ident]['trackings'][$this->trackings[$ident]['current']]['time'] = round(
            $this->trackings[$ident]['trackings'][$this->trackings[$ident]['current']]['end']
            -$this->trackings[$ident]['trackings'][$this->trackings[$ident]['current']]['start'],
            5
        );

        array_pop($this->path);
        $parentIdent = implode('->', $this->path);
        if ($parentIdent) {
            $this->trackings[$parentIdent]['trackings'][$this->trackings[$parentIdent]['current']]['timeincl'] += $this->trackings[$ident]['trackings'][$this->trackings[$ident]['current']]['time'];
        }

        $this->trackings[$ident]['current']++;
    }

    /**
     * @return array
     */
    public function getTrackings(): array
    {
        return $this->trackings;
    }
}
