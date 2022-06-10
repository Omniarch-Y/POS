<div class="home_content" style="float:right;">
<span class="fs-2 px-4 py-3 ">Current branch:
<span class="breadcrumb-item active fs-3 text-success" aria-current="page"> {{ $branch->branch_name }} </span>
</span>

    <div class="row justify-content-evenly align-items-center ">
        <div class="col-md-3">
            <div class="container shadow" style=" background-color:	#fffefece; margin-top:3rem;height:110px;border-radius:20px">
                <!-- //row for Contents -->
                <div class="row  ">
                    <div class="col-md-3 ">
                        <div class="container-fluid  px-3 py-0  my-4 rounded-circle" style="background-color:rgb(209, 84, 56);width:70px;height:70px">
                            <!-- //icon for users -->
                            <i class="  bi bi-people fs-1 text-white"></i>
                        </div>
                    </div>
                    <div class="col my-auto">
                        <div class="col-md-8">
                            <p class="text-dark my-auto  fs-5">Total users</p>
                        </div>
                        <div class="col-md-8 my-0 ">
                            <p class="text-danger fs-6">{!! $users !!}</p>
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
                        <div class="container-fluid  px-3 py-0  my-4 rounded-circle" style="background-color:purple;width:70px;height:70px">
                            <!-- //icon for users -->
                            <i class="  bi bi-cart fs-1 text-white"></i>
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
                        <div class="container-fluid  px-3 py-0  my-4 rounded-circle" style="background-color:green;width:70px;height:70px">
                            <!-- //icon for users -->
                            <i class="  bi bi-currency-dollar fs-1 text-white text-center"></i>
                        </div>
                    </div>
                    <div class="col  "style="margin-top:10px">
                        <div class="col my-0 py-0">
                            <p class="text-dark my-auto py-auto fs-5">Sales</p>
                        </div>
                        <div class="col my-0 py-0">
                            <p class="text-success fs-6">36870.32 Br</p>
                            <small class="text-muted "> Date: {{ now()->format('Y/m/d') }}</small>

                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

    </div>
