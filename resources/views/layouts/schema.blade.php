<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ShoppingCenter",
  "name": "{{config('app.name')}}",
  "image": "{{url('public/'.$info->store_logo)}}",
  "@id": "",
  "url": "{{config('app.url')}}",
  "telephone": "011 45622642",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "{{$info->store_address}}",
    "addressLocality": "Delhi",
    "postalCode": "110049",
    "addressCountry": "IN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude":28.569420,
    "longitude":77.220900
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "00:00",
    "closes": "23:59"
  },
  "sameAs": [
    "https://www.facebook.com/ikshitachoudhary",
    "https://www.instagram.com/ikshitachoudhary/"
  ] 
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "{{config('app.name')}}",
  "alternateName": "{{config('app.name')}}",
  "url": "{{config('app.url')}}",
  "logo": "{{url('public/'.$info->store_logo)}}",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "{{$info->store_phone}}",
    "contactType": "customer service",
    "areaServed": "IN",
    "availableLanguage": ["en","Hindi"]
  },
  "sameAs": [
    "https://www.facebook.com/ikshitachoudhary",
    "https://www.instagram.com/ikshitachoudhary/"
  ]
}
</script>

@if (!empty($meta['type']))
@if($meta['type'] == 'index')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "url": "{{config('app.url')}}",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "{{config('app.url')}}/shop?search={search}",
    "query-input": "required name=search"
  }
}
</script>
@endif
@if($meta['type'] == 'page')
<script type="application/ld+json">
    {
      "@context": "https://schema.org/", 
      "@type": "BreadcrumbList", 
      "itemListElement": [{
        "@type": "ListItem", 
        "position": 1, 
        "name": "Home",
        "item": "{{config('app.url')}}"
      },{
        "@type": "ListItem", 
        "position": 2, 
        "name": "{{ucwords(str_replace("-", " ", Request::segment(1)))}}",
        "item": "{{url()->full()}}"
      }]
    }
</script> 
@endif
@if($meta['type'] == 'product')
    
    <script type="application/ld+json">
   {
     "@context": "https://schema.org/",
     "@type": "Product",
     "name": "{{$product->name}}",
     "image": [
       "{{url('public')}}/{{$product->image}}"
      ],
     "description": "{{$meta['description']}}",
     "sku": "{{$product->sku}}",
     "mpn": "0000{{$product->id}}",
     "brand": {
       "@type": "Brand",
       "name": "{{config('app.name')}}"
     },
     "review": {
       "@type": "Review",
       "reviewRating": {
         "@type": "Rating",
         "ratingValue": "4",
         "bestRating": "5"
       },
       "author": {
         "@type": "Person",
         "name": "{{config('app.name')}}"
       }
     },
     "aggregateRating": {
       "@type": "AggregateRating",
       "ratingValue": "4.4",
       "reviewCount": "89"
     },
     "offers": {
       "@type": "Offer",
       "url": "{{url()->current()}}",
       "priceCurrency": "INR",
       "price": "{{$product->price}}",
       "priceValidUntil": "{{date('Y-m-d')}}",
       "itemCondition": "UsedCondition",
       "availability": "InStock"
     }
   }
</script>
@php 
    $faqschema = DB::table('productfaqs')->where('product_id',$product->id)->get();
    if(count($faqschema)>0) { @endphp
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
        @php
        $i=1;
        foreach($faqschema as $item){
        @endphp    
            {
                "@type": "Question",
                "name": "{{$item->question}}",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "{{$item->answer}}"
                }
            }@php if(count($faqschema) > $i){echo ',';}@endphp
        @php      
        $i++;
            
        }
        @endphp 
        ] 
    }
</script>
    @php } @endphp
@endif
@if($meta['type'] == 'article')
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/", 
      "@type": "BreadcrumbList", 
      "itemListElement": [{
        "@type": "ListItem", 
        "position": 1, 
        "name": "Home",
        "item": "{{config('app.url')}}"  
      },{
        "@type": "ListItem", 
        "position": 2, 
        "name": "Blog",
        "item": "{{url('blog')}}"  
      },{
        "@type": "ListItem", 
        "position": 3, 
        "name": "{{$blog->title}}",
        "item": "{{url()->full()}}"
      }]
    }

    {
      "@context": "https://schema.org",
      "@type": "BlogPosting",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{url()->full()}}"
      },
      "headline": "{{$blog->title}}",
      "description": "{{$blog->metadescription}}",
      "image": "{{url('public/'.$blog->image)}}",  
      "author": {
        "@type": "Person",
        "name": "{{config('app.name')}}",
        "url": "{{config('app.url')}}"
      },  
      "publisher": {
        "@type": "Organization",
        "name": "{{config('app.name')}}",
        "logo": {
          "@type": "ImageObject",
          "url": "{{url('public/'.$info->store_logo)}}"
        }
      },
      "datePublished": "{{$blog->created_at}}"
    }
    </script>
    @if(!empty($blog->faq) && count($blog->faq) > 0)
      <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
          @foreach($blog->faq as $key=>$item)
              {
                  "@type": "Question",
                  "name": "{{$item->question}}",
                  "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{{strip_tags($item->answer)}} {{$key}}"
                  }
              }@if(count($blog->faq) > $key+1){{","}}@endif
          @endforeach
          ] 
      }
      </script>
    @endif
@endif
    
@endif