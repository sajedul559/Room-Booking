<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    @foreach (generateBreadcrumbs() as $breadcrumb)
                        <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                            @if ($loop->last)
                                {{ $breadcrumb['name'] }}
                            @else
                                <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>
            <h4 class="page-title">{{ ucfirst(last(request()->segments())) }}</h4>
        </div>
    </div>
</div>

