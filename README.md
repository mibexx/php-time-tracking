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

echo '<table border="1" cellpadding="10"><thead><th align="left">Function</th><th align="right">Counter</th><th align="right">Times</th></thead><tbody>';
foreach ($trackingResults as $ident => $results) {
    echo sprintf(
        '<tr><td>%s</td><td align="right">%s</td><td align="right"><ul><li>%s</li></ul></td></tr>',
        $ident,
        count($results['trackings']),
        implode('</li><li>', array_column($results['trackings'], 'time'))
    );
}
echo '</tbody></table>';
```
