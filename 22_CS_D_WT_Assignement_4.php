<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



</head>
<style>
    body {

        background-color: #cbe7f2;
    }
</style>

<?php

$info = array(
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'contact' => '',
);

if (isset($_POST['issubmitted'])) {
    $info['first_name'] = $_POST['first_name'];
    $info['last_name'] = $_POST['last_name'];
    $info['email'] = $_POST['email'];
    $info['contact'] = $_POST['contact'];
}


$result_str = $result = '';
if (isset($_POST['issubmitted'])) {
    $units = $_POST['units'];
    if (!empty($units)) {
        $result = calculate_bill($units);
        $result_str = 'Rs ' . $result;
    }
}

function calculate_bill($units)
{
    $unit_cost_first = 3.50;
    $unit_cost_second = 4.00;
    $unit_cost_third = 5.20;
    $unit_cost_fourth = 6.50;

    if ($units <= 50) {
        $bill = $units * $unit_cost_first;
    } else if ($units > 50 && $units <= 100) {
        $temp = 50 * $unit_cost_first;
        $remaining_units = $units - 50;
        $bill = $temp + ($remaining_units * $unit_cost_second);
    } else if ($units > 100 && $units <= 200) {
        $temp = (50 * 3.5) + (100 * $unit_cost_second);
        $remaining_units = $units - 150;
        $bill = $temp + ($remaining_units * $unit_cost_third);
    } else {
        $temp = (50 * 3.5) + (100 * $unit_cost_second) + (100 * $unit_cost_third);
        $remaining_units = $units - 250;
        $bill = $temp + ($remaining_units * $unit_cost_fourth);
    }
    return number_format((float) $bill, 2, '.', '');
}

?>

<body>
    <div class="container mt-5">
        <div>
            <h1 class="text-center">Electricity Bill</h1>
        </div>
        <div>
            <div id="first_half">


                <form action="" method="POST">
                    <h6>Personal Information</h6>
                    <div class=" PInfo form mx-auto p-10">

                        <div class="row ">
                            <div class="col">
                                <input type="text" class="form-control" name="first_name" placeholder="First name"
                                    aria-label="First name">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="last_name" placeholder="Last name"
                                    aria-label="Last name">
                            </div>
                        </div>
                        <div class="row mt-3">

                            <div class="col">
                                <label class="form-label">Email : </label>
                                <Input type="email" class="form-control" name="email"
                                    placeholder="Enter bill holder email">
                            </div>
                            <div class="col">
                                <label class="form-label">Contact: </label>
                                <Input type="Number" class="form-control" name="contact" placeholder="+91">
                            </div>
                        </div>

                    </div>


                    <!-- Billing info -->

                    <div class="mt-3 p- 10">
                        <h6>Billing Information</h6>
                        <div class="BInfo">
                            <label class="form-label">Units Consumed : </label>
                            <Input type="number" name="units" class="form-control" placeholder="units">
                        </div>
                    </div>

                    <button type="submit" name="issubmitted" class="btn btn-dark mt-3"
                        onclick="displayfun()">Submit</button>
                </form>

            </div>



            <hr>

            <div class="Bill">

                <div class="row my-3">

                    <p>
                        <span class="fw-bold fs-larger">Name :</span>
                        <?php echo $info['first_name'] . ' ' . $info['last_name']; ?>
                    </p>


                </div>
                <div class="row">
                    <p>
                        <span class="fw-bold fs-larger">Email :</span>
                        <?php echo $info['email']; ?>
                    </p>

                </div>

                <div class="row my-3 ">
                    <p>
                        <span class="fw-bold fs-larger">Contact :</span>
                        <?php echo $info['contact']; ?>
                    </p>

                </div>
                <div class="row">
                    <p>
                        <span class="fw-bold fs-larger">Date :</span>
                        <?php
                        $curr_date = Date('d-m-y');
                        echo "$curr_date" ?>
                    </p>



                </div>

                <div class="row mt-3">
                    <p>
                        <span class="fw-bold fs-larger">Units Consumed :</span>
                        <?php echo $units; ?>
                    </p>



                </div>


                <div class="row">
                    <button class="btn btn-outline-danger disabled mt-5">
                        <h4> Payable Amount : <h5>
                                <?php echo "$result_str"; ?>
                            </h5>
                        </h4>
                    </button>

                </div>

            </div>


        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


</body>

</html>