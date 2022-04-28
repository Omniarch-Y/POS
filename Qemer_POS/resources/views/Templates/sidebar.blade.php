 {{-- start of sidebar --}}
 <div class="sidebar">
    <div class="logo_content">
        <div class="logo">
            <i class="bi bi-lightning-charge-fill" aria-hidden="true"></i>
            <div class="logo_name">Qemer pos</div>
        </div>
        <i class="bi bi-list fs-1" aria-hidden="true" id="btn"></i>
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
            <a href="#">
                <i class="bi bi-person-fill fs-5" aria-hidden="true"></i>
                <span class="links_name">User</span>
            </a>
            <span class="tooltip">User</span>
        </li>

        <li>
            <a href="#">
                <i data-bs-toggle="modal" data-bs-target="#addCategory" class="bi bi-cart-fill fs-5" aria-hidden="true" ></i>
                <span class="links_name">Cart</span>
            </a>
            <span class="tooltip">Cart</span>
        </li>

        <li>
            <a href="/dailyReport">
                <i   class="bi bi-file-earmark-text-fill fs-5" aria-hidden="true" ></i>
                <span class="links_name">Daily Report</span>
            </a>
            <span class="tooltip">Daily Report</span>
        </li>

        <li>
            <a href="/itemForm">
                <i   class="bi bi-gear-fill fs-5" aria-hidden="true" ></i>
                <span class="links_name">Manage items</span>
            </a>
            <span class="tooltip">Manage items</span>
        </li>
        <li>
            <a href="/receiptList">
                <i   class="bi bi-receipt fs-5" aria-hidden="true" ></i>
                <span class="links_name">Receipt list</span>
            </a>
            <span class="tooltip">Receipt list</span>
        </li>

        <li>
            <a href="/collection">
                <i class="bi bi-basket2-fill fs-5" aria-hidden="true" ></i>
                <span class="links_name">Stock</span>
            </a>
            <span class="tooltip">Stock</span>
        </li>
    </ul>

    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">
                <img src="" alt="">
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
<script>

  let btn = document.querySelector('#btn');
  let sidebar = document.querySelector('.sidebar');
  let searchBtn = document.querySelector('.bi-search');

  btn.onclick = function() {
     sidebar.classList.toggle("active");
  }

  searchBtn.onclick = function() {
     sidebar.classList.toggle("active");
  }

</script>
   
   {{-- end of sidebar --}} 