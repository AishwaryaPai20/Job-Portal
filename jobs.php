<?php include 'header.php' ?>
<?php include 'config.php' ?>

<div class="content">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Candidate Name</th>
                <th scope="col">Position</th>
                <th scope="col">Year Passout</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $Result = mysqli_query($conn, "SELECT `name`, `apply`, `year` FROM `candidates`");
            $i = 0;
            if ($Result->num_rows > 0) {
                while ($rows = $Result->fetch_assoc()) {
                    echo '
                    <tr>
                        <th scope="row">' . ++$i . '</th>
                        <td>' . $rows['name'] . '</td>
                        <td>' . $rows['apply'] . '</td>
                        <td>' . $rows['year'] . '</td>
                    </tr>';
                }
            } else {
                echo "";
            }
            ?>
        </tbody>
    </table>
</div>