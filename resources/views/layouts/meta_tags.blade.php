@if (!empty($meta['title']))
    <title>{!! $meta['title'] !!}</title>
        @else
    <title>{{config('app.name')}}</title>
@endif    

@if (!empty($meta['keyword']))
    <meta name="keywords" content="{!!$meta['keyword']!!}">
@endif    
@if (!empty($meta['description']))
    <meta name="description" content="{!!$meta['description']!!}">
@endif


@if (!empty($meta['title']))
<meta property="og:title" content="{!! $meta['title'] !!}"/>
@endif
@if (!empty($meta['description']))
<meta property="og:description" content="{!!$meta['description']!!}" />
@endif
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:type" content="website" />
@if (!empty($meta['image']))
<meta property="og:image" content="{{url('public')}}/{{$meta['image']}}" />
@else
<meta property="og:image" content="{{url('public/frontend/images/logo.png')}}" />
@endif      
<meta name="twitter:card" content="summary">
@if (!empty($meta['title']))
<meta name="twitter:title" content="{!! $meta['title'] !!}">
@endif
@if (!empty($meta['description']))
<meta name="twitter:description" content="{!!$meta['description']!!}">
@endif
@if (!empty($meta['image']))
<meta name="twitter:image" content="{{url('public')}}/{{$meta['image']}}">
@else
<meta name="twitter:image" content="{{url('public/frontend/images/logo.png')}}">
@endif
<meta name="twitter:site" content="{{config('app.name')}}">
<link rel="canonical" href="{{url()->current()}}" /> 
