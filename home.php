<?php include "availability_search.php"; ?>
<!-- Projects Row -->
<div class="row">
    <div class="col-md-8 img-portfolio">
        <div class="page-header">
            <h1>Welcome to Midway Minkay Restobar and Catering Services</h1>
        </div>

        <div class="col-md-8">
            <a href="images/cover-photo.jpeg">
                <img class="img-rounded" src="<?php echo WEB_ROOT; ?>images/cover-photo.jpeg" alt="">
            </a>
        </div>

        <div class="col-md-4">
            <h3>Contact Info</h3>
            <div class="space"></div>
            <p><i class="fa fa-map-marker fa-fw pull-left"></i>P3A, Tubigan, Initao, Mis. Or. 9022</p>
            <div class="space"></div>
            <p><i class="fa fa-envelope-o fa-fw pull-left"></i>midway1115@yahoo.com</p>
            <div class="space"></div>
            <p><i class="fa fa-phone fa-fw pull-left"></i>0975-081-5326 | 0927-285-5608</p>
        </div>
        <div class="col-md-6">
            <br>
            <hr>
            <h4>Located conveniently along the National Highway of 
                Barangay Tubigan, Initao, Misamis Oriental and a few minutes away from Initao National Park.
            </h4>
            <p>
                Midway White Beach Resort is known for its scenic ambiance, white sand beaches, fun water rides and
                its Filipino hospitality.
                The resort caters national conventions, official government functions, private weddings, 
                family gatherings and all other occassions are held here.
            </p>
            <hr>
        </div>
    </div>

    <div class="col-md-3 img-portfolio">
        <div class="page-header">
            <h2>Type Of Rooms</h2>
        </div>
        <div class="roomdesc">
            <ul class="a">
                <?php
                $query = "SELECT distinct(room) FROM `room` ";
                $mydb->setQuery($query);
                $cur = $mydb->loadResultList();
                ?>

                <?php foreach ($cur as $result) { ?>
                    <li>
                        <h4><a href="<?php echo WEB_ROOT; ?>index.php?p=rooms&q=<?php echo $result->room; ?>">
                                <p><?php echo $result->room; ?></p>
                            </a></h4>
                    </li>
                <?php  } ?>


            </ul>
        </div>

    </div>



</div>
<!-- Projects Row -->
<div class="row">
    <div class="col-md-12 ">
        <div class="page-header">
            <h1>Accomodation</h1>
        </div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img class="img-responsive" width="100%" src="<?php echo WEB_ROOT; ?>images/header-bg1.jpg">
                    <figcaption class="img-title-active">
                        <h5 style="margin-left: 15px;"> Standard Room</h5>
                        <h1> &#8369 1,430</h1>
                    </figcaption>
                </div>

                <div class="item ">
                    <img class="img-responsive" width="100%" src="<?php echo WEB_ROOT; ?>images/header-bg1.jpg">
                    <figcaption class="img-title-active">
                        <h5 style="margin-left: 15px;">Travellers Time</h5>
                        <h1> &#8369 1,430</h1>
                    </figcaption>
                </div>
                <div class="item">
                    <img class="img-responsive" width="100%" src="<?php echo WEB_ROOT; ?>images/header-bg1.jpg">
                    <figcaption class="img-title-active">
                        <h5 style="margin-left: 15px;">Bayanihan Room</h5>
                        <h1> &#8369 1,430</h1>
                    </figcaption>

                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>