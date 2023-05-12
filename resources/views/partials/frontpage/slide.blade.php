<div class="second-banner">
  <div>
    <div style="width: 100%; display: inline-block;">
      <a href="#" alt="banner 2" tabindex="-1"> @if(have_rows('slide_image')) @while(have_rows('slide_image')) @php the_row(); @endphp <img class="img-desk" alt="banner 2" src="{!! get_sub_field('slide_image_item') !!}"> @endwhile @endif </a>
    </div>
  </div>
</div>