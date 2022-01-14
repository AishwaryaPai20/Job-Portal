<?php include 'header.php' ?>
<?php include 'config.php' ?>

<!-- Page content -->
<div class="content">
    <p>
        <!-- <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Link with href
                </a> -->
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Post Job
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="Company Name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="Company Name" name="cname">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPosition" class="form-label">Position</label>
                    <input type="text" class="form-control" id="exampleInputPosition" name="position">
                </div>
                <div class="mb-3">
                    <label for="Job Desc" class="form-label">Job Description</label>
                    <textarea cols="30" rows="5" class="form-control" id="Job Desc" name="Jdesc"></textarea>
                </div>
                <div class="mb-3">
                    <label for="Skills" class="form-label">Skills Required</label>
                    <input type="text" class="form-control" id="skills" name="skills">
                </div>
                <div class="mb-3">
                    <label for="CTC" class="form-label">CTC</label>
                    <input type="text" class="form-control" id="CTC" name="CTC">
                </div>
                <button type="submit" class="btn btn-primary" name="job">Submit</button>
            </form>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Company Name</th>
                <th scope="col">Position</th>
                <th scope="col">CTC</th>
            </tr>
        </thead>
        <?php
        $Result = mysqli_query($conn, "SELECT `cname`, `position`, `CTC` FROM `jobs`");
        $i = 0;
        if ($Result->num_rows > 0) {
            while ($row = $Result->fetch_assoc()) {
                echo "
                    <tbody>
                    <tr>
                    <td>" . ++$i . "</td>
                        <td>" . $row['cname'] . "</td>
                        <td>" . $row['position']  . "</td>
                        <td>" . $row['CTC']  . " LPA</td>
                    </tr>";
            }
        } else {
            echo "";
        }
        ?>
        <!-- <tr>
            <th scope="row">1</th>
            <td>TCS</td>
            <td>Software Developer</td>
            <td>8LPA</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Google</td>
            <td>Digital Marketing</td>
            <td>12LPA</td>
        </tr> -->
        </tbody>
    </table>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>