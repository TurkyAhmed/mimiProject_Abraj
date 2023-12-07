<?php
    // require_once('../inc/app.php'); 
   
    $db_server = "127.0.0.1";
    $db_user = "root";
    $db_user_pass = "";
    $db_name = "abraj";

    $conn = db_connect($db_server, $db_user, $db_user_pass, $db_name);
    
    // $rooms = db_select($conn,'rooms','name,description');
    $rooms = db_select($conn,'rooms','*');

    // //  echo var_dump($description);
    //  echo "<pre> TR17 =>";
    // //  foreach($rooms as $room){
    //     //  foreach($room as $key => $value){
    //          echo ''. str_replace("\\n","<br>",$rooms[0]['description']) ;
    //     //  }
    //      echo "</pre>";
    // // }

    $f= explode("\\n",$rooms[0]['feature']);
    foreach($f as $k=>$v){
        switch($v){
            case str_contains($v,"screen"):
                echo"Air true";
                break;
            case str_contains($v,"bed"):
                echo "Bed true";
                break;
            
        }
    }


?>

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="Contact-hero carousel-item active">
                <div class="ll">
                    <img class="img-fluid" src="<?php echo ROOT_PATH ;?>assets/img/suite2.jpg" alt="">
                </div>

                <div class="container">
                  <div class="carousel-caption text-start">
                    <h1><span class="text-primary">ــــــ</span>Rooms</h1>
                    <p class="text-black"> `</p>
                    <!-- <p>Some representative placeholder content for the first slide of the carousel.</p> -->
                  </div>
                </div>
              </div>
            </div>
    </div>
    <!-- <div class="bg-navbar"></div> -->

    <!-- Deluxe Room -->

    <?php
    foreach($rooms as $room) :
    ?>
     <div class="room-types mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="order-dir col-12 col-lg-6 position-relative">
                   <h3 class="room room-light text-uppercase "> <?=$room['name']?></h3>
                   <h3 class="text-primary "> <?=$room['name']?> </h3>

                    <?php
                        $description = explode('\\n', $room['description']);
                        foreach($description as $paragraph) {
                            echo '<p class="text-black-50">'.$paragraph.'</p>';
                    }
                    ?>

                    <div class="room-services">
                        <div class="row my-pt-3">
                
                            <?php
                                $features =explode("\\n",$room['feature']);
                                foreach($features as $feature) {
                                    echo '<div class=" col-6 col-md-4 col-xlg-3">';

                                    if(str_contains($feature,'bed'))
                                        echo '<p><i class="fa-solid fa-bed text-primary me-2"></i>'.$feature.'</p>';
                                    else if(str_contains($feature,'screen'))
                                        echo '<p><i class="fa-solid fa-display text-primary me-2"></i>'.$feature.'</p>';
                                    else if(str_contains($feature,'Sound'))
                                        echo '<p><i class="fa-solid fa-volume-xmark text-primary me-2"></i>'.$feature.'</p>';
                                    else if(str_contains($feature,'View'))
                                        echo '<p><i class="fa-solid fa-mountain-sun text-primary me-2"></i>'.$feature.'</p>';
                                    else if(str_contains($feature,'Air'))
                                        echo '<p><i class="fa-solid fa-snowflake text-primary me-2"></i>'.$feature.'</p>';
                                    else if(str_contains($feature,'Balcony'))
                                        echo '<p><i class="fa-solid fa-person-through-window text-primary me-2"></i>'.$feature.'</p>';
                                    else if(str_contains($feature,'m'))
                                        echo '<p><i class="fa-solid fa-ruler-combined text-primary me-2"></i>'.$feature.'</p>';
                                    else if(str_contains($feature,'Washing'))
                                        echo '<p><i class="fa-solid fa-bed text-primary me-2"></i>'.$feature.'</p>';
                                    else if(str_contains($feature,'Kitchen'))
                                        echo '<p><i class="fa-solid fa-kitchen-set text-primary me-2"></i>'.$feature.'</p>';
                                    else if(str_contains($feature,'Coffee'))
                                        echo '<p><i class="fa-solid fa-mug-hot text-primary me-2"></i>'.$feature.'</p>';
                                    else
                                        echo '<p>'.$feature.'</p>';
                                    

                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
                        
                </div>
                <div class="col-12 col-lg-6 psition-relative">
                    <img src="<?php echo ROOT_PATH ;?>assets/img/dexelary1.jpg" alt="">
                    <img src="<?php echo ROOT_PATH ;?>assets/img/dexelary2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <?php
    endforeach;
    ?>



    <!-- <div class="room-types mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 position-relative">
                   <h3 class="room room-light text-uppercase "> Deluxe Room</h3>
                   <h3 class="text-primary "> Deluxe Room</h3>
                    <p class="text-black-50">The Deluxe Room is the epitome of luxury and elegance. It is a spacious and meticulously designed accommodation option that caters to the discerning tastes of our esteemed guests.</p>
                    <p class="text-black-50"> The Deluxe Room may offer additional perks such as a private balcony with breathtaking views, complimentary breakfast, and personalized concierge services</p>
                
                    <div class="room-services">
                        <div class="row my-pt-3">
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-bed text-primary me-2"></i>2 Double bed</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p> <i class="fa-solid fa-display text-primary me-2"></i>Flat screen</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p> <i class="fa-solid fa-volume-xmark text-primary me-2"></i> Sound proofing</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-mountain-sun text-primary me-2"></i>View</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-regular fa-snowflake text-primary me-2"></i>Air condition</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-person-through-window text-primary me-2"></i>Balcony</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-ruler-combined text-primary me-2"></i>25 m<sup>2</sup></p>
                            </div>
                        </div>

                    </div>
                        
                </div>
                <div class="col-12 col-lg-6 psition-relative">
                    <img src="<?php #echo ROOT_PATH ;?>assets/img/dexelary1.jpg" alt="">
                    <img src="<?php #echo ROOT_PATH ;?>assets/img/dexelary2.jpg" alt="">
                </div>
            </div>
        </div>
    </div> -->



    <!-- Suite Room -->
    <!-- <div class="suite-room mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 position-relative order-2">
                   <h3 class="suite room-light text-uppercase "> Suite Room</h3>
                   <h3 class="text-primary "> Suite Room</h3>
                    <p class="text-black-50">Welcome to our exquisite suite rooms, where indulgence and comfort intertwine to create an unforgettable stay. Our suite rooms are the epitome of luxury, designed to provide an elevated experience for our esteemed guests.</p>
                    <p class="text-black-50"> Each suite is thoughtfully designed to cater to your every need. Enjoy the generous living area, perfect for relaxation or entertaining guests. Unwind in the plush seating or take in the breathtaking views from the expansive windows that adorn the room.</p>

                    <div class="room-services">
                        <div class="row my-ps-3 my-pt-3">
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-bed text-primary me-2"></i>2 Double bed</p>
                            </div>
                            <div class=" col-md-4 col-lg-4">
                                <p><i class="fa-solid fa-display text-primary me-2"></i>Flat screen</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-volume-xmark text-primary me-2"></i>Sound proofing</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p> <i class="fa-solid fa-mountain-sun text-primary me-2"></i>View</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-regular fa-snowflake text-primary me-2"></i>Air condition</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-person-through-window text-primary me-2"></i>Balcony</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-ruler-combined text-primary me-2"></i>2* 25 m<sup>2</sup></p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                
                                <p>washing machine</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-kitchen-set text-primary me-2"></i>Private Kitchen</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-mug-hot text-primary me-2"></i>Tee/Coffee maker</p>
                            </div>
                        </div>

                    </div>
                
                </div>
                <div class="col-12 col-lg-6 psition-relative order-1">
                    <img src="<?php echo ROOT_PATH ;?>assets/img/suite2.jpg" alt="">
                    <img src="<?php echo ROOT_PATH ;?>assets/img/suite.png" alt="">
                </div>
            </div>
        </div>
    </div> -->

     <!-- Family Room -->
    <!-- <div class="family-room mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 position-relative">
                   <h3 class="family room-light text-uppercase "> Family Room</h3>
                   <h3 class="text-primary "> Family Room</h3>
                    <p class="text-black-50">The Family Room is the epitome of luxury and elegance. It is a spacious and meticulously designed accommodation option that caters to the discerning tastes of our esteemed guests.</p>
                    <p class="text-black-50"> The Family Room may offer additional perks such as a private balcony with breathtaking views, complimentary breakfast, and personalized concierge services</p>
                    <p class="text-black-50"> Our family rooms are carefully crafted to accommodate the needs of every family member. With ample space and thoughtful layout, there's plenty of room for everyone to relax and unwind. Whether you're traveling with young children, teenagers, or extended family, our family rooms offer the perfect retreat.</p>

                    <div class="room-services">
                        <div class="row my-pt-3">
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-bed text-primary me-2"></i>1 Double bed </p>
                            </div>

                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-bed text-primary me-2"></i>3 single bed </p>
                            </div>

                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-display text-primary me-2"></i>Flat screen</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-volume-xmark text-primary me-2"></i>Sound proofing</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-mountain-sun text-primary me-2"></i>View</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-regular fa-snowflake text-primary me-2"></i>Air condition</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-person-through-window text-primary me-2"></i>Balcony</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-ruler-combined text-primary me-2"></i>25 m<sup>2</sup></p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p>washing machine</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-kitchen-set text-primary me-2"></i>Private Kitchen</p>
                            </div>
                        </div>

                    </div>
                
                </div>
                <div class="col-12 col-lg-6 psition-relative">
                    <img src="<?php echo ROOT_PATH ;?>assets/img/chastity-cortijo-M8iGdeTSOkg-unsplash.jpg" alt="">
                    <img src="<?php echo ROOT_PATH ;?>assets/img/R2.jpg" alt="">
                </div>
            </div>
        </div>
    </div> -->

    <!-- Single Room -->
    <!-- <div class="single-room mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 position-relative order-2">
                   <h3 class="single room-light text-uppercase "> Single Room</h3>
                   <h3 class="text-primary ps-2"> Single Room</h3>
                    <p class="text-black-50 my-ps-3">Welcome to our cozy single rooms, designed with the solo traveler in mind. Our single rooms offer a comfortable and private retreat, providing a relaxing space for you to unwind and recharge during your stay.</p>
                    <p class="text-black-50 my-ps-3"> Step into your own personal haven, where simplicity meets comfort. Our single rooms are thoughtfully furnished with a comfortable single bed, ensuring a restful night's sleep. Sink into the plush bedding and enjoy a peaceful slumber, waking up refreshed and ready for the day ahead.</p>
                    <p class="text-black-50 my-ps-3"> Although compact in size, our single rooms are carefully designed to maximize functionality and convenience and We understand the importance of maintaining a sense of connection while traveling alone. That's why our single rooms are equipped with high-speed Wi-Fi, ensuring you can stay connected to loved ones or catch up on your favorite shows and movies.</p>
                
                    <div class="room-services">
                        <div class="row my-ps-3 my-pt-3">
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-bed text-primary me-2"></i>1 Single bed</p>
                            </div>
                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-display text-primary me-2"></i>Flat screen</p>
                            </div>

                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-regular fa-snowflake text-primary me-2"></i>Air condition</p>
                            </div>

                            <div class=" col-6 col-md-4 col-xlg-3">
                                <p><i class="fa-solid fa-ruler-combined text-primary me-2"></i>16 m<sup>2</sup></p>
                            </div>
                           
                        </div>

                    </div>
                
                </div>
                <div class="col-12 col-lg-6 psition-relative order-1">
                    <img src="<?php echo ROOT_PATH ;?>assets/img/christopher-jolly-GqbU78bdJFM-unsplash.jpg" alt="">
                    <img src="<?php echo ROOT_PATH ;?>assets/img/hr-1.jpg.webp" alt="">
                </div>
            </div>
        </div>
    </div> -->

 