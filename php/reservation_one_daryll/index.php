<?php
$dbc = mysqli_connect('localhost', 'root', '', 'baterya');

if (isset($_GET['intent'])) {
    if ($_GET['intent'] == 'add') {

        $gamer_id = strtoupper(substr($_GET['last_name'], 0, 3)) . '-' . strtoupper(date('His-dMY', time()));
        $name = $_GET['last_name'] . ', ' . $_GET['first_name'] . ' ' . $_GET['middle_name'];
        $date = date('F j, Y', time());


        $query = "INSERT INTO guests VALUES ('" . $gamer_id
                . "', '" . $name
                . "', '" . $_GET['guest_type'] . "', '"
                . $date . "')";
        echo $query;
        mysqli_query($dbc, $query);
    }
    if ($_GET['intent'] == 'edit') {
        $name = $_GET['last_name'] . ', ' . $_GET['first_name'] . ' ' . $_GET['middle_name'];

        $query = "UPDATE guests SET guest_name ='" . $name
                . "', guest_type ='" . $_GET['guest_type'] . "' WHERE guest_id='"
                . $_GET['guest_id'] . "' ";
        mysqli_query($dbc, $query);
    }
    if ($_GET['intent'] == 'delete') {
        $query = "DELETE FROM guests WHERE guest_id = '" . $_GET['guest_id'] . "'";
        echo $query;
        mysqli_query($dbc, $query);
    }
}

if (isset($_GET['transaction'])) {
    $room_rates = array("standard" => 1850, "suite" => 3250, "deluxe" => 4500, "family" => 7500);

    $results = mysqli_query($dbc, "SELECT * FROM guests WHERE guest_id = '" . $_GET['guest_id'] . "'");
    $is_member = false;
    $guest_name = '';
    while ($row = mysqli_fetch_assoc($results)) {
        if ($row['guest_type'] == 'member') {
            $is_member = true;
        }
        $guest_name = $row['guest_name'];
    }

    $number_of_rooms = $_GET['number_of_rooms'];
    $number_of_days = $_GET['number_of_days'];

    $amount_due = $number_of_rooms * $number_of_days * $room_rates[$_GET['room_type']];

    if ($is_member) {
        $amount_due = $amount_due * 0.95;
    }
    if ($number_of_days >= 7) {
        $amount_due = $amount_due * 0.97;
    }

    echo '<h1>Transaction:</h1>' . $amount_due;
}
?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<h1>GAWA KA BA SA BED RULL???</h1>
<h2>Reservacion Systematico</h2>

<fieldset>
    <h1>CRUD </h1>
    <form method="get" action="index.php" id="frmItems">
        <select name ="intent">
            <option value="add">Add</option>
            <option value="edit">Edit</option>
            <option value="delete">Delete</option>
            <option value="search">Search</option>
        </select>

        First Name<input name="first_name" type="text"/>
        Middle Name<input name="middle_name" type="text"/>
        Last Name<input name="last_name" type="text">/
        Guest Type
        <select name ="guest_type">
            <option value="member">Member</option>
            <option value="nonmember">Non-member</option>            
        </select>
        Guest ID (only for edit/delete)<input name="guest_id" type="text"/>
        <input type="submit"/>


    </form>
</fieldset>
<fieldset>
    <h1>Ang ating mga parokyano</h1>
    <table>
        <?php
        $results = mysqli_query($dbc, "SELECT * FROM guests");
        while ($row = mysqli_fetch_assoc($results)) {
            echo '<tr>
        <td>' . $row['guest_id'] . '</td>
        <td>' . $row['guest_name'] . '</td>
        <td>' . $row['guest_type'] . '</td>
        <td>' . $row['date_of_registration'] . '</td>
        </tr>';
        }
        ?>
    </table>
</fieldset>
<hr/>
<form method="get" action="index.php" id="frmItems">
    <input type="hidden" name="transaction"/>

    <h2>Room</h2>
    <select name ="room_type">
        <option value="standard">Standard - 1850</option>
        <option value="suite">Suite -  3250</option>
        <option value="deluxe">Deluxe - 4500</option>
        <option value="family">Family - 7500</option>
    </select>

    <div>ID<input name="guest_id" type="text"/></div>
    Number of Rooms<input name="number_of_rooms" type="number"/>
    Number of Days<input name="number_of_days" type="number"/>
    <input type="submit"/>


</form>

<img src="ako.jpg"/>