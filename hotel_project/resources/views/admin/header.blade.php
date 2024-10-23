<nav class="navbar navbar-expand-lg">
    <div class="search-panel">
      <div class="search-inner d-flex align-items-center justify-content-center">
        <div class="close-btn">Close <i class="fa fa-close"></i></div>
        <form id="searchForm" action="#">
          <div class="form-group">
            <input type="search" name="search" placeholder="What are you searching for...">
            <button type="submit" class="submit">Search</button>
          </div>
        </form>
      </div>
    </div>
    <div class="container-fluid d-flex align-items-center justify-content-between">
      <div class="navbar-header">
        <!-- Navbar Header--><a href="index.html" class="navbar-brand">
          <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dark</strong><strong>Admin</strong></div>
          <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
        <!-- Sidebar Toggle Btn-->
        <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
      </div>
      <div class="right-menu list-inline no-margin-bottom">    
        <div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div>
        <div class="list-inline-item dropdown"><a id="navbarDropdownMenuLink1" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link messages-toggle"><i class="icon-email"></i><span id="message-badge" class="badge dashbg-1" style="display: none;">0</span></a>
          <div aria-labelledby="navbarDropdownMenuLink1" class="dropdown-menu messages">
            @php
              $data = App\Models\Contact::latest()->take(5)->get();
            @endphp
            <ul>
              @foreach($data as $contact)
              <a onclick="markMessageAsRead({{ $contact->id }})"  href="{{url('send_mail',$contact->id)}}" class="dropdown-item message d-flex align-items-center message-{{ $contact->id }} {{ $contact->is_read ? '' : 'unread-message' }}">
                <div class="profile">
                    <img src="admin/img/usser.png" alt="..." class="img-fluid">
                </div>
                <div class="content">
                    <strong class="d-block">{{$contact->name}}</strong>
                    <span class="d-block">{{ Str::limit($contact->message,50)}}</span>
                    <small class="date d-block">{{ $contact->created_at->diffForHumans() }}</small>
                </div>
            </a>
              @endforeach
          </ul>
            
            
            <a href="{{ url('messages') }}" class="dropdown-item message d-flex align-items-center">
                <div class="content">
                    <strong>See All Messages <i class="fa fa-angle-right"></i></strong>
                </div>
            </a>
        </div>
        
        </div>
        <!-- Tasks-->
        
        <!-- Tasks end-->
        <!-- Megamenu-->
        
        <!-- Megamenu end     -->
        <!-- Languages dropdown    -->
        
        <!-- Log out               -->
        <div class="list-inline-item logout">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-button">Logout<i class="fa-solid fa-arrow-right-from-bracket"></i></button>
    </form>
</div>

    </div>
  </nav>





