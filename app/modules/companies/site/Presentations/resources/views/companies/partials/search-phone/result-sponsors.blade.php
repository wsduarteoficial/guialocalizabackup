<article class="featured">
    <div class="row sponsors-search">
        @desktop
            @include('site::companies.partials.search-phone.sponsors-desktop')  
        @elsedesktop
            @include('site::companies.partials.search-phone.sponsors-mobile')  
        @enddesktop
    </div>
</article>