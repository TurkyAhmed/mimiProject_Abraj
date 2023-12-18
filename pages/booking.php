<?php
if(isset($_POST["submit"])){
        $checkin=$_REQUEST["checkin"];
        $checkOut=$_REQUEST["check_out"];
        $categoryRoom=$_REQUEST["category_room"];
        $Adulte=$_REQUEST["Adulte"];
        $childern=$_REQUEST["childern"];

        $content ="
        checkin: $checkin
    checkcout: $checkOut
    category room: $categoryRoom
    Adulte: $Adulte 
    childern: $childern ";


        $apiToken = "6478668361:AAEKMmCMzsq6Duwz1BzN2MC-9rkUb1JbQeY";
        $data = [
            'chat_id' => '@Abraj_Booking', //to be private replace @TR_A to -1002125885464
            'text' => $content 
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
        // Do what you want with result.
    }
    echo @$content;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assest/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assest/css/style.css">
    <title>Document</title>
</head>
<body>
    <!-- <section class="booking">
        <div class="container">
            <div class="bg-light p-3">
                <form action="">
                        <div class="row d-flex justify-content-center">
                        <div class="col-2">
                            <p>Check In</p>
                            <input type="date" name="checkin"  placeholder="Checkin Date">
                        </div>
                        <div class="col-2">
                            <p>Check Out</p>
                            <input type="date" name="checkout" id="">
                        </div>
                        <div class="col-2">
                            <p>Room</p>
                            <input type="text" name="categort_Room" id="">
                        </div>
                        <div class="col-2">
                            <p>Adulte</p>
                            <input type="text" name="Adulte" id="">
                        </div>
                        <div class="col-2">
                            <p>children</p>
                            <input type="text" name="child" id="">
                        </div>
                        <div class="col-2">
                            <a class="btn bg-primary d-block" href="#">CECk</a>
                            <a class="btn bg-success d-block" href="#">BOOK</a>  
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section> -->

    <section class="ver-booking">
        <div class="container">
            <div class="booking">
                <div class="row d-flex justify-content-center align-content-center">
                <form action="" method="POST">
                    <div class="d-flex justify-content-between ">
                        <div class="mb-4">
                            <label for="checkin" class="form-label">Checkin Date</label>
                            <input type="date" class="form-control " name="checkin" id="checkin" placeholder="Checkin Date">
                        </div>
                        <div class="mb-4">
                            <label for="check_out" class="form-label">Check out Date</label>
                            <input type="date" class="form-control" name="check_out" id="check_out" placeholder="Check out Date">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="category_room" class="form-label">Category Room</label>
                        <input type="text" class="form-control" name="category_room" id="category_room" placeholder="Category Room">
                    </div>

                    <div class="d-flex justify-content-between ">
                        <div class="mb-4">
                            <label for="Adulte" class="form-label">Adulte</label>
                            <input type="number" class="form-control" name="Adulte" id="Adulte" placeholder="Adulte">
                        </div>
                        <div class="mb-4">
                            <label for="childern" class="form-label">childern   </label>
                            <input type="number" class="form-control" name="childern" id="childern" placeholder="childern">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Choose photo   </label>
                        <input type="file" class="form-control" name="" aria-label="file example"  required>
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <input type="submit" name="check" value="Check">
                        <input type="submit" name="submit" value="Book">
                    </div>

                </form>
                </div>
            </div>
            
        </div>
    </section>
    <script src="./assest/bootstrap-5.0.2/dist/js/bootstrap.bundle.js"></script>
</body>
</html>
