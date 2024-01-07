@extends('website::layouts.landing')

@section('content')
    <section class="container-fluid offer-block position-relative">
        <img data-src="{{ public_asset('website/landing/img/blockimg.png') }}" class="position-absolute blockimg lazy">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 offertop">
                    <h3>Best deal, you dont want to miss out, How?</h3>
                    <p>Whether you want to explore the Mighty Everest or feel the beauty of Chitwan National park or just
                        roam around Kathmandu, the capital, we have you covered. We bet, this is the best deal you will ever
                        come across.</p>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 offercontent">
                    <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4 col4">
                        <div class="save"><img data-src="{{ public_asset('website/landing/img/save.jpg') }}" class="lazy">
                        </div>
                        <p>Save upto 40%</p>
                        <p>Full package on $ 2,477 including International flight tickets, Accommodation and Meals</p>
                    </div>
                    <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4 col4">
                        <div class="extra"><img src="{{ public_asset('website/landing/img/extratour.jpg') }}"></div>
                        <p>Extra tour offers</p>
                        <p>15 Days Trekking including Legendary Kathmandu Sight seen program and Complimentary 2/3 Days
                            Package program in Chitwan National Park (If you wish to Extend your Days). <a
                                href="https://www.traveladventurenepal.com.au/chitwan-at-glance">Click here for Detail
                                Itinerary of Chitwan National Park</a> </p>
                    </div>
                    <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4 col4">
                        <div class="visit"><img src="{{ public_asset('website/landing/img/visit.png') }}"></div>
                        <p>Visit Nepal 2020</p>
                        <p>Premier Trekking program Endorsing “VISIT NEPAL 2020”</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tripdescription-block container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 tripcontentwrapper">
                    <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6 col6 left-content">
                        <h3>What is Everest Base Camp Trek?</h3>
                        <p>Everest, Top of the world is situated at Khumbu valley of Nepal, well known vicinity amongst the
                            trekking community and beyond for its beauty, adventurous treks and difficult terrain that
                            attracts lots of challenger to approach and conquer this beastly beauty throughout the year.
                            Magnificent landscapes, imposing and prestigious peaks, tampering ridges and colourful Sherpa
                            Villages have contributed to gain a unique identity for this trekking journey. Every single step
                            you take through the trekking will lead to unlock the mystery of Himalayas. Flight to Lukla,
                            trekking through Enchanting Sherpa High Country and unspoilt Buddhists monasteries makes the
                            Everest Base Camp trek the BEST TREK Ever.</p>
                    </div>

                    <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6 col6 right-content">
                        <img data-src="{{ public_asset('website/landing/img/mountain.jpg') }}" class="img-fluid lazy">
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 tripcontentwrapper">
                    <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6 col6 left-content">
                        <img data-src="{{ public_asset('website/landing/img/trekker.jpg') }}" class="img-fluid lazy">
                    </div>

                    <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6 col6 right-content">
                        <h3>Why Everest Base Camp Trek, May 2019?</h3>
                        <p>Although there are lots of fixed Everest Base camp trekking departures every year, we have chosen
                            the best month for our Crew to promote Visit Nepal 2020 with the Slogan “WE ARE IN NEPAL 2019”.
                            The best opportunity yet to wanderlust into a thrilling experience of lifetime. Don’t forget,
                            this Everesr Base Camp deal is the best you could come across only totalling amount $2,477 that
                            includes all your accommodation and food during your 14 exciting Days program with Return
                            International Flight Ticket from Australia wide. wooohhh </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="bookinfo-block container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 bookinfotop">
                    <h3>How to book this trip?</h3>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 bookinfocontent">
                    <p>Go through our Itinerary details and once you are ready to experience the most thrilling adventure
                        available on this planet, Just click Book Now, fill up few details on our next page and we will get
                        back to you. At the mean time start feeling comfy on ur hiking boots to conquer this beastly beauty.
                    </p>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 butn view_btn">
                    <button id="viewitinerary" class="btn btn-primary">View Full Itinerary</button>
                </div>
            </div>
        </div>
    </section>

    <section class="detail-block container-fluid" id="detailitinerary">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailtop">
                    <h3>Detailed Itinerary</h3>
                </div>
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-highlights-tab" data-toggle="pill" href="#pills-highlights"
                            role="tab" aria-controls="pills-highlights" aria-selected="true">Trip Highlights</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-detailwrapper-tab" data-toggle="pill" href="#pills-detailwrapper"
                            role="tab" aria-controls="pills-detailwrapper" aria-selected="true">Itinerary Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-incexc-tab" data-toggle="pill" href="#pills-incexc" role="tab"
                            aria-controls="pills-incexc" aria-selected="false">Cost Includes/Excludes</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-highlights" role="tabpanel"
                        aria-labelledby="pills-highlights-tab">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col12">
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10">
                                <h3 class="title">Trip Highlights</h3>
                                <p>Everest, Top of the world is situated at Khumbu valley of Nepal, well known vicinity
                                    amongst the trekking community and beyond for its beauty, adventurous treks and
                                    difficult terrain that attracts lots of challenger to approach and conquer this beastly
                                    beauty throughout the year. Magnificent landscapes, imposing and prestigious peaks,
                                    tampering ridges and colourful Sherpa Villages have contributed to gain a unique
                                    identity for this trekking journey. Every single step you take through the trekking will
                                    lead to unlock the mystery of Himalayas.</p>
                                <ul>
                                    <li>Explore the Legendary destination of Nepal-Kathmandu</li>
                                    <li>Enjoy the Breathtaking landscape of Himalaya through the Flight from Kathmandu to
                                        Lukla and touched down to world’s unique Airport.</li>
                                    <li>Trek through Enchanting Sherpa high country and unspoilt Buddhist monasteries to
                                        Everest Base Camp and Amazing Khumbu Glacier</li>
                                    <li>Acclimatise safety on a well-paced trek</li>
                                    <li>4-8 hours treks in a day and Relax each evening in Tea house of Mountains watching
                                        the stars closer</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--highlights-->
                    <div class="tab-pane fade" id="pills-detailwrapper" role="tabpanel"
                        aria-labelledby="pills-detailwrapper-tab">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">
                            <h3 class="title">Itinerary Overview</h3>
                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">1</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 dayonecontent">
                                <div class="date-tag">
                                    <i>2019/05/11</i>
                                </div>
                                <h3>Day 1: Arrive Kathmandu (1300m)</h3>
                                <p>The Doko Tours representative welcome guest at Tribhuvan International Airport, Kathmandu
                                    with the company logo displayed on the handheld signage board outside the airport
                                    terminal. Airport transfer is complementary that has to be pre-arranged during your trip
                                    booking process with your flight details. You will then be transferred to your
                                    respective hotel on our private vehicle.</p>
                                <p><i><span>Note : </span>Pre-trip meeting will be held at our office or at your hotel on
                                        the same day. In this meeting, you are requested to bring your passport, 3 passport-
                                        sized photographs and a readable copy of your travel insurance, transcript in
                                        English language. Also, most importantly, you must sign a legally binding trip form,
                                        and a non–liability disclaimer. In this meeting, you are also requested to ask any
                                        questions regarding your trip and other informations that are in doubts. Also, in
                                        this meeting, we discuss about different aspect of trips, information about country,
                                        culture norms and values, money matter, eating and dining.</i></p>
                                <p><span>Accommodation : </span>Hotel Holy Himalaya (1 Night)</p>
                                <p><span>Meals Included :</span>Lunch and Dinner (Lunch timing is depending on ETA in
                                    Kathmandu Airport)</p>
                            </div>
                        </div>
                        <!--detailwrapper-->

                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">

                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">2</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 daytwocontent">

                                <div class="date-tag">
                                    <i>2019/05/12</i>
                                </div>
                                <h3>Day 2: Fly toLukla (2840m) Trek to Phakding(2610m)</h3>
                                <p>A very early morning we will be transfer from Hotel to Airport. Flight from Kathmandu to
                                    Lukla will depart at early morning (Approx. 6.30 Am) in small 15- 18-seater aircraft. It
                                    is a short 30-minute scenic flight from Kathmandu. We will be able to experience view of
                                    snow-capped mountainand hilly landscape on our flight.</p>
                                <p>Once we arrive at Lukla airport, we head towards tea lodge to meet our Trekking Support
                                    team. Breakfast/ Lunch will be served based on our Arrival time in Lukla. Our Very first
                                    day ofEverest Base camp Trek starts from here. Gear up and follow the trail via Pine and
                                    Cedar Wood forest along with Milk-White DudhKosi River. Arriving upon CHAURIKHARKA, our
                                    First village of trek we make a slight descent towards the beautiful village of GHAT
                                    (2,530m).</p>
                                <p>Walking throughSuspension Bridge over DudhKosi River will be certainly a Unique
                                    Experience for us. Arrival in Phakding. We spent our Night here in Phakding. A good rule
                                    of thumb on the trek is- EARLY TO BED AND EARLY TO RISE.</p>

                                <div class="tablewrapper table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Accommodation</th>
                                                <th colspan="2">Meals Included </th>
                                                <th>Altitude Gained</th>
                                                <th>Total Distance to walk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tea House Lodge Phakding</td>
                                                <td class="list">
                                                    <ul>
                                                        <li>B</li>
                                                        <li>L</li>
                                                        <li>D</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Lukla</li>
                                                        <li>Lukla/Phakding</li>
                                                        <li>Phakding</li>
                                                    </ul>
                                                </td>
                                                <td>1310m</td>
                                                <td>3.5 hrs</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="4" class="tablenote">
                                                    <p>Speical Note</p>
                                                    <p>Breakfast and Lunch timing will be decided by Group leader depending
                                                        on ETA at Lukla All the meals in Trek will be Vegetarian. It’s very
                                                        hygienic to have Nepal Veggie Dal Bhat in High Altitude rather than
                                                        frozen meats.</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--detailwrapper-->

                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">

                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">3</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 daytwocontent">

                                <div class="date-tag">
                                    <i>2019/05/13</i>
                                </div>
                                <h3>Day 3: Trek from Phakding to Namche (3400m)</h3>
                                <p>Early Morning Breakfast will be served at Tea House. Remember, we need to spend more time
                                    in trekking rather than dining table. Hence, we start our trip very early this morning
                                    so we can make our journey more comfortable. Trail along with the bank of Dudhkosi
                                    River, we need to cross 5 Suspension Bridges, the last one being the highest of all. The
                                    first village of the Day will be TOK TOK (2,760m) from where we can have excellent view
                                    of Thamserku PEAK (6,608m). Ascend towards the Trail, we reach MONJO village (2,835m)
                                    which is an Entrance point to SAGARMATHA NATIONAL PARK. Lunch is served in Monjo and at
                                    the mean time our Trekking support team will arrange all necessary Permits and sign in
                                    procedure. After crossing the Check point, our trail will get little tougher with steep
                                    ascent to NAMCHE via JORSALE (2,740m) and LARJADOBHAN (2,830m). Crossing over fifth
                                    hanging bridge, we climb up the view point where we get the first glimpse of Mt Everest
                                    along with Mt Nupste, Lhotse and Taweche. The Biggest Sherpa Village on top of the
                                    World, NamcheBazzar is reached. This is the last time where we can check our Equipment
                                    and do some shopping or bank works. So double check your preparation is ready for High
                                    Altitude Trekking. Overnight in Namche.</p>

                                <div class="tablewrapper table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Accommodation</th>
                                                <th colspan="2">Meals Included </th>
                                                <th>Altitude Gained</th>
                                                <th>Total Distance to walk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tea House Lodge Phakding</td>
                                                <td class="list">
                                                    <ul>
                                                        <li>B</li>
                                                        <li>L</li>
                                                        <li>D</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Phakding</li>
                                                        <li>Jorsalle</li>
                                                        <li>Namche</li>
                                                    </ul>
                                                </td>
                                                <td>830m</td>
                                                <td>6 hrs</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="4" class="tablenote">
                                                    <p>Speical Note</p>
                                                    <p>Namche is first and last market place in Everest Region. Check and
                                                        confirm all the necessary things prior leaving the place.</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--detailwrapper-->
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">

                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">4</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 daytwocontent">

                                <div class="date-tag">
                                    <i>2019/05/14</i>
                                </div>
                                <h3>Day 4: Acclimatization Day, Hike up to Khumjung</h3>
                                <p>Today will be our preparation day for Higher Altitude Trekking. Our body need to
                                    acclimatize properly to the altitude; hence we hike around Namche and return back to tea
                                    house which is a good practice for further days. After Breakfast, we hike to Hillary
                                    Memorial View point where we can find the Statue of Tenzing Norgay Sherpa, First Person
                                    to Reach Everest along with Sir Edmund Hillary. Soon after will hike towards Everest
                                    View Hotel (3,880m) where we can have Spectacular View of Mt Everest. We make our Trip
                                    around more important places and return back to Tea House. Overnight in Namche.</p>

                                <div class="tablewrapper table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Accommodation</th>
                                                <th colspan="2">Meals Included </th>
                                                <th>Altitude Gained</th>
                                                <th>Total Distance to walk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tea House Lodge Phakding</td>
                                                <td class="list">
                                                    <ul>
                                                        <li>B</li>
                                                        <li>L</li>
                                                        <li>D</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Namche</li>
                                                        <li>Khumjung</li>
                                                        <li>Namche</li>
                                                    </ul>
                                                </td>
                                                <td>440m</td>
                                                <td>4 hrs</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="4" class="tablenote">
                                                    <p>Attraction Point:</p>
                                                    <p>Yeti Skull</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--detailwrapper-->
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">

                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">5</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 daytwocontent">

                                <div class="date-tag">
                                    <i>2019/05/15</i>
                                </div>
                                <h3>Day 5: Trek from Namche to PhortseGaun (3810m)</h3>
                                <p>We start our Trek from Namche for about 7hrs covering 9 km to reach PhortseGaun.
                                    Ascending through less populated trail to MONGDADA followed by a steep descent, we cross
                                    the Rhododendron (National flower of Nepal) forest and small bridge crossing DudhKosi
                                    River where we might encounter with Musk deer and Wild Colourful Peacocks.</p>
                                <p>Phortse is one of the small village framing the stunning Khumbu Valley. From here we get
                                    our first view of Cho Oyu, one of mighty peak acc accompanied by Taboche (6,367m) and
                                    Cholatse (6,335m) . The village itself is watched over by the magnificent AmaDablam.</p>

                                <div class="tablewrapper table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Accommodation</th>
                                                <th colspan="2">Meals Included </th>
                                                <th>Altitude Gained</th>
                                                <th>Total Distance to walk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tea House Lodge PhortseGaun</td>
                                                <td class="list">
                                                    <ul>
                                                        <li>B</li>
                                                        <li>L</li>
                                                        <li>D</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Namche</li>
                                                        <li>Mongdada</li>
                                                        <li>PhortseGaun</li>
                                                    </ul>
                                                </td>
                                                <td>370m</td>
                                                <td>7 hrs</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="4" class="tablenote">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--detailwrapper-->
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">

                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">6</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 daytwocontent">

                                <div class="date-tag">
                                    <i>2019/05/16</i>
                                </div>
                                <h3>Day 6: Trek from PhortseGaun to Dingboche (4400m)</h3>
                                <p>The day commences with a steep descent through meadows and a pine forest towards a small
                                    bridge over the ImjaKhola (river), and then a steady climb to Dingboche with spectacular
                                    views of AmaDablam. En route we pass through Pangboche the home of the most ancient
                                    monastery in the region and the Gompa which houses the famous Yeti scalp.</p>

                                <div class="tablewrapper table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Accommodation</th>
                                                <th colspan="2">Meals Included </th>
                                                <th>Altitude Gained</th>
                                                <th>Total Distance to walk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tea House Lodge Dingboche</td>
                                                <td class="list">
                                                    <ul>
                                                        <li>B</li>
                                                        <li>L</li>
                                                        <li>D</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>PhortseGaun</li>
                                                        <li>Pang Boche</li>
                                                        <li>Dingboche</li>
                                                    </ul>
                                                </td>
                                                <td>590m</td>
                                                <td>8 hrs</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="4" class="tablenote">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--detailwrapper-->
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">

                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">7</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 daytwocontent">

                                <div class="date-tag">
                                    <i>2019/05/17</i>
                                </div>
                                <h3>Day 7: Acclimatization in Dingboche, Hike up to Nagajun Hill (5125m)</h3>
                                <p>Another Acclimatization Day in Dinghboche.</p>
                                <p>After breakfast we starts climbing up Nagarzhang peak. We trek all the way up to the flag
                                    pole (5,083m) on the peak to have spectacular views of Island Peak (6,189m), AmaDablam
                                    (6,856m),Taboche (6,367m), Cholatse (6,335m) and Loboche (6,119m). Return to teahouse
                                    for lunch. Overnight at Dingboche.</p>

                                <div class="tablewrapper table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Accommodation</th>
                                                <th colspan="2">Meals Included </th>
                                                <th>Altitude Gained</th>
                                                <th>Total Distance to walk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tea House Lodge Dingboche</td>
                                                <td class="list">
                                                    <ul>
                                                        <li>B</li>
                                                        <li>L</li>
                                                        <li>D</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Dingboche</li>
                                                        <li>Dingboche</li>
                                                        <li>Dingboche</li>
                                                    </ul>
                                                </td>
                                                <td>683m</td>
                                                <td>3 hrs</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="4" class="tablenote">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--detailwrapper-->
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">

                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">8</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 daytwocontent">

                                <div class="date-tag">
                                    <i>2019/05/18</i>
                                </div>
                                <h3>Day 8: Trek from Dingboche to Lobuche (4910m)</h3>
                                <p>We will have spectacular views of Taboche (6,367m) and Cholatse (6,335m) as we trek
                                    towards Lobuche (4,910m). Locals say that this trail is the habitat of snow leopards and
                                    the renowned Yeti. The trail is mostly flat till the first village of the trek,
                                    Gongla(4,620m) where we take a break and have some tea or early lunch. After Gongla, the
                                    trail climbs up the rough terminal moraine of Khumbu Glacier.</p>
                                <p>This area has rows of stone monuments built in memory of Sherpas who died in an avalanche
                                    during the 1970 Japanese expedition on Mt. Everest including BabuChiri Sherpa, a 10-time
                                    Everest summiteer and Scott Fischer who died in 1996 Everest disaster. While crossing
                                    the ridge from here, we will have great views of Mt. Pumori (7,165m). Continue to climb
                                    up to the north over rough moraine to arrive at Lobuche (4,910m), a summer village with
                                    several hotels. Overnight at Lobuche</p>

                                <div class="tablewrapper table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Accommodation</th>
                                                <th colspan="2">Meals Included </th>
                                                <th>Altitude Gained</th>
                                                <th>Total Distance to walk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tea House Lodge Lobuche</td>
                                                <td class="list">
                                                    <ul>
                                                        <li>B</li>
                                                        <li>L</li>
                                                        <li>D</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Dingboche</li>
                                                        <li>Jongla</li>
                                                        <li>Lobuche</li>
                                                    </ul>
                                                </td>
                                                <td>510m</td>
                                                <td>6 hrs</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="4" class="tablenote">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--detailwrapper-->
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">

                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">9</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 daytwocontent">

                                <div class="date-tag">
                                    <i>2019/05/19</i>
                                </div>
                                <h3>Day 9: Trek from Lobuche to Gorakshep (5080m) via Everest Base Camp (5364m)</h3>
                                <p>The big Day for Us, the day we make a contact at The Everest Base Camp. Early Morning
                                    Breakfast is served and we start our Hike towards to Gorakshep. The Majestic Mountains
                                    will be following us all the way till we reach the destination. The trek does not have
                                    any steep climbing though it will be difficult and tiring due to high elevation. We will
                                    be walking in between 4,900 meters to 5,300 meters on this day. The trail is quite wide
                                    and easy to walk. It is a short hike to reach Gorakshep. Once we reach Gorakshep we will
                                    keep our belongings in the lodge before we have our lunch. After the lunch we will start
                                    hiking for the Everest Base Camp. The route from Gorakshep to Everest Base Camp includes
                                    numerous short ups and downs. The trail condition is not satisfactory everywhere and it
                                    includes many small rocks along the route. We need to be careful of the slippery rocks.
                                </p>
                                <p>On a lucky day we might enjoy some of the avalanches on another side of Khumbu glacier;
                                    one of the biggest glaciers in the world. Once we reach Everest Base Camp we take some
                                    pictures. We will give our self some time to enjoy this moment getting at the base camp
                                    of the tallest mountain on Earth. After finishing our activities around the base camp,
                                    we will return back to Gorakshep through same trail and prepare for another day.</p>

                                <div class="tablewrapper table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Accommodation</th>
                                                <th colspan="2">Meals Included </th>
                                                <th>Altitude Gained</th>
                                                <th>Total Distance to walk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tea House Lodge Gorakshep</td>
                                                <td class="list">
                                                    <ul>
                                                        <li>B</li>
                                                        <li>L</li>
                                                        <li>D</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Lobuche</li>
                                                        <li>Pack Lunch in EBC</li>
                                                        <li>Gorakshep</li>
                                                    </ul>
                                                </td>
                                                <td>454m</td>
                                                <td>6 hrs</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="4" class="tablenote">
                                                    <p>Attraction Point</p>
                                                    <p>Everest Base Camp</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--detailwrapper-->
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">

                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">10</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 daytwocontent">

                                <div class="date-tag">
                                    <i>2019/05/20</i>
                                </div>
                                <h3>Day 10: Early Morning Kalapatthar Hike (5540m), Trek to Pheriche (4280m)</h3>
                                <p>Kala Patthar is a small peak at an altitude of 5,550m. Most trekkers climb up Kala
                                    Patthar to catch the sunrise and the best views of Mt. Everest. We can see Mt. Everest
                                    from several places on the trail, but the best views of Mt. Everest is visible only from
                                    Kala Patthar. Start the trek at 5am. Eat a snack, layer yourself well and carry a head
                                    lamp. The ascent up the peak is demanding, especially as it can be very cold (-20c or
                                    lower), windy and sometimes snowy. Reaching at the top, prepare yourself for a reward
                                    with the magnificent views of Mt. Everest (8,848m). Himalayan giants such as Nuptse
                                    (7,861m), Pumori (7,165m), Chagatse, Lhotse (8,414m) and countless others loom all
                                    around us. Then it’s all downhill trek from here. We descend back to Gorakshep and will
                                    have breakfast in Tea house. We check out the Lodge on the same day.</p>
                                <p>Today we might experience a tough walking day approx 8hrs walk descending from 5,140m to
                                    4280m. Overnight in Pheriche.</p>

                                <div class="tablewrapper table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Accommodation</th>
                                                <th colspan="2">Meals Included </th>
                                                <th>Altitude Gained</th>
                                                <th>Total Distance to walk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tea House Lodge Pheriche</td>
                                                <td class="list">
                                                    <ul>
                                                        <li>B</li>
                                                        <li>L</li>
                                                        <li>D</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Gorakshep</li>
                                                        <li>Jongla</li>
                                                        <li>Pheriche</li>
                                                    </ul>
                                                </td>
                                                <td>-800m</td>
                                                <td>8 hrs</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="4" class="tablenote">
                                                    <p>Attraction Point</p>
                                                    <p>Everest view point Kalapathhar</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--detailwrapper-->
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">

                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">11</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 daytwocontent">

                                <div class="date-tag">
                                    <i>2019/05/21</i>
                                </div>
                                <h3>Day 11: Trek from Pheriche to Namche (3400m)</h3>
                                <p>Today we trek along the ImjaKholariver towards Tengboche (3,930m). We make a stop at
                                    Tengboche (3,860m) to visit the biggest monastery of Khumbu region. According to Legend,
                                    TENGBOCHE monastery was founded by Lama SangeDorjee who came from Tibet’s Rongphu
                                    Monastery. Here we can have conversations with the monks and light a butter lamp. We
                                    then slowly descend for about 2 hours towards PhunkeTenga and again climb up ascending
                                    slowly to arrive at Khyangjuma (3,550m). We take a short break in Khyangjuma and trek
                                    uphill for 2 more hours to arrive at Namche (3,440m). Overnight in Namche.</p>

                                <div class="tablewrapper table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Accommodation</th>
                                                <th colspan="2">Meals Included </th>
                                                <th>Altitude Gained</th>
                                                <th>Total Distance to walk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tea House Lodge Namche</td>
                                                <td class="list">
                                                    <ul>
                                                        <li>B</li>
                                                        <li>L</li>
                                                        <li>D</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Pheriche</li>
                                                        <li>PhunkiTenga</li>
                                                        <li>Namche</li>
                                                    </ul>
                                                </td>
                                                <td>-880m</td>
                                                <td>9 hrs</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="4" class="tablenote">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--detailwrapper-->
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">

                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">12</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 daytwocontent">

                                <div class="date-tag">
                                    <i>2019/05/22</i>
                                </div>
                                <h3>Day 12: Trek from Namche to Lukla (2840m)</h3>
                                <p>Most of the walk today will be on the trail going steep downwards. We will cross the
                                    suspension bridges decorated with prayer flags above the gushing DudhKosiRiver. The
                                    views of open plains, pine and rhododendron forests as well as snow covered peaks will
                                    enchant you once again. Overnight in Lukla.</p>

                                <div class="tablewrapper table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Accommodation</th>
                                                <th colspan="2">Meals Included </th>
                                                <th>Altitude Gained</th>
                                                <th>Total Distance to walk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tea House Lodge Lukla</td>
                                                <td class="list">
                                                    <ul>
                                                        <li>B</li>
                                                        <li>L</li>
                                                        <li>D</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>

                                                        <li>Namche</li>
                                                        <li>Phakding</li>
                                                        <li>Lukla</li>
                                                    </ul>
                                                </td>
                                                <td>-560m</td>
                                                <td>9 hrs</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="4" class="tablenote">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--detailwrapper-->
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">

                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">13</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 daytwocontent">

                                <div class="date-tag">
                                    <i>2019/05/23</i>
                                </div>
                                <h3>Day 13: Fly Back to Kathmandu</h3>
                                <p>Today we fly back to Kathmandu from Lukla. Depending on Weather, we take early flight to
                                    Kathmandu. Returning back to hotel, we will have a leisure day for personal activities.
                                    You can go shopping and walk around Thamel and Kathmandu durbar square. If you need a
                                    help, then you can call up our guide to join otherwise our guide will meet you in
                                    farewell dinner.</p>

                                <div class="tablewrapper table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Accommodation</th>
                                                <th colspan="2">Meals Included </th>
                                                <th>Altitude Gained</th>
                                                <th>Total Distance to walk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Hotel Holy Himalaya</td>
                                                <td class="list">
                                                    <ul>
                                                        <li>B</li>
                                                        <li>L</li>
                                                        <li>D</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>

                                                        <li>Lukla</li>
                                                        <li>N/A</li>
                                                        <li>Kathmandu</li>
                                                    </ul>
                                                </td>
                                                <td>-1540m</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="4" class="tablenote">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--detailwrapper-->
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">

                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">14</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 daytwocontent">

                                <div class="date-tag">
                                    <i>2019/05/24</i>
                                </div>
                                <h3>Day 14: Full day Sightseeing, Kathmandu Valley</h3>
                                <p>The Day starts with the refreshing Morning Breakfast, then a visit to Pashupatinath
                                    Temple (A Sacred Temple of Hindu Religion). We Spend an hour or two exploring the temple
                                    vicinity then will be transferred to Bauddhanath Stupa. The 36-meter-high stupa in
                                    Boudhanath is one of the largest stupas in South Asia surrounded by countless
                                    monasteries; the pilgrimage has an important significance influencing Tibetan Buddhism
                                    practice in Nepal.</p>
                                <p>You will then go for a lunch with your Guide at Tibetan Style Restaurant overlooking the
                                    Stupa. Inspire yourself visiting Shywambhunath Temple (The Monkey Temple), the oldest
                                    Buddhist religious heritage of Nepal. The major attractions in the area are huge Buddha
                                    statue on the west side of the stupa and the huge gold-plated Vajra ‘Thunderbolt’ on
                                    other side also statues of Sleeping Buddha and Dewa Dharma Monastery (noted for a bronze
                                    icon of Buddha) and traditional Tibetan paintings. Then you make your way to Kathmandu
                                    Durbar Square in the heart of Kathmandu Valley. The major attraction of Kathmandu Durbar
                                    Square is the Kumari house where the living goddess kumari an incarnation of the demon
                                    slaying Hindu Goddess Durga resides.</p>
                                <p>End of Sightseeing at evening time and a free time for you to explore Kathmandu. Enjoy.
                                </p>

                                <div class="tablewrapper table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Accommodation</th>
                                                <th colspan="2">Meals Included </th>
                                                <th>Altitude Gained</th>
                                                <th>Total Distance to walk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Hotel Holy Himalaya</td>
                                                <td class="list">
                                                    <ul>
                                                        <li>B</li>
                                                        <li>L</li>
                                                        <li>D</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>

                                                        <li>Breakfast</li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                </td>
                                                <td>-1540m</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="4" class="tablenote">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--detailwrapper-->
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 detailwrapper">

                            <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col2">
                                <div class="day">15</div>
                            </div>
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10 daytwocontent">

                                <div class="date-tag">
                                    <i>2019/05/25</i>
                                </div>
                                <h3>Day 15: Trip End @ 12 PM</h3>
                                <p>Fly Back to Sydney 1730hrs</p>
                            </div>
                        </div>
                        <!--detailwrapper-->
                    </div>
                    <!--detailwrapper-->
                    <div class="tab-pane fade" id="pills-incexc" role="tabpanel" aria-labelledby="pills-incexc-tab">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col12">
                            <div class="col-md-10 col-sm-12 col-lg-10 col-xl-10 col10">
                                <h3 class="title">Cost Includes & Excludes</h3>
                                <h3>Trip Cost</h3>
                                <span>$ 2,477</span>
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 includes nopadding">
                                    <h3>Includes</h3>
                                    <ul>
                                        <li>International Air Ticket ( SYD-KTM-SYD)</li>
                                        <li>Airport pickups and drops in a private vehicle</li>
                                        <li>3-star hotel accommodation in Kathmandu in EP</li>
                                        <li>Welcome and Farewell Dinner</li>
                                        <li>Teahouse accommodation during the trek</li>
                                        <li>All 3 Veg Meal during trek</li>
                                        <li>All ground transportation on a comfortable private vehicle as per the itinerary
                                        </li>
                                        <li>Domestic flights (Kathmandu- Lukla -Kathmandu)</li>
                                        <li>An experienced, English-speaking and government-licensed trek leader and
                                            assistant trek leader for each 4 trekkers</li>
                                        <li>Porter service</li>
                                        <li>Tour Guide, entry fees during Sight seen of Kathmandu</li>
                                        <li>Staff costs including their salary, insurance, equipment, food and accommodation
                                        </li>
                                        <li>Doko Tours logo’s trekking bag/duffel bag, t-shirt and trekking map are yours to
                                            take</li>
                                        <li>All necessary paperwork and trekking permits (TIMS)</li>
                                        <li>First aid medical kit, Oximeter to check pulse, heart rate and oxygen saturation
                                            at higher altitude.</li>
                                        <li>All government and local taxes</li>
                                    </ul>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 excludes nopadding">
                                    <h3>Excludes</h3>
                                    <ul>
                                        <li>Nepalese visa fee</li>
                                        <li>Excess baggage charge(s)</li>
                                        <li>Extra night accommodation in Kathmandu because of early arrival, late departure,
                                            early return from trek than the scheduled itinerary</li>
                                        <li>Only specified meals as according to your itinerary are inclusive</li>
                                        <li>Travel and rescue insurance</li>
                                        <li>Beverage</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--incexc-->
                </div>
                <!--tabcontent-->


            </div>
        </div>
    </section>

    <section class="container-fluid whytan">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 text-center">
                <h2>Why TAN for this trip</h2>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 wrap nopadding">
                <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col3 text-center">
                    <img src="{{ public_asset('website/landing/img/itinerary.png') }}">
                    <p>Every-day Life Experience Itinerary</p>
                </div>
                <!-- <div class="col-md-3 col-sm-12 col-lg-3 col-xl-3 col3 text-center">
                            <img src="{{ public_asset('website/landing/img/tailormade.png') }}">
                            <p>Tailor Made Trip</p>
                        </div>
                        <div class="col-md-3 col-sm-12 col-lg-3 col-xl-3 col3 text-center">
                            <img src="{{ public_asset('website/landing/img/selfguide.png') }}">
                            <p>Self-Guided Trip</p>
                        </div> -->
                <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col3 text-center">
                    <img src="{{ public_asset('website/landing/img/smallgroup.png') }}">
                    <p>Small Group</p>
                </div>
                <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col3 text-center">
                    <img src="{{ public_asset('website/landing/img/safety.png') }}">
                    <p>Your Safety is our priority</p>
                </div>
                <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col3 text-center">
                    <img src="{{ public_asset('website/landing/img/adventure.png') }}">
                    <p>Adventure for Everyone</p>
                </div>
                <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col3 text-center">
                    <img src="{{ public_asset('website/landing/img/tourism.png') }}">
                    <p>Nepal Tourism Promotion</p>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col12 nopadding">
                <ul>
                    <li>
                        <img data-src="{{ public_asset('website/landing/img/visitnepal.png') }}" class="lazy">
                        <p>Proudly Endorsing</p>
                    </li>
                    <li>
                        <img data-src="{{ public_asset('website/landing/img/airline.png') }}" class="lazy">
                        <p>Airlines Partner</p>
                    </li>
                </ul>
            </div>
        </div>

    </section>
@stop
