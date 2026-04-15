
<ul class="account-nav">
  <table>
   <tr>
     <td><a href="{{route('user.index')}}" class="menu-link menu-link_us-s">Dashboard</a></td>
   </tr>
   <tr>
     <td><a href="{{route('user.arpProduct')}}" class="menu-link menu-link_us-s">Apartment</a></td>
   </tr>
   <tr>
     <td><a href="{{route('user.bldProduct')}}" class="menu-link menu-link_us-s">Building</a></td>
   </tr>
   <tr>
     <td><a href="{{route('user.vlProduct')}}" class="menu-link menu-link_us-s">Villa</a></td>
   </tr>
   <tr>
     <td><a href="{{route('user.grProduct')}}" class="menu-link menu-link_us-s">Garage</a></td>
   </tr>
   <tr>
     <td><a href="{{route('user.hmProduct')}}" class="menu-link menu-link_us-s">Home</a></td>
   </tr>
   <tr>
     <td><a href="{{route('user.offProduct')}}" class="menu-link menu-link_us-s">Office</a></td>
   </tr>
   <tr>
     <td><a href="{{route('user.shProduct')}}" class="menu-link menu-link_us-s">Shop</a></td>
   </tr>
   <tr>
     <td><a href="{{route('user.twnProduct')}}" class="menu-link menu-link_us-s">Town house</a></td>
   </tr>
   <tr>
     <td><a href="{{route('user.agentforms')}}" class="menu-link menu-link_us-s">Agents</a></td>
   </tr>

   <tr>

     <td><a href="account-orders.html" class="menu-link menu-link_us-s">Orders</a></td>
  </tr>
  <tr>
    <td><a href="account-address.html" class="menu-link menu-link_us-s">Addresses</a></td>
  </tr>
  <tr>
    <td><a href="account-details.html" class="menu-link menu-link_us-s">Account Details</a></td>
  </tr>
  <tr>
    <td><a href="account-wishlist.html" class="menu-link menu-link_us-s">Wishlist</a></td>
  </tr>
  <tr>
    <td>
      <form method="POST" action="{{route('logout')}}" id="logout-form">
        @csrf

        <a href="{{route('logout')}}" class="menu-link menu-link_us-s" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
      </form>

    </td>
  </tr>
   </table>
