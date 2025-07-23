@include('laraverse::layouts.header')
<body>
    <div id="app">
        @include('laraverse::layouts.sidebar')
        <main id="main-content" class="content">
            <section class="page-wrapper">
                <section class="content-wrapper">
                    @yield('content')
                </section>
            </section>
        </main>
@include('laraverse::layouts.footer')
