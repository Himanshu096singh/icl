<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ShoppingCenter",
  "name": "<?php echo e(config('app.name')); ?>",
  "image": "<?php echo e(url('public/'.$info->store_logo)); ?>",
  "@id": "",
  "url": "<?php echo e(config('app.url')); ?>",
  "telephone": "011 45622642",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "<?php echo e($info->store_address); ?>",
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
  "name": "<?php echo e(config('app.name')); ?>",
  "alternateName": "<?php echo e(config('app.name')); ?>",
  "url": "<?php echo e(config('app.url')); ?>",
  "logo": "<?php echo e(url('public/'.$info->store_logo)); ?>",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "<?php echo e($info->store_phone); ?>",
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

<?php if(!empty($meta['type'])): ?>
<?php if($meta['type'] == 'index'): ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "url": "<?php echo e(config('app.url')); ?>",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "<?php echo e(config('app.url')); ?>/shop?search={search}",
    "query-input": "required name=search"
  }
}
</script>
<?php endif; ?>
<?php if($meta['type'] == 'page'): ?>
<script type="application/ld+json">
    {
      "@context": "https://schema.org/", 
      "@type": "BreadcrumbList", 
      "itemListElement": [{
        "@type": "ListItem", 
        "position": 1, 
        "name": "Home",
        "item": "<?php echo e(config('app.url')); ?>"
      },{
        "@type": "ListItem", 
        "position": 2, 
        "name": "<?php echo e(ucwords(str_replace("-", " ", Request::segment(1)))); ?>",
        "item": "<?php echo e(url()->full()); ?>"
      }]
    }
</script> 
<?php endif; ?>
<?php if($meta['type'] == 'product'): ?>
    
    <script type="application/ld+json">
   {
     "@context": "https://schema.org/",
     "@type": "Product",
     "name": "<?php echo e($product->name); ?>",
     "image": [
       "<?php echo e(url('public')); ?>/<?php echo e($product->image); ?>"
      ],
     "description": "<?php echo e($meta['description']); ?>",
     "sku": "<?php echo e($product->sku); ?>",
     "mpn": "0000<?php echo e($product->id); ?>",
     "brand": {
       "@type": "Brand",
       "name": "<?php echo e(config('app.name')); ?>"
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
         "name": "<?php echo e(config('app.name')); ?>"
       }
     },
     "aggregateRating": {
       "@type": "AggregateRating",
       "ratingValue": "4.4",
       "reviewCount": "89"
     },
     "offers": {
       "@type": "Offer",
       "url": "<?php echo e(url()->current()); ?>",
       "priceCurrency": "INR",
       "price": "<?php echo e($product->price); ?>",
       "priceValidUntil": "<?php echo e(date('Y-m-d')); ?>",
       "itemCondition": "UsedCondition",
       "availability": "InStock"
     }
   }
</script>
<?php 
    $faqschema = DB::table('productfaqs')->where('product_id',$product->id)->get();
    if(count($faqschema)>0) { ?>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
        <?php
        $i=1;
        foreach($faqschema as $item){
        ?>    
            {
                "@type": "Question",
                "name": "<?php echo e($item->question); ?>",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "<?php echo e($item->answer); ?>"
                }
            }<?php if(count($faqschema) > $i){echo ',';}?>
        <?php      
        $i++;
            
        }
        ?> 
        ] 
    }
</script>
    <?php } ?>
<?php endif; ?>
<?php if($meta['type'] == 'article'): ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/", 
      "@type": "BreadcrumbList", 
      "itemListElement": [{
        "@type": "ListItem", 
        "position": 1, 
        "name": "Home",
        "item": "<?php echo e(config('app.url')); ?>"  
      },{
        "@type": "ListItem", 
        "position": 2, 
        "name": "Blog",
        "item": "<?php echo e(url('blog')); ?>"  
      },{
        "@type": "ListItem", 
        "position": 3, 
        "name": "<?php echo e($blog->title); ?>",
        "item": "<?php echo e(url()->full()); ?>"
      }]
    }

    {
      "@context": "https://schema.org",
      "@type": "BlogPosting",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php echo e(url()->full()); ?>"
      },
      "headline": "<?php echo e($blog->title); ?>",
      "description": "<?php echo e($blog->metadescription); ?>",
      "image": "<?php echo e(url('public/'.$blog->image)); ?>",  
      "author": {
        "@type": "Person",
        "name": "<?php echo e(config('app.name')); ?>",
        "url": "<?php echo e(config('app.url')); ?>"
      },  
      "publisher": {
        "@type": "Organization",
        "name": "<?php echo e(config('app.name')); ?>",
        "logo": {
          "@type": "ImageObject",
          "url": "<?php echo e(url('public/'.$info->store_logo)); ?>"
        }
      },
      "datePublished": "<?php echo e($blog->created_at); ?>"
    }
    </script>
    <?php if(!empty($blog->faq) && count($blog->faq) > 0): ?>
      <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
          <?php $__currentLoopData = $blog->faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              {
                  "@type": "Question",
                  "name": "<?php echo e($item->question); ?>",
                  "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "<?php echo e(strip_tags($item->answer)); ?> <?php echo e($key); ?>"
                  }
              }<?php if(count($blog->faq) > $key+1): ?><?php echo e(","); ?><?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ] 
      }
      </script>
    <?php endif; ?>
<?php endif; ?>
    
<?php endif; ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/layouts/schema.blade.php ENDPATH**/ ?>