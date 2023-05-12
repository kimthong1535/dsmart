<section class="client">
    <div class="client-title">
        <h3>{{ get_field('title_main',48) }}</h3>
    </div>
    <div class="client-img">
        @php $count = 0 @endphp
        @if(have_rows('list_brand',48))
            <ul class="brand-list">
            @while(have_rows('list_brand',48))
                @php
                    the_row();
                    $count++;
                @endphp
                <li class="brand-item {!! ($count <= 18) ? "show" : "" !!}">
                    <img src="{{ get_sub_field('image_brand') }}" alt="">
                </li>
            @endwhile
            </ul>
        @endif 
    </div>
    <div class="client_bottom"><i class="client_icon"></i></div>
</section>   