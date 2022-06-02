<div class="home_content" style="float:right;">

    <div class="row justify-content-evenly">
        <div class="col-md-3">
            <div class="container shadow" style=" background-color:	#fffefece; margin-top:3rem;height:110px;border-radius:20px">
                <!-- //row for Contents -->
                <div class="row">
                    <div class="col-md-3 ">
                        <div class="container-fluid   my-2 rounded-circle" style="background-color:yellow;width:70px;height:70px">
                            <!-- //icon for users -->
                            <i class=" px-0 bi bi-people fs-1 text-white text-center"></i>
                        </div>
                    </div>
                    <div class="col my-auto">
                        <div class="col-md-8">
                            <p class="text-dark my-auto  fs-5">Total users</p>
                        </div>
                        <div class="col-md-8 my-0 ">
                            <p class="text-muted fs-6">{!! $users !!}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="container shadow" style=" background-color:#fffefece;margin-top:3rem;height:110px;border-radius:20px">
                <!-- //row for Contents -->
                <div class="row">
                    <div class="col-md-3 ">
                        <div class="container-fluid   my-2 rounded-circle" style="background-color:purple;width:70px;height:70px">
                            <!-- //icon for users -->
                            <i class=" px-0 bi bi-cart fs-1 text-white text-center"></i>
                        </div>
                    </div>
                    <div class="col my-auto">
                        <div class="col-md-8">
                            <p class="text-dark my-auto  fs-5">Stock items</p>
                        </div>
                        <div class="col-md-8 my-0 ">
                            <p class="text-warning fs-6">{!! $stocks !!}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>


               <div class="col-md-3">
            <div class="container shadow" style=" background-color:#fffefece;margin-top:3rem;height:110px;border-radius:20px">
                <!-- //row for Contents -->
                <div class="row">
                    <div class="col-md-3 ">
                        <div class="container-fluid   my-2 rounded-circle" style="background-color:green;width:70px;height:70px">
                            <!-- //icon for users -->
                            <i class=" px-0 bi bi-currency-dollar fs-1 text-white text-center"></i>
                        </div>
                    </div>
                    <div class="col  "style="margin-top:10px">
                        <div class="col my-0 py-0">
                            <p class="text-dark my-auto py-auto fs-5">Sales</p>
                        </div>
                        <div class="col my-0 py-0">
                            <p class="text-warning fs-6">36870.32 Br</p>
                            <small class="text-muted">{{ now()->format('Y-m-d') }}</small>

                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

    </div>
