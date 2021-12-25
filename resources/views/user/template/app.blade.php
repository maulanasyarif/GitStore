@include('user.template.header')

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        @yield('content')
    </div>
</main>

@include('user.template.footer')