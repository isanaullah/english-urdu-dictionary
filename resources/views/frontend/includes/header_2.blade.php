    </div>
</header>

<div class="stic"></div>
<div id="secondaryNavContainerID" class="secondaryNavContainer responsive_hide_on_smartphone">
    <div class="secondaryNavContainerBis">
    <div class="responsive_container">
        <nav class="secondaryNav">
            <ul class="secondaryNavMenu">

							  <li><a @php $rdb->get_page(route('learn.english')); @endphp href="{{ route('learn.english') }}">English Dictionary</a></li>
                              <li><a @php $rdb->get_page(route('urdu')); @endphp href="{{ route('urdu') }}">Urdu Dictionary</a></li>
								<li><a  @php $rdb->get_page(route('roman')); @endphp href="{{ route('roman') }}">Roman Dictionary</a> </li>
                              <li>
                               </li>
								 <li><a href="{{ route('home') }}" data-menu="#menuBlog">Explore<i class="icon-down"></i></a>
                                </li>

                                 </ul>

