<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">

@foreach($collections as $list)
<url>
    <loc>{{url($list->slug)}}</loc>
    <lastmod>{{ gmdate(DateTime::W3C, strtotime($list->updated_at)) }}</lastmod>
    <priority>0.64</priority>
    @foreach($list->product as $imglist)
	    <image:image>
	          <image:loc>{{url('public/'.$imglist->image)}}</image:loc>
	    </image:image>
    @endforeach
</url>
@endforeach

@foreach($products as $list)
<url>
	<loc>{{url($list->collection->slug.'/'.$list->category->slug.'/'.$list->slug)}}</loc>
	<lastmod>{{ gmdate(DateTime::W3C, strtotime($list->updated_at)) }}</lastmod>
	<priority>0.80</priority>
	<image:image>
          <image:loc>{{url('public/'.$list->image)}}</image:loc>
    </image:image>
    @foreach($list->images as $image)
	    <image:image>
	          <image:loc>{{url('public/'.$imglist->image)}}</image:loc>
	    </image:image>
    @endforeach
</url>
@endforeach

@foreach($blogs as $list)
<url>
	<loc>{{url('blog/'.$list->slug)}}</loc>
	<lastmod>{{ gmdate(DateTime::W3C, strtotime($list->updated_at)) }}</lastmod>
	<priority>0.80</priority>
	<image:image>
          <image:loc>{{url('public/'.$list->image)}}</image:loc>
    </image:image>
</url>
@endforeach


</urlset>