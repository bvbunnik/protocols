<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Protocols</li>
            @foreach($protocols as $protocol)
                <li class="{{ Active::pattern($protocol->table_name) }}"><a href="{{url("protocols/" . mb_strtolower($protocol->table_name))}}">{{$protocol->name}}</a></li>
            @endforeach
        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>