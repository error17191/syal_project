<section id="search_container">
    <div id="search">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tours" data-toggle="tab">Tours</a></li>
            <li><a href="#hotels" data-toggle="tab">Hotels</a></li>
            <li><a href="#transfers" data-toggle="tab">Transfers</a></li>
            <li><a href="#restaurants" data-toggle="tab">Restaurants</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="tours">
                <h3>Search Tours in Paris</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Search terms</label>
                            <input type="text" class="form-control" id="firstname_booking" name="firstname_booking" placeholder="Type your search terms">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Things to do</label>
                            <select class="ddslick" name="category">
                                <option value="0" data-imagesrc="img/icons_search/all_tours.png" selected>All tours</option>
                                <option value="1" data-imagesrc="img/icons_search/sightseeing.png">City sightseeing</option>
                                <option value="2"  data-imagesrc="img/icons_search/museums.png">Museum tours</option>
                                <option value="3" data-imagesrc="img/icons_search/historic.png">Historic Buildings</option>
                                <option value="4" data-imagesrc="img/icons_search/walking.png">Walking tours</option>
                                <option value="5" data-imagesrc="img/icons_search/eat.png">Eat & Drink</option>
                                <option value="6" data-imagesrc="img/icons_search/churches.png">Churces</option>
                                <option value="7" data-imagesrc="img/icons_search/skyline.png">Skyline tours</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><i class="icon-calendar-7"></i> Date</label>
                            <input class="date-pick form-control" data-date-format="M d, D" type="text">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><i class=" icon-clock"></i> Time</label>
                            <input class="time-pick form-control" value="12:00 AM" type="text">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="form-group">
                            <label>Adults</label>
                            <div class="numbers-row">
                                <input type="text" value="1" id="adults" class="qty2 form-control" name="adults">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="form-group">
                            <label>Children</label>
                            <div class="numbers-row">
                                <input type="text" value="0" id="children" class="qty2 form-control" name="children">
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End row -->
                <hr>
                <button class="btn_1 green"><i class="icon-search"></i>Search now</button>
            </div>
            <!-- End rab -->
            <div class="tab-pane" id="hotels">
                <h3>Search Hotels in Paris</h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><i class="icon-calendar-7"></i> Check in</label>
                            <input class="date-pick form-control" data-date-format="M d, D" type="text">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><i class="icon-calendar-7"></i> Check out</label>
                            <input class="date-pick form-control" data-date-format="M d, D" type="text">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-5">
                        <div class="form-group">
                            <label>Adults</label>
                            <div class="numbers-row">
                                <input type="text" value="1" id="adults" class="qty2 form-control" name="adults_2">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-5">
                        <div class="form-group">
                            <label>Children</label>
                            <div class="numbers-row">
                                <input type="text" value="0" id="children" class="qty2 form-control" name="children_2">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label>Rooms</label>
                            <div class="numbers-row">
                                <input type="text" value="1" id="children" class="qty2 form-control" name="rooms">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Hotel name</label>
                            <input type="text" class="form-control" id="hotel_name" name="hotel_name" placeholder="Optionally type hotel name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Preferred city area</label>
                            <select class="form-control" name="area">
                                <option value="Centre" selected>Centre</option>
                                <option value="Gar du Nord Station">Gar du Nord Station</option>
                                <option value="La Defance">La Defance</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <hr>
                <button class="btn_1 green"><i class="icon-search"></i>Search now</button>
            </div>
            <div class="tab-pane" id="transfers">
                <h3>Search Transfers in Paris</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="select-label">Pick up location</label>
                            <select class="form-control">
                                <option value="orly_airport">Orly airport</option>
                                <option value="gar_du_nord">Gar du Nord Station</option>
                                <option value="hotel_rivoli">Hotel Rivoli</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="select-label">Drop off location</label>
                            <select class="form-control">
                                <option value="orly_airport">Orly airport</option>
                                <option value="gar_du_nord">Gar du Nord Station</option>
                                <option value="hotel_rivoli">Hotel Rivoli</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><i class="icon-calendar-7"></i> Date</label>
                            <input class="date-pick form-control" data-date-format="M d, D" type="text">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><i class=" icon-clock"></i> Time</label>
                            <input class="time-pick form-control" value="12:00 AM" type="text">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <div class="form-group">
                            <label>Adults</label>
                            <div class="numbers-row">
                                <input type="text" value="1" id="adults" class="qty2 form-control" name="quantity">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-9">
                        <div class="form-group">
                            <div class="radio_fix">
                                <label class="radio-inline" style="padding-left:0">
                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked> One Way
                                </label>
                            </div>
                            <div class="radio_fix">
                                <label class="radio-inline">
                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Return
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <hr>
                <button class="btn_1 green"><i class="icon-search"></i>Search now</button>
            </div>
            <div class="tab-pane" id="restaurants">
                <h3>Search Restaurants in Paris</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Search by name</label>
                            <input type="text" class="form-control" id="restaurant_name" name="restaurant_name" placeholder="Type your search terms">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Food type</label>
                            <select class="ddslick" name="category_2">
                                <option value="0" data-imagesrc="img/icons_search/all_restaurants.png" selected>All restaurants</option>
                                <option value="1" data-imagesrc="img/icons_search/fast_food.png">Fast food</option>
                                <option value="2"  data-imagesrc="img/icons_search/pizza_italian.png">Pizza / Italian</option>
                                <option value="3" data-imagesrc="img/icons_search/international.png">International</option>
                                <option value="4" data-imagesrc="img/icons_search/japanese.png">Japanese</option>
                                <option value="5" data-imagesrc="img/icons_search/chinese.png">Chinese</option>
                                <option value="6" data-imagesrc="img/icons_search/bar.png">Coffee Bar</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><i class="icon-calendar-7"></i> Date</label>
                            <input class="date-pick form-control" data-date-format="M d, D" type="text">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><i class=" icon-clock"></i> Time</label>
                            <input class="time-pick form-control" value="12:00 AM" type="text">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="form-group">
                            <label>Adults</label>
                            <div class="numbers-row">
                                <input type="text" value="1" id="adults" class="qty2 form-control" name="adults">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="form-group">
                            <label>Children</label>
                            <div class="numbers-row">
                                <input type="text" value="0" id="children" class="qty2 form-control" name="children">
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End row -->
                <hr>
                <button class="btn_1 green"><i class="icon-search"></i>Search now</button>
            </div>
        </div>
    </div>
</section>