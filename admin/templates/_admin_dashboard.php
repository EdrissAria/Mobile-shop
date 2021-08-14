 <!-- Dashboard graph area -->
 <div class="graph_area">
        <div class="container">
            <div class="row">
                <div class="col lg-5">
                    <div class="user_name">
                        <h2>Welcome <strong><?php foreach($admin->getSessionData($_SESSION['login']) as $item){
                            echo $item['firstname'].' '.$item['lastname'];
                        }
                        ;?></strong></h2>
                    </div>
                </div>
                <div class="col lg-3 offset-lg-4">
                    <div class="add_link">
                        <a href="addproduct.php" class="btn btn-secondary btn-block">Add new product</a>
                    </div>
                </div>
            </div>
            <div class="value_cards_sec">
                <div class="row">
                    <div class="col col-lg-3">
                        <div class="value_card card_1">
                            <p>All Products</p>
                            <h3>45</h3>
                        </div>
                    </div>
                    <div class="col col-lg-3">
                        <div class="value_card card_2">
                            <p>Total Earnings</p>
                            <h3>45</h3>
                        </div>
                    </div>
                    <div class="col col-lg-3">
                        <div class="value_card card_3">
                            <p>Sales Today</p>
                            <h3>45</h3>
                        </div>
                    </div>
                    <div class="col col-lg-3">
                        <div class="value_card card_4">
                            <p>All Sales</p>
                            <h3>45</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="graph_sec">
                <div class="row">
                    <div class="col col-lg-3">
                        <div class="graph_sec_2">
                            <p>sales progress</p>
                            <canvas id="SalesProChart"></canvas>
                        </div>
                    </div>
                    <div class="col col-lg-9">
                        <div class="graph_sec_2">
                            <canvas id="wiseSalesChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard graph area -->