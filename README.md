# php-time-tracking

Tracks execution time in php applications.

## Init
```php
use Mibexx\TimeTracking\Adapter\TimeTracking;


TimeTracking::init();
```


## Usage
```php
use Mibexx\TimeTracking\Adapter\TimeTracking;

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
```


## Get Results
```php
use Mibexx\TimeTracking\Adapter\TimeTracking;

$trackingResults = TimeTracking::getTrackings();

foreach ($trackingResults as $ident => $results) {
    echo $ident . ' => (' . explode('/', array_column($results, 'time')) . ')';
}
```
