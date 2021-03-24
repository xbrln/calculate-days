<form method="post">
    Date of birth: <input type="text" name="date_of_birth" placeholder="dd-mm-yyyy"> <input type="submit"
                                                                                            value="calculate days on earth">
</form>

<?php
    if (isset($error)) {
        echo $error;
    }
?>

<?php
    if (isset($daysOnEarth) && isset($dateOfBirth)) {
        echo "You were born on <b>$dateOfBirth</b> and have lived <b>" . $daysOnEarth . "</b> days on earth<br>";
        ;
    }
?>
