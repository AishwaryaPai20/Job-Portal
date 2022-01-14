<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style/style.css" rel="stylesheet">
    <style>
        .header {
            padding: 60px;
            text-align: center;
            background-image: url('images/background.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            font-size: 50px;
        }
    </style>
    <title>Career</title>
</head>


<div class="header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4" style="color: #c7c7ff; font-weight: bold;">Job Portal</h1>
            <p class="lead">Search and Get details of curated jobs here...</p>
        </div>
    </div>
</div>

<body style="margin-left: 5px; margin-right: 5px;">
    <div class="row" style=" margin-top:5px; width: 900px; box-sizing: content-box; border-top: 1px solid black; padding: 5px; color:purple; ">
        <?php
        $Result = mysqli_query($conn, "SELECT `cname`, `position`, `Jdesc`, `skills`, `CTC` FROM `jobs`");
        // $i = 0;
        if ($Result->num_rows > 0) {
            while ($row = $Result->fetch_assoc()) {
                echo '
                <div class="col-md-4" style="padding-left: 5px; box-shadow: 7px 5px 5px purple; border: 3px solid black;">
                <div class="jobs" style="border: 2px black; padding: 5px; ">
                <h3 style="text-align: center;">' . $row['position'] . '</h3>
                <h4 style="text-align: center;">' . $row['cname'] . '</h4>
                <p style="color: black text-align: justify;">' . $row['Jdesc'] . '</p>
                <p style="color: black;"><b>Skills Required :</b>' . $row['skills'] . '</p>
                <p style="color: black;"><b>CTC ' . $row['CTC'] . 'LPA</b></p>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-expanded="false" aria-controls="exampleModal">
                Apply Now
                </button>
                </div>
                </div>';
            }
        }
        ?>
    </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apply For Jobs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Applying For : </label>
                            <input type="text" class="form-control" name="apply">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Qualification : </label>
                            <input type="text" class="form-control" name="qual">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Year Passout : </label>
                            <input type="text" class="form-control" name="year">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="sub">Apply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>