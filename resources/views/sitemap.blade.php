<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

<url>
	<loc>{{url('/')}}</loc>
	<lastmod>2021-02-12T05:43:35+00:00</lastmod>
	<priority>1.00</priority>
</url>

<url>
	<loc>{{url('about-the-brand')}}</loc>
	<lastmod>2021-02-12T05:43:35+00:00</lastmod>
	<priority>0.80</priority>
</url>

<url>
	<loc>{{url('blogs')}}</loc>
	<lastmod>2021-02-12T05:43:35+00:00</lastmod>
	<priority>0.80</priority>
</url>

<url>
	<loc>{{url('collections')}}</loc>
	<lastmod>2021-02-12T05:43:35+00:00</lastmod>
	<priority>0.80</priority>
</url>

<url>
	<loc>{{url('faq')}}</loc>
	<lastmod>2021-02-12T05:43:35+00:00</lastmod>
	<priority>0.80</priority>
</url>

<url>
	<loc>{{url('shop')}}</loc>
	<lastmod>2021-02-12T05:43:35+00:00</lastmod>
	<priority>0.80</priority>
</url>

<url>
	<loc>{{url('sale')}}</loc>
	<lastmod>2021-02-12T05:43:35+00:00</lastmod>
	<priority>0.80</priority>
</url>

<url>
	<loc>{{url('contact-us')}}</loc>
	<lastmod>2021-02-12T05:43:35+00:00</lastmod>
	<priority>0.80</priority>
</url>

@foreach($collections as $list)
<url>
	<loc>{{url($list->slug)}}</loc>
	<lastmod>{{ gmdate(DateTime::W3C, strtotime($list->updated_at)) }}</lastmod>
	<priority>0.80</priority>
</url>
@endforeach

@foreach($products as $list)
<url>
	<loc>{{url($list->collection->slug.'/'.$list->category->slug.'/'.$list->slug)}}</loc>
	<lastmod>{{ gmdate(DateTime::W3C, strtotime($list->updated_at)) }}</lastmod>
	<priority>0.80</priority>
</url>
@endforeach

@foreach($blogs as $list)
<url>
	<loc>{{url('blog/'.$list->slug)}}</loc>
	<lastmod>{{ gmdate(DateTime::W3C, strtotime($list->updated_at)) }}</lastmod>
	<priority>0.80</priority>
</url>
@endforeach


</urlset>