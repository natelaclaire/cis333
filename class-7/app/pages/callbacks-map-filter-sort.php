<?php
$pageTitle = 'Callbacks: map, filter, sort';

require_once __DIR__ . '/../data.php';
require_once __DIR__ . '/../partials/header.php';

$clubNames = array_values($clubsById);

$uppercased = array_map(
    fn(string $name): string => strtoupper($name),
    $clubNames
);

$techClubIds = $categories['technology'];
$techClubs = array_filter(
    $clubsById,
    fn(string $name, string $clubId): bool => in_array($clubId, $techClubIds, true),
    ARRAY_FILTER_USE_BOTH
);

$meetingsFlat = [];
foreach ($meetingsByClubId as $clubId => $meetings) {
    foreach ($meetings as $meeting) {
        [$day, $time, $location] = $meeting;
        $meetingsFlat[] = [
            'club' => $clubsById[$clubId],
            'day' => $day,
            'time' => $time,
            'location' => $location,
        ];
    }
}

usort(
    $meetingsFlat,
    fn(array $a, array $b): int => strcmp($a['day'] . $a['time'], $b['day'] . $b['time'])
);
?>

<p><a href="../index.php">Home</a></p>

<h2>array_map()</h2>
<p>Derive a new array from an existing array.</p>
<ul>
<?php foreach ($uppercased as $name): ?>
    <li><?php print $name; ?></li>
<?php endforeach; ?>
</ul>

<h2>array_filter()</h2>
<p>Filter an array down to only technology clubs.</p>
<ul>
<?php foreach ($techClubs as $clubId => $clubName): ?>
    <li><?php print $clubId . ': ' . $clubName; ?></li>
<?php endforeach; ?>
</ul>

<h2>usort()</h2>
<p>Sort a derived list of meetings by day/time.</p>
<ul>
<?php foreach ($meetingsFlat as $meeting): ?>
    <li>
        <?php
        print $meeting['club']
            . ': '
            . $meeting['day']
            . ' '
            . $meeting['time']
            . ' @ '
            . $meeting['location'];
        ?>
    </li>
<?php endforeach; ?>
</ul>

<?php
require_once __DIR__ . '/../partials/footer.php';

