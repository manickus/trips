@extends('layout.layout')

@section('content')
	@foreach ($posts as $post)

		@include('partials.post')
		@if($loop->index == 1)
		<div class="only-lg">
   			 <div id="ceneoaffcontainer154250"></div>
<a id="ceneoaff-logo" title="Ceneo.pl" href="https://www.ceneo.pl/#pid=16123&crid=154250&cid=24878" rel="nofollow"><img style="border:0;width:1px;height:1px;" src="//app.ceneostatic.pl/common/image/logo/ap-logo-transparent-small.png" alt="Ceneo.pl" /></a>
<script type="text/javascript" charset="utf-8">
    if (typeof CeneoAPOptions == "undefined" || CeneoAPOptions == null)
    {
    var CeneoAPOptions = new Array(); 
    stamp = parseInt(new Date().getTime()/86400, 10);
    var script = document.createElement("script");
    script.setAttribute("type", "text/javascript");
    script.setAttribute("src", "//partnerzyapi.ceneo.pl/External/ap.js?"+stamp);
    script.setAttribute("charset", "utf-8");
    var head = document.getElementsByTagName("head")[0];
    head.appendChild(script);
    }
    CeneoAPOptions[CeneoAPOptions.length] =
    {
        ad_creation: 154250,
        ad_channel: 24878,
        ad_partner: 16123,
        ad_type: 2,
        ad_content: 'Xbox',
        ad_format: 2,
        ad_newpage: true,
        ad_basket: true,
        ad_container: 'ceneoaffcontainer154250',
        ad_formatTypeId: 1,
        ad_contextual: false, 
        ad_recommended: false 
    };
</script>
    	</div>
    	<div class="only-mobile">
    		<a href="https://www.ceneo.pl/Telefony_komorkowe#pid=16123&crid=153185&cid=24878" rel="nofollow"><img src="https://image2.ceneo.pl/data/banners/banner_669.jpg"></img></a>
    	</div>
		@endif

		@if($loop->index == 4)
		<div class="only-lg">
    			<div id="ceneoaffcontainer154251"></div>
<a id="ceneoaff-logo" title="Ceneo.pl" href="https://www.ceneo.pl/#pid=16123&crid=154251&cid=24878" rel="nofollow"><img style="border:0;width:1px;height:1px;" src="//app.ceneostatic.pl/common/image/logo/ap-logo-transparent-small.png" alt="Ceneo.pl" /></a>
<script type="text/javascript" charset="utf-8">
    if (typeof CeneoAPOptions == "undefined" || CeneoAPOptions == null)
    {
    var CeneoAPOptions = new Array(); 
    stamp = parseInt(new Date().getTime()/86400, 10);
    var script = document.createElement("script");
    script.setAttribute("type", "text/javascript");
    script.setAttribute("src", "//partnerzyapi.ceneo.pl/External/ap.js?"+stamp);
    script.setAttribute("charset", "utf-8");
    var head = document.getElementsByTagName("head")[0];
    head.appendChild(script);
    }
    CeneoAPOptions[CeneoAPOptions.length] =
    {
        ad_creation: 154251,
        ad_channel: 24878,
        ad_partner: 16123,
        ad_type: 2,
        ad_content: 'fifa',
        ad_format: 2,
        ad_newpage: true,
        ad_basket: true,
        ad_container: 'ceneoaffcontainer154251',
        ad_formatTypeId: 1,
        ad_contextual: false, 
        ad_recommended: false 
    };
</script>
    	</div>
    	<div class="only-mobile">
    		<a href="https://www.ceneo.pl/Gry_konsolowe#pid=16123&crid=153184&cid=24878" rel="nofollow"><img src="https://image2.ceneo.pl/data/banners/banner_271.jpg"></img></a>
    	</div>
		@endif

		@if($loop->index == 8)
		<div style="width: 90%;display: flex;justify-content: center;">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-fj+6b+w-ex+of"
     data-ad-client="ca-pub-7702052866552132"
     data-ad-slot="4211293122"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
		</div> 
		@endif
	@endforeach
	{{ $posts->links() }}
@endsection