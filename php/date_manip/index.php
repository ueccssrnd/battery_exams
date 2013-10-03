<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Date Manipulation</title>
    </head>
    <body>
        <h1>Date Manipulation</h1>
        <p><a href="http://php.net/manual/en/function.date.php">Source</a></p>
        <?php
//        Set the time zone first or else you'll see inaccurate dates
        date_default_timezone_set('Asia/Manila');

        function print_date($date) {
            echo '<p>' . date('Ymd H:i:s, l', $date) . '</p>';
        }

//        Check what day of the week it is today
        echo '<p>' . date('l') . '</p>';
//        Date maniulation via strtotime()
        print_date(strtotime('-5 days'));
//        Get date today
        print_date(strtotime("now"));
//        Get specific date
        print_date(strtotime("10 September 2000"));
//        Add a day, a week, or something else
        print_date(strtotime("+1 day"));
        print_date(strtotime("+1 week"));
        print_date(strtotime("+1 week 2 days 4 hours 2 seconds"));
//        Print occurences of specific week days
        print_date(strtotime("next Thursday"));
        print_date(strtotime("last Monday"));
        ?>
    </body>
</html>
