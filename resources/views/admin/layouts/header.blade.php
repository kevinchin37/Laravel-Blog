<div class="row">
    <div class="col-md-4">
        <h1>@yield('header_title')</h1>
    </div>

    <div class="col-md-8">
        <div class="float-right">@yield('header_links')</div>
    </div>
</div>

@component('admin.components.alerts.error') @endcomponent
@component('admin.components.alerts.flash') @endcomponent
