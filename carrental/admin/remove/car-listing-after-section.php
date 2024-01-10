
<section class="listing-page">
  <div class="container">
    <div class="row">

          <!--Side-Bar-->
          <!-- <aside class="col-md-5">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your  Car </h5>
          </div>
          <div >
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <div class="row" style="margin:15px">
          <form class="widget_heading" action="search.php" method="post" id="header-search-form">
          <div class="row">
            <input type="text" placeholder="you can Search by any keyword... " name="searchdata" class="form-control" required="true">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </div>
          </form>
          </div>
          </div>
        </div>

      </aside> -->

      <aside class="col-md-5">
    <div class="sidebar_widget">
        <div class="widget_heading">
            <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Car </h5>
        </div>
        <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
        <div class="row" style="margin:15px;background-color:#EEEEEE">
            <form  action="search.php" method="post" id="header-search-form">
                <div class="row">
                    <div class="col-md-9"> <!-- Adjust the column size as needed -->
                        <input type="text" placeholder="You can search by any keyword..." name="searchdata" class="form-control" required="true">
                    </div>
                    <div class="col-md-3" style="margin-top:10px; color:#325E9F" > <!-- Adjust the column size as needed -->
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</aside>
      <!--/Side-Bar--> 


      <div class="col-md-7">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
              <?php 
              //Query for Listing count
              $sql = "SELECT id from tblvehicles";
              $query = $dbh -> prepare($sql);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $cnt=$query->rowCount();
              ?>
            <p><span><?php echo htmlentities($cnt);?> Listings</span></p>
          </div>
        </div>


          <?php $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
          $query = $dbh -> prepare($sql);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          $cnt=1;
          if($query->rowCount() > 0)
          {
          foreach($results as $result)
          {  ?>
                  <div class="product-listing-m gray-bg">
                    <div class="product-listing-img"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="Image" /> </a> 
                    </div>
                    <div class="product-listing-content">
                      <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h5>
                      <p class="list-price">£<?php echo htmlentities($result->PricePerDay);?> Per Day</p>
                      <ul>
                        <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
                        <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?> model</li>
                        <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo htmlentities($result->Location);?></li>
                      </ul>
                      <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                    </div>
                  </div>
                <?php }} ?>
         </div>
      

    </div>
  </div>
</section>