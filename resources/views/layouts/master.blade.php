<!DOCTYPE html>
<html class="no-js" dir="ltr" lang="en">
<head>
   @include('layouts.head')
   @yield('style')
</head>
<body>
<div class="top-bar" id="example-menu">
         <div class="top-bar-left">
         @if(Auth::check()&& Auth::user()->role('user'))
              <ul class="menu">
                  <li>
                     <a href="" class="submenu menu vertical">
                          <h3><b>(User)&nbsp{{ Auth::user()->userName }}</b></h3>
                          <img src="/message.png" style="height: 30px;">
                          <span class="alert badge" style="font-size: 8px; color: black;">1</span>
                     </a>
                  </li>
               </ul>
         @endif

        @if(Auth::check() && Auth::user()->role('admin'))
              <ul class="menu">
                  <li>
                     <a href="" class="submenu menu vertical">
                          <h3><b>(Admin)&nbsp{{Auth::user()->userName}}</b></h3>
                          <img src="/message.png" style="height: 30px;">
                          <span class="alert badge" style="font-size: 8px; color: black;">1</span>
                     </a>
                  </li>
               </ul>
         @endif

         @if(Auth::check() && Auth::user()->role('support'))
              <ul class="menu">
                  <li>
                     <a href="" class="submenu menu vertical">
                          <h3><b>(Support)&nbsp{{Auth::user()->userName}}</b></h3>
                          <img src="/message.png" style="height: 30px;">
                          <span class="alert badge" style="font-size: 8px; color: black;">1</span>
                      </a>
                  </li>
               </ul>
         @endif

         </div>
        <div class="top-bar-left">
             <ul class="dropdown menu" data-dropdown-menu>
               <li><a href="/">Assets</a></li>
               <li><a href="/asset/location">Locations</a></li>
               <li><a href="/asset/office">Offices</a></li>
               <li><a href="/services">Service</a></li>
                  @If(Auth::check() && Auth::user()->role('user')) 
                     <li><a href="/issues">Report Issues</a></li>
                  @endif

                  @if(Auth::check() && Auth::user()->role('admin'))
                         <li>
                            <a href="/assign/users">Issues <span class="alert badge" style="font-size: 8px; color: black;">1</span></a>
                        </li>
                        
                        <li>
                            <a href="/users/all"> Users <span class="alert badge" style="font-size: 8px; color: black;">1</span></a>
                        </li>       
                  @endif
          </ul>
        </div>
        <div class="top-bar-right">
               @if (Auth::check())
               <ul class="menu">
                  <li>
                     <a href="/logout" class="alert button" style="border-radius: 5px;">logout</a>
                  </li>
               </ul>
               @endif

               @if(!Auth::check())
               <ul class="menu">
                  <li>
                     <a href="/login" class=" button submenu menu vertical" style="border-radius: 5px;">login</a>
                  </li>
               </ul>
               @endif
        </div>
      </div>
   <div class="grid-container">
      <!-- <center>
         @include('layouts.nav')
      </center> -->
      <div class="grid-x grid-padding-x" style="padding-top: 30px;">
         <div class="large-2 medium-2 cell">
            @yield('leftSide')
         </div>
         <div class="large-8 medium-8 cell">
         <div>
            @yield('content')
         </div>

         <div>
            @yield('table')
         </div>
         </div>
         <div class="large-2 medium-2 cell">
            <!-- @include('layouts.rightSide') -->
         </div>
      </div>
   </div>
  @include('layouts.footer')
</body>
</html>