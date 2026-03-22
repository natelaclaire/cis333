<?php
$pageTitle = 'Meeting Schedule (Multidimensional Arrays)';

require_once __DIR__ . '/../data.php';
require_once __DIR__ . '/../partials/header.php';

function meetingRowHtml(string $clubName, array $meeting): string
{
    [$day, $time, $location] = $meeting;

    return vsprintf(
        '<li><strong>%s</strong>: %s at %s (%s)</li>',
        [
            htmlspecialchars($clubName, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($day, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($time, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($location, ENT_QUOTES, 'UTF-8'),
        ]
    );
}
?>

<p><a href="../index.php">Home</a></p>

<p>This page uses a multidimensional array for meeting schedules.</p>

<h2>All Meetings</h2>
<ul>
<?php foreach ($meetingsByClubId as $clubId => $meetings): ?>
    <?php $clubName = $clubsById[$clubId]; ?>
    <?php foreach ($meetings as $meeting): ?>
        <?php print meetingRowHtml($clubName, $meeting); ?>
    <?php endforeach; ?>
<?php endforeach; ?>
</ul>

<?php
require_once __DIR__ . '/../partials/footer.php';

