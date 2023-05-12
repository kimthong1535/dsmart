<!doctype html>
<html {!! get_language_attributes() !!}>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- get_favicon() --}}
    @php wp_head() @endphp
  </head>

  <body @php body_class() @endphp>
    <div class="wrapper">
    @include('sections.header')
      <main>
        @yield('content')
      </main>
    @include('sections.footer')
    </div>
    @php wp_footer() @endphp
  </body>
</html>
