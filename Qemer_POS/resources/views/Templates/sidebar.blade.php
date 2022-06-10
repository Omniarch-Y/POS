 {{-- start of sidebar --}}
 <div class="sidebar">
    <div class="logo_content">
        <div class="logo">
            <i class="bi bi-lightning-charge-fill" aria-hidden="true"></i>
            <div class="logo_name">Qemer pos</div>
        </div>
        <i class="bi bi-list fs-1" aria-hidden="true" id="btn_toggler"></i>
    </div>
    <ul class="nav_list">

        <li>
            <a href="{{route('home')}}">
                <i class="bi bi-house-fill fs-5" aria-hidden="true"></i>
                <span class="links_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>

        <li>
            <a href="" data-bs-toggle="modal" data-bs-target="#userModal">
                <i class="bi bi-person-fill fs-5" aria-hidden="true"></i>
                <span class="links_name">User</span>
            </a>
            <span class="tooltip">User</span>
        </li>
        @extends('Templates.Modals.userProfile')

        @if (auth()->user()->role=='casher')
            <li>
                <a href="" data-bs-toggle="modal" data-bs-target="#cartDisplay" >
                    <i class="bi bi-cart-fill fs-5" aria-hidden="true" ></i>
                    <span class="links_name">Cart</span>
                </a>
                <span class="tooltip">Cart</span>
            </li>
        @endif

        @if (auth()->user()->role=='admin')
    
            <li>
                <a href="/dailyReport">
                    <i class="bi bi-file-earmark-text-fill fs-5" aria-hidden="true" ></i>
                    <span class="links_name">Daily Report</span>
                </a>
                <span class="tooltip">Daily Report</span>
            </li>

            <li>
                <a href="/receiptList">
                    <i   class="bi bi-receipt fs-5" aria-hidden="true" ></i>
                    <span class="links_name">Receipt list</span>
                </a>
                <span class="tooltip">Receipt list</span>
            </li>

            <li>
                <a href="/viewUsers">
                    <i class="bi bi-people-fill fs-5" aria-hidden="true" ></i>
                    <span class="links_name">Users</span>
                </a>
                <span class="tooltip">Users</span>
            </li>

            <li>
                <a href="/newBranch">
                    <i class="bi bi-arrow-down fs-5" aria-hidden="true" ></i>
                    <span class="links_name">Add branch</span>
                </a>
                <span class="tooltip">Add branch</span>
            </li>
            <li>
                <a href="" data-bs-toggle="modal" data-bs-target="#changeBranch">
                    <i class="bi bi-diagram-3-fill fs-5" aria-hidden="true"></i>
                    <span class="links_name">Change branch</span>
                </a>
                <span class="tooltip">Change branch</span>
            </li>
            @extends('Templates.Modals.changeBranch')
        @endif
    </ul>

    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">
                <img src="{{ asset('storage/userImages/'.auth()->user()->avatar) }}" alt="">
                <div class="name_job">
                    <div class="name">{{auth()->user()->name}}</div>
                    <div class="job">being cool</div>
                </div>
            </div>
            <form action="{{route('logout')}}" method="post">
              @csrf
            <button><i class="bi bi-box-arrow-right text-light fs-3" id="log_out" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
</div>
   
   {{-- end of sidebar --}} 