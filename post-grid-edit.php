<!-- <?php
   /**
    * Template Name: Posts Grid
    */

   $page_id = get_the_ID();
   $parent = get_post($page_id);

   if(! empty($_GET['pag']) && is_numeric($_GET['pag']) ){
       $paged = $_GET['pag'];
   }else{
       $paged = 1;
   }
   $posts_per_page = 12; //(get_option('posts_per_page')) ? get_option('posts_per_page') : 12;

   $category['31'] = 'Good Karma';
   $category['27'] = 'Karma Postcards';

   $args_all = array(
    'category'         => '',
    'category_name'    => $category[$page_id],
    'orderby'          => 'date',
    'order'            => 'DESC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '',
    'meta_value'       => '',
    'post_type'        => 'post',
    'post_mime_type'   => '',
    'post_parent'      => '',
    'author'     => '',
    'author_name'    => '',
    'post_status'      => 'publish',
    'posts_per_page'   => -1,
    'suppress_filters' => true
   );

   $all_posts = get_posts($args_all);
   $post_count = count($all_posts);
    //echo'<h1>post count: '. $post_count .'</h1>';
   $num_pages = ceil($post_count / $posts_per_page) + 1;

   /////////////////////////////////////
   $args = array(
    'category'         => '',
    'category_name'    => $category[$page_id],
    'orderby'          => 'date',
    'order'            => 'DESC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '',
    'meta_value'       => '',
    'post_type'        => 'post',
    'post_mime_type'   => '',
    'post_parent'      => '',
    'author'         => '',
    'author_name'    => '',
    'post_status'      => 'publish',
    'suppress_filters' => true,
       'posts_per_page'   => $posts_per_page,
       'paged'         => $paged,
   );

   $featured_args = array(
    'category'         => '',
    'category_name'    => $category[$page_id],
    'orderby'          => 'date',
    'order'            => 'DESC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '',
    'meta_value'       => '',
    'post_type'        => 'post',
    'post_mime_type'   => '',
    'post_parent'      => '',
    'author'         => '',
    'author_name'    => '',
    'post_status'      => 'publish',
    'suppress_filters' => true,
       'posts_per_page'   => 3,
       'paged'         => 1,
   );

   get_header();

   ?> -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick-slider/css/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick-slider/css/slick-theme.css"/>
<!-- Stylesheets -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/docs.theme.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />
<!-- Owl Stylesheets -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/owlcarousel/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/owlcarousel/assets/animate.css">
<!-- Favicons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/ico/favicon.png">
<link rel="shortcut icon" href="favicon.ico">
<!-- javascript -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendors/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/owlcarousel/owl.carousel.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendors/highlight.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/app.js"></script>
<!-- eof stylesheets -->


<div id="kmoments_wrapper" class="full-width">
   <div class="highlight_content top-width">
      <h1><?php echo $parent->post_title; ?></h1>
      <p class="open"><?php echo $parent->post_content; ?></p>
      <div class="read_more">Read More &raquo;</div>
      <p class="center">

      </p>
   </div>
   
   <?php if($page_id == 31){ ?>
     <section id="demos">
           <div class="row">
             <div class="large-12 columns header-carousel">
               <div class="videoWrapper">
                           <?php
                               $fields = array(
                               'slides' => get_field('sliderkmoments')
                               );
                               $i = 0;
                               foreach ($fields['slides'] as $slide) {
                               $i++;
                           ?>
                            <div class="bgcover" style="">
                               <iframe src="https://www.youtube.com/embed/<?php echo $slide['id_youtube'];?>?autoplay=1&rel=0" frameborder="0" allowfullscreen width="940" height="540"></iframe>

                               <div class="text">
                                   <?php echo $slide['text3']; ?>
                               </div>
                             </div>
                       <?php } ?>
                 </div>

         </div></div></section>
   <?php } else{?>
   <section id="demos">
         <div class="row">
           <div class="large-12 columns header-carousel">
             <div id="owl-two" class="fadeOut owl-carousel owl-theme">

               <?php
                   $fields = array(
                   'slides' => get_field('sliderpostcard')
                   );
                   $i = 0;
                   foreach ($fields['slides'] as $slide) {
                   $i++;
               ?>
               <!-- <div class="item bgcover" style="background-image:linear-gradient( rgba(0, 0, 0,0),  rgba(0, 0, 0, 0.5)), url(<?php echo $slide['imageslider']['url']; ?>);"> -->
               <div class="item bgcover" style="background-image: url(<?php echo $slide['imageslider']['url']; ?>);">
                   <div class="text">
                       <p><img class="quotes" src="<?php echo get_template_directory_uri(); ?>/images/quote.png"></p>
                       <?php echo $slide['text_slider']; ?>
                   </div>
               </div>
           <?php } ?>
          </div>
             <script>
               $(document).ready(function() {
                  $('#owl-two').owlCarousel({
                 //$('.owl-carousel2').owlCarousel({
                   items:1,
                   animateOut: 'fadeOut',
                   dots: false,
                   loop:true,
                   margin:0,
                   autoplay: true,
                   autoplayTimeout:3000,
                   autoplayHoverPause:true,
                   navText: ['<i class="fa fa-angle-left nav-left" aria-hidden="true"></i>','<i class="fa fa-angle-right nav-right" aria-hidden="true"></i>'],
                   responsiveClass: true,
                   responsive: {
                     0: {
                       items: 1,
                       nav: false
                     },
                     600: {
                       items: 1,
                       nav: false
                     },
                     1000: {
                       items: 1,
                       nav: true,
                       margin: 0
                     }
                   }
                 })
               })
             </script>
       </section>
   <?php }?>

   <style type="text/css">
      @media (max-width: 768px){
      #kmoments_wrapper {
      padding: 80px 0 0 0 !important;
      }
      }
      .overlay{
         position: absolute;
         top: 0;
         height: 100%;
         width: 50px;
         display: block;
         z-index: 100;
      }

      .left-overlay{
        display: none;
         left: 0;
         background: linear-gradient(to right, #fff, transparent);
      }

      .right-overlay{
        display: none;
         right: 0;
         background: linear-gradient(to right, transparent, #fff);
      }
   </style>

<!-- Page Karma Postcards -->

   <?php if($page_id == 27){ ?>
   <section id="owl_new">
      <div class="row">
         <div class="large-12 columns">
            <div id="owl-one" class="owl-carousel owl-theme" id="review-grid">
             <?php
               $reviews = get_field('review');
               foreach ($reviews as $review) {
                  ?>
                   <div class="item <?php echo ($review['review_logo'] == 'ta_icon')?'ta':'fb' ?>">
                     <div class="review-header">
                        <h4>
                           <img class="review-logo <?php echo ($review['review_logo'] == 'ta_icon')?'ta':'' ?>" src="<?php echo get_template_directory_uri().'/images/'.$review['review_logo'].'.jpg'; ?>" />
                           <?php echo $review['review_target']; ?></h4>
                        <div class="dash"></div>
                     </div>
                     <div class="image-reviewer" style="background: url('<?php echo $review['user_photo']; ?>') center"></div>
                     <div class="text">
                        <div class="rating <?php echo ($review['review_logo'] == 'ta_icon')?'ta':'fb' ?>">
                           <?php
                           if ($review['review_logo'] == 'ta_icon') {
                              ?>
                              <?php
                                 for ($i=0; $i < $review['rating']; $i++) {
                                    echo '<div class="ta-star"></div>';
                                 }
                               ?>
                              <?php
                           }
                           ?>
                           <div class="rating-number <?php echo ($review['review_logo'] == 'ta_icon')?'ta':'fb' ?>"><?php echo $review['rating']; ?></div>
                           <?php
                           if ($review['review_logo'] == 'fb_icon') {
                              ?>
                              <div class="fb-star">&#9733;</div>
                              <?php
                           }
                           ?>
                        </div>
                        <h3 class="reviewer-name <?php echo ($review['review_logo'] == 'ta_icon')?'ta':'fb' ?>">
                           <?php
                              if (strlen($review['reviewer_name']) > 23) {
                                 echo substr($review['reviewer_name'], 0, 22).'...';
                              }
                              else
                                 echo $review['reviewer_name'];
                              ?>
                        </h3>
                        <span><?php echo isset($review['address'])? $review['address'].'. ': ''; ?></span>
                        <span><?php echo $review['date']; ?></span>
                        <h5><?php
                           if (strlen($review['review_title']) > 26) {
                              echo substr($review['review_title'], 0, 25).'...';
                           }
                           else
                              echo $review['review_title'];
                           ?>
                        </h5>
                        <?php
                         if (strlen($review['review_content']) > 148) {
                            echo substr($review['review_content'], 0, 147).'...';
                            if ($review['review_logo'] == 'ta_icon') {
                              echo '<a class="ta" href="'.$review['original_link'].'" style="margin: 0 10px;">More</a>';
                            }
                            else
                              echo '<a class="fb" href="'.$review['original_link'].'" style="margin: 0 10px;">More</a>';
                         }
                         else
                            echo $review['review_content'];
                       ?>
                     </div>
                  </div>
                  <?php
               }
                ?>
            </div>
            <script>
               $(document).ready(function() {
               var owl =  $('#owl-one').owlCarousel({
               //var owl = $('.owl-carousel');
               //owl.owlCarousel({
                stagePadding: 30,
                margin: 30,
                nav: false,
                loop: true,
                autoplay: true,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                responsive: {
               0: {
                 items: 1,
                 stagePadding: false,
                 margin: 10
               },
               600: {
                 items: 2,
                 stagePadding: false,
                 margin: 10
               },
               1000: {
                 items: 2
               }
                }
               })

               $('#review-grid').append('<div class="overlay left-overlay"></div><div class="overlay right-overlay"></div>')
               })
            </script>
         </div>
      </div>
   </section>

   <?php } ?>
   <?php if($page_id == 27){ ?>
   <style type="text/css">
      #sliderWrapper {
      overflow: hidden;
      margin-bottom: 0px !important;
      }
      #kmoments_wrapper .grid, #kmoments_wrapper .grid-postcard {
      margin: 0px auto;
      }
   </style>

<!-- Page Good Karma -->
   <?php } ?>
   <?php if($page_id == 31){ ?>
   <style type="text/css">
      .grid.goodkarma a.radius50 {
      border-radius: 50%;
      overflow: hidden;
      display: table;
      width: 200px;
      height: 200px;
      margin: auto;
      }
      #sliderWrapper {
      overflow: hidden;
      margin-bottom: 0;
      }
      .grid.goodkarma a.radius50 .img{
      width: auto!important;
      height: 100%!important;
      display: flex;
      }
      .grid.goodkarma .post_title a{
      color: #8d7249!important;
      font-size: 18px;
      }
      .grid.goodkarma .join_title a{
      color: #262626!important;
      font-weight: 100;
      }
      .grid.goodkarma .name_title a{
      color: #262626!important;
      font-weight: 100;
      font-size: 14px;
      }
      #kmoments_wrapper .grid {
          margin: 20px auto 0px;
      }
      /* .grid_bg{
      background-color: #dedddd !important;
      } */
   </style>
<!-- Content Feature -->
 <section id="demos2">
      <div class="row">
        <div class="large-12 columns">
          <div id="owl-three" class="owl-carousel owl-theme">
            <?php
                $fields = array(
                'slides' => get_field('content_feature2')
                );
                $i = 0;
                foreach ($fields['slides'] as $slide) {
                $i++;
            ?>
            <div class="grid_bg">
              <div class="grid goodkarma">
             <div class="item">
                <a href="'. $permalink .'" class="radius50">
                  <div class="imgnew middle" style="background-image: url('<?php echo $slide['image_feature']; ?>')"></div>
                </a>
                  <div class="text">
                    <div class="post_title"><h3><?php echo $slide['name_feature'];?></h3></div>
                    <div class="name_title"><?php echo $slide['subtitle_feature'];?></div>
                    <div class="post_title"><?php echo $slide['description_feature'];?></div>
                  </div>
              </div>
              </div>
              </div>
        <?php } ?>
          </div>
          </div>
          <script>
            $(document).ready(function() {
              var owl =  $('#owl-three').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                nav: false,
                autoplay: true,
                autoplayTimeout:4000,
                responsive: {
                  0: {
                    items: 1,
                  },
                  600: {
                    items: 2,
                    nav: false
                  },
                  1000: {
                    items: 3,
                    nav: false,
                    loop: true,
                    margin: 20
                  }
                }
              })
            })
          </script>
    </section>
<!--  -->
   <?php } ?>
   <style>
   /* .search input[type="text"]{
   width: auto!important;
   } */
   .search input[type="text"].active{
   /* border-bottom: 1px solid #8D714C; */
   border-radius: 0px;
   /* width: 350px; */
   }
   .search input[type="text"].inactive{
     border: none!important;
     border-radius: 0!important;
     width: 230px!important;
   }
   </style>
   <div class="filter_n_search_wrapper">
    <div class="search">
       <form action="" method="_GET" id="search-form">
          <input class="search" placeholder="Search Your Postcard Here" name="q" value="" type="text" id="search-input" />
          <input type="submit" id="searchsubmit" value="">
       </form>
       <a href="#" class="clear-search" id="clear-search">x</a>
    </div>

    <div class="filter-box">
       <div class="filter-box__dropdown" >
         <button class="toggle-dropdown">&#9660; <span id="filter-name">Filter By</span></button>
          <ul class="filter-box__dropdown-menu">
             <?php
              $hrefURL = get_permalink().'?';
              if (!empty($_GET)) {
                foreach ($_GET as $key => $value) {
                  if ($key != 'sort') {
                    $hrefURL .= $key.'='.$value.'&';
                  }
                }
              }
              echo "<li><a class='filter' data-filter='ASC' href='".$hrefURL."sort=ASC'>Oldest Upload</a></li>";
              echo "<li><a class='filter' data-filter='DESC' href='".$hrefURL."sort=DESC'>Recent Upload</a></li>";
            ?>
          </ul>
       </div>
     </div>
   </div>

   <script type="text/javascript">
      $('.search input[type="text"]').click(function(){
       $(this).addClass('active');
       $(this).removeClass('inactive');
       $(this).focus();
        $(this).animate({
          opacity: "+=1",
          width: "+=300"
        }, 200, function() {
          //$('#right_floating_content').show();
      });
      });
      $('.search input[type="text"]').bind('focusout blur', function(){
       $(this).removeClass('active');
       $(this).addClass('inactive');
      });
   </script>
   <div class="grid" id="grid-postcard">
<!--       <?php
         $pages = get_posts($args);
         foreach ( $pages as $page ) {

          $subdata = get_post_meta($page->ID); //echo "<pre>"; print_r($subdata); echo "</pre>";
          $permalink = get_permalink($page->ID);
          $permalink = str_ireplace( '/latest-karma-group-reviews/', '/karma-group-customer-feedback/', $permalink);

          $image_url = wp_get_attachment_url($subdata['image'][0]);
          echo'<div class="item">
            <a href="'. $permalink .'"><div class="img middle" style="background-image: url('. $image_url .')"></div></a>
            <div class="text">
            <div class="post_title"><a href="'. $permalink .'">'. substr($page->post_title, 0, 70) . (strlen($page->post_title) > 70 ? '...' : '') .'</a></div>
              <div class="join_title"><a href="'. $permalink .'">'. $subdata['join_title'][0] .'</a></div>
              <div class="name_title"><a href="'. $permalink .'">'. $subdata['name_title'][0] .'</a></div>
              <div class="readmore"><a href="'. $permalink .'">Read More &raquo;</a></div>
            </div>
          </div>';
         }
         ?>  -->

   </div>
   <style type="text/css">
     .share-group  .arrow{
        background: black;
        position: absolute;
        width: 10px;
        height: 10px;
        bottom: -3px;
        right: 50%;
        transform: rotateZ(45deg);
      }
   </style>
   <!-- environment call for postcard -->
   <script type="text/javascript">
      $(document).ready(function(){
          var page_id = "<?php echo get_the_ID(); ?>"
          var pag = 1
          var query = "<?php echo (isset($_GET['q']))? $_GET['q']:''?>"
          var sort = "<?php echo (isset($_GET['sort']))? $_GET['sort']:''?>"
          var orderby ="<?php echo (isset($_GET['orderby']))? $_GET['orderby']:'' ?>"
          var isReachScroll = false;
          var urlAPI = "<?php echo get_template_directory_uri().'/post-grid-API.php?'; ?>"+"page_id="+page_id+"&pag=";
          var templateDir = "<?php echo get_template_directory_uri()?>"
         $.ajax({
            url: urlAPI+pag,
            type: 'GET',
            dataType: 'json',
            beforeSend: function(){
               isReachScroll = true;
               $('#loading-animation').css('display','block')
            },
            success: function(result, status, xhr){
               $('#loading-animation').css('display','none')
               var gridTemp = '<div class="closegrid">';
               result.post.map(function(item, index){
                  item.permalink = item.permalink.replace("latest-karma-group-reviews", "karma-group-customer-feedback");

                  gridTemp += `
                  <div class="item">
                    <a href="`+item.permalink+`">
                      <div class="img middle" style="background-image: url('`+item.image_url+`')">
                      </div>
                    </a>
                    <div class="share-box">
                      <p>
                        <a class="social-media" href="https://twitter.com/share?url=`+item.permalink+`&amp;text=`+item.post_title+`&amp;hashtags=karmamoments" target="_blank">
                          <i class="fa fa-twitter" ></i>
                        </a>
                        <a class="social-media" href="https://plus.google.com/share?url=`+item.permalink+`" target="_blank">
                          <i class="fa fa-google-plus" ></i>
                        </a>
                        <a class="social-media" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=`+item.permalink+`" target="_blank">
                          <i class="fa fa-linkedin" ></i>
                        </a>
                        <a class="social-media" href="http://vkontakte.ru/share.php?url=`+item.permalink+`" target="_blank">
                          <i class="fa fa-vk" ></i>
                        </a>
                        <a class="social-media" href="http://www.tumblr.com/share/link?url=`+item.permalink+`&amp;title=`+item.post_title+`" target="_blank">
                          <i class="fa fa-tumblr-square" ></i>
                        </a>
                      </p>
                    </div>
                    <div class="share-div">
                      <p>
                        Share to:
                        <a href="http://www.facebook.com/sharer.php?u=`+item.permalink+`" target="_blank">
                          <i class="fa fa-facebook-official"></i>
                        </a>
                        <a class="more-link" href="#">
                          <i class="fa fa-share-alt"></i>
                        </a>
                      </p>
                    </div>
                     <div class="text">
                     <div class="post_title"><a href="`+item.permalink+`">`+item.post_title.substr(0,70)+(item.post_title.length > 70 ? '...' : '')+`</a></div>
                        <div class="join_title"><a href="`+item.permalink+`">`+item.subdata['join_title'][0]+`</a></div>
                        <div class="name_title"><a href="`+item.permalink+`">`+item.subdata['name_title'][0]+`</a></div>
                        <div class="readmore"><a href="`+item.permalink+`">Read More &raquo;</a></div>
                     </div>
                  </div>
                  `
               })
               gridTemp += "</div>"
              $('#grid-postcard').append(gridTemp)
              if (result.next == 0) {
                isReachScroll = true
              }
              else
                isReachScroll = false
              $('.closegrid').addClass('open')
            }
         })

         $(window).scroll(function() {
             if($(window).scrollTop()-400 > $('#grid-postcard').height() && !isReachScroll) {
              $('#loading-animation').css('display','block')
                pag += 1
                $.ajax({
                  url: urlAPI+pag,
                  type: 'GET',
                  dataType: 'json',
                  beforeSend: function(){
                     isReachScroll = true;
                     $('#loading-animation').css('display','block')
                  },
                  success: function(result, status, xhr){
                     $('#loading-animation').css('display','none')
                     var gridTemp = '<div class="closegrid">';
                     result.post.map(function(item, index){
                  item.permalink = item.permalink.replace("latest-karma-group-reviews", "karma-group-customer-feedback");
                        gridTemp += `
                        <div class="item">
                          <a href="`+item.permalink+`">
                            <div class="img middle" style="background-image: url('`+item.image_url+`')">
                            </div>
                          </a>
                          <div class="share-box">
                            <p>
                              <a class="social-media" href="https://twitter.com/share?url=`+item.permalink+`&amp;text=`+item.post_title+`&amp;hashtags=karmamoments" target="_blank">
                                <i class="fa fa-twitter" ></i>
                              </a>
                              <a class="social-media" href="https://plus.google.com/share?url=`+item.permalink+`" target="_blank">
                                <i class="fa fa-google-plus" ></i>
                              </a>
                              <a class="social-media" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=`+item.permalink+`" target="_blank">
                                <i class="fa fa-linkedin" ></i>
                              </a>
                              <a class="social-media" href="http://vkontakte.ru/share.php?url=`+item.permalink+`" target="_blank">
                                <i class="fa fa-vk" ></i>
                              </a>
                              <a class="social-media" href="http://www.tumblr.com/share/link?url=`+item.permalink+`&amp;title=`+item.post_title+`" target="_blank">
                                <i class="fa fa-tumblr-square" ></i>
                              </a>
                            </p>
                          </div>
                          <div class="share-div">
                            <p>
                              Share to:
                              <a href="http://www.facebook.com/sharer.php?u=`+item.permalink+`" target="_blank">
                                <i class="fa fa-facebook-official"></i>
                              </a>
                              <a class="more-link" href="#">
                                <i class="fa fa-share-alt"></i>
                              </a>
                            </p>
                          </div>
                           <div class="text">
                           <div class="post_title"><a href="`+item.permalink+`">`+item.post_title.substr(0,70)+(item.post_title.length > 70 ? '...' : '')+`</a></div>
                              <div class="join_title"><a href="`+item.permalink+`">`+item.subdata['join_title'][0]+`</a></div>
                              <div class="name_title"><a href="`+item.permalink+`">`+item.subdata['name_title'][0]+`</a></div>
                              <div class="readmore"><a href="`+item.permalink+`">Read More &raquo;</a></div>
                           </div>
                        </div>
                        `
                     })
                     gridTemp += "</div>"
                    $('#grid-postcard').append(gridTemp)
                    if (result.next == 0) {
                      isReachScroll = true
                    }
                    else
                      isReachScroll = false
                    $('.closegrid').addClass('open')
                  }
                })
              }
          });

          $('#search-form').on('submit', function(e){
            query = $('#search-input').val();
            pag = 1;
            e.preventDefault()
            $.ajax({
              url: urlAPI+pag+'&q='+query+'&sort='+sort+"&orderby="+orderby,
              type: 'GET',
              dataType: 'json',
              beforeSend: function(){
                isReachScroll = true //for stop load
                $('#loading-animation').css('display','block')
                $('#grid-postcard').html('')
              },
              success: function(result,status,xhr){
                $('#loading-animation').css('display','none')
                if (query != '') {
                  $('#clear-search').css('display','block');
                }
                // console.log(result)
                var gridTemp = '<div class="closegrid">';
                if (result.post.length > 0) {
                  result.post.map(function(item, index){
                  item.permalink = item.permalink.replace("latest-karma-group-reviews", "karma-group-customer-feedback");
                    gridTemp += `
                    <div class="item">
                      <a href="`+item.permalink+`">
                        <div class="img middle" style="background-image: url('`+item.image_url+`')">
                        </div>
                      </a>
                      <div class="share-box">
                        <p>
                          <a class="social-media" href="https://twitter.com/share?url=`+item.permalink+`&amp;text=`+item.post_title+`&amp;hashtags=karmamoments" target="_blank">
                            <i class="fa fa-twitter" ></i>
                          </a>
                          <a class="social-media" href="https://plus.google.com/share?url=`+item.permalink+`" target="_blank">
                            <i class="fa fa-google-plus" ></i>
                          </a>
                          <a class="social-media" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=`+item.permalink+`" target="_blank">
                            <i class="fa fa-linkedin" ></i>
                          </a>
                          <a class="social-media" href="http://vkontakte.ru/share.php?url=`+item.permalink+`" target="_blank">
                            <i class="fa fa-vk" ></i>
                          </a>
                          <a class="social-media" href="http://www.tumblr.com/share/link?url=`+item.permalink+`&amp;title=`+item.post_title+`" target="_blank">
                            <i class="fa fa-tumblr-square" ></i>
                          </a>
                        </p>
                      </div>
                      <div class="share-div">
                        <p>
                          Share to:
                          <a href="http://www.facebook.com/sharer.php?u=`+item.permalink+`" target="_blank">
                            <i class="fa fa-facebook-official"></i>
                          </a>
                          <a class="more-link" href="#">
                            <i class="fa fa-share-alt"></i>
                          </a>
                        </p>
                      </div>
                       <div class="text">
                       <div class="post_title"><a href="`+item.permalink+`">`+item.post_title.substr(0,70)+(item.post_title.length > 70 ? '...' : '')+`</a></div>
                          <div class="join_title"><a href="`+item.permalink+`">`+item.subdata['join_title'][0]+`</a></div>
                          <div class="name_title"><a href="`+item.permalink+`">`+item.subdata['name_title'][0]+`</a></div>
                          <div class="readmore"><a href="`+item.permalink+`">Read More &raquo;</a></div>
                       </div>
                    </div>
                    `
                  })
                }
                else{
                  gridTemp += `
                    <p>Sorry, we could not find any related post</p>
                  `
                }
                gridTemp += "</div>"
                $('#grid-postcard').append(gridTemp)
                if (result.next == 0) {
                  isReachScroll = true
                }
                else
                  isReachScroll = false
                $('.closegrid').addClass('open')
              }
            })
            return false;
          })

          $('#clear-search').on('click', function(e){
            e.preventDefault();
            query = '';
            pag = 1;
            $('#clear-search').css('display','none');
            $('#search-input').val('');
            $.ajax({
              url: urlAPI+pag+'&q='+query+'&sort='+sort,
              type: 'GET',
              dataType: 'json',
              beforeSend: function(){
                isReachScroll = true //for stop load
                $('#loading-animation').css('display','block')
                $('#grid-postcard').html('')
              },
              success: function(result,status,xhr){
                $('#loading-animation').css('display','none')
                if (query != '') {
                  $('#clear-search').css('display','block');
                }
                // console.log(result)
                var gridTemp = '<div class="closegrid">';
                if (result.post.length > 0) {
                  result.post.map(function(item, index){
                  item.permalink = item.permalink.replace("latest-karma-group-reviews", "karma-group-customer-feedback");
                    gridTemp += `
                    <div class="item">
                      <a href="`+item.permalink+`">
                        <div class="img middle" style="background-image: url('`+item.image_url+`')">
                        </div>
                      </a>
                      <div class="share-box">
                        <p>
                          <a class="social-media" href="https://twitter.com/share?url=`+item.permalink+`&amp;text=`+item.post_title+`&amp;hashtags=karmamoments" target="_blank">
                            <i class="fa fa-twitter" ></i>
                          </a>
                          <a class="social-media" href="https://plus.google.com/share?url=`+item.permalink+`" target="_blank">
                            <i class="fa fa-google-plus" ></i>
                          </a>
                          <a class="social-media" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=`+item.permalink+`" target="_blank">
                            <i class="fa fa-linkedin" ></i>
                          </a>
                          <a class="social-media" href="http://vkontakte.ru/share.php?url=`+item.permalink+`" target="_blank">
                            <i class="fa fa-vk" ></i>
                          </a>
                          <a class="social-media" href="http://www.tumblr.com/share/link?url=`+item.permalink+`&amp;title=`+item.post_title+`" target="_blank">
                            <i class="fa fa-tumblr-square" ></i>
                          </a>
                        </p>
                      </div>
                      <div class="share-div">
                        <p>
                          Share to:
                          <a href="http://www.facebook.com/sharer.php?u=`+item.permalink+`" target="_blank">
                            <i class="fa fa-facebook-official"></i>
                          </a>
                          <a class="more-link" href="#">
                            <i class="fa fa-share-alt"></i>
                          </a>
                        </p>
                      </div>
                       <div class="text">
                       <div class="post_title"><a href="`+item.permalink+`">`+item.post_title.substr(0,70)+(item.post_title.length > 70 ? '...' : '')+`</a></div>
                          <div class="join_title"><a href="`+item.permalink+`">`+item.subdata['join_title'][0]+`</a></div>
                          <div class="name_title"><a href="`+item.permalink+`">`+item.subdata['name_title'][0]+`</a></div>
                          <div class="readmore"><a href="`+item.permalink+`">Read More &raquo;</a></div>
                       </div>
                    </div>
                    `
                  })
                }
                else{
                  gridTemp += `
                    <p>Post that contains ${query} as key is not found</p>
                  `
                }
                gridTemp += "</div>"
                $('#grid-postcard').append(gridTemp)
                if (result.next == 0) {
                  isReachScroll = true
                }
                else
                  isReachScroll = false
                $('.closegrid').addClass('open')
              }
            })
          })

          $('.filter').on('click', function(e){
            e.preventDefault();
            $(this).parent().parent().toggleClass('toggled')
            var filter = $(e.currentTarget).data('filter');
            pag = 1;
            if (filter == 'popularity') {
              orderby = $(e.currentTarget).data('filter');
              sort = 'DESC;'
            }
            else if (filter == 'DESC' || filter == 'ASC') {
              sort = $(e.currentTarget).data('filter')
              orderby = 'date';
            }
            $.ajax({
              url: urlAPI+pag+'&q='+query+'&sort='+sort+"&orderby="+orderby,
              type: 'GET',
              dataType: 'json',
              beforeSend: function(){
                isReachScroll = true //for stop load
                $('#loading-animation').css('display','block')
                $('#grid-postcard').html('')
              },
              success: function(result,status,xhr){
                $('#loading-animation').css('display','none')
                if (query != '') {
                  $('#clear-search').css('display','block');
                }
                // console.log(result)
                var gridTemp = '<div class="closegrid">';
                if (result.post.length > 0) {
                  console.log(result.post)
                  result.post.map(function(item, index){
                  item.permalink = item.permalink.replace("latest-karma-group-reviews", "karma-group-customer-feedback");
                    gridTemp += `
                    <div class="item">
                      <a href="`+item.permalink+`">
                        <div class="img middle" style="background-image: url('`+item.image_url+`')">
                        </div>
                      </a>
                      <div class="share-box">
                        <p>
                          <a class="social-media" href="https://twitter.com/share?url=`+item.permalink+`&amp;text=`+item.post_title+`&amp;hashtags=karmamoments" target="_blank">
                            <i class="fa fa-twitter" ></i>
                          </a>
                          <a class="social-media" href="https://plus.google.com/share?url=`+item.permalink+`" target="_blank">
                            <i class="fa fa-google-plus" ></i>
                          </a>
                          <a class="social-media" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=`+item.permalink+`" target="_blank">
                            <i class="fa fa-linkedin" ></i>
                          </a>
                          <a class="social-media" href="http://vkontakte.ru/share.php?url=`+item.permalink+`" target="_blank">
                            <i class="fa fa-vk" ></i>
                          </a>
                          <a class="social-media" href="http://www.tumblr.com/share/link?url=`+item.permalink+`&amp;title=`+item.post_title+`" target="_blank">
                            <i class="fa fa-tumblr-square" ></i>
                          </a>
                        </p>
                      </div>
                      <div class="share-div">
                        <p>
                          Share to:
                          <a href="http://www.facebook.com/sharer.php?u=`+item.permalink+`" target="_blank">
                            <i class="fa fa-facebook-official"></i>
                          </a>
                          <a class="more-link" href="#">
                            <i class="fa fa-share-alt"></i>
                          </a>
                        </p>
                      </div>
                       <div class="text">
                       <div class="post_title"><a href="`+item.permalink+`">`+item.post_title.substr(0,70)+(item.post_title.length > 70 ? '...' : '')+`</a></div>
                          <div class="join_title"><a href="`+item.permalink+`">`+item.subdata['join_title'][0]+`</a></div>
                          <div class="name_title"><a href="`+item.permalink+`">`+item.subdata['name_title'][0]+`</a></div>
                          <div class="readmore"><a href="`+item.permalink+`">Read More &raquo;</a></div>
                       </div>
                    </div>
                    `
                  })
                }
                else{
                  gridTemp += `
                    <p>Post that contains ${query} as key is not found</p>
                  `
                }
                gridTemp += "</div>"
                $('#grid-postcard').append(gridTemp)
                if (result.next == 0) {
                  isReachScroll = true
                }
                else
                  isReachScroll = false
                $('.closegrid').addClass('open')
              }
            })
          })

         $('.toggle-dropdown').on('click', function(e){
           $(this).parent().find('.filter-box__dropdown-menu').toggleClass('toggled')
         })

         $('body').on('click', '.more-link' ,function(e){
          e.preventDefault();
          var currentShareBox = $(e.currentTarget).parent().parent().parent().find('.share-box');
          $(currentShareBox).toggleClass('more');
         })
      })
   </script>
   <style type="text/css">
     #loading-animation{
      display: none;
     }
   </style>

   <div id="loading-animation">
     <svg width="80px"  height="80px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-ellipsis" style="background: none;">
       <!--circle(cx="16",cy="50",r="10")-->
       <circle cx="84" cy="50" r="0" fill="#866a43">
         <animate attributeName="r" values="10;0;0;0;0" keyTimes="0;0.25;0.5;0.75;1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="2.1s" repeatCount="indefinite" begin="0s"></animate>
         <animate attributeName="cx" values="84;84;84;84;84" keyTimes="0;0.25;0.5;0.75;1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="2.1s" repeatCount="indefinite" begin="0s"></animate>
       </circle>
       <circle cx="84" cy="50" r="0.162044" fill="#866a43">
         <animate attributeName="r" values="0;10;10;10;0" keyTimes="0;0.25;0.5;0.75;1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="2.1s" repeatCount="indefinite" begin="-1.05s"></animate>
         <animate attributeName="cx" values="16;16;50;84;84" keyTimes="0;0.25;0.5;0.75;1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="2.1s" repeatCount="indefinite" begin="-1.05s"></animate>
       </circle>
       <circle cx="83.4491" cy="50" r="10" fill="#866a43">
         <animate attributeName="r" values="0;10;10;10;0" keyTimes="0;0.25;0.5;0.75;1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="2.1s" repeatCount="indefinite" begin="-0.525s"></animate>
         <animate attributeName="cx" values="16;16;50;84;84" keyTimes="0;0.25;0.5;0.75;1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="2.1s" repeatCount="indefinite" begin="-0.525s"></animate>
       </circle>
       <circle cx="49.4491" cy="50" r="10" fill="#866a43">
         <animate attributeName="r" values="0;10;10;10;0" keyTimes="0;0.25;0.5;0.75;1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="2.1s" repeatCount="indefinite" begin="0s"></animate>
         <animate attributeName="cx" values="16;16;50;84;84" keyTimes="0;0.25;0.5;0.75;1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="2.1s" repeatCount="indefinite" begin="0s"></animate>
       </circle>
       <circle cx="16" cy="50" r="9.83796" fill="#866a43">
         <animate attributeName="r" values="0;0;10;10;10" keyTimes="0;0.25;0.5;0.75;1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="2.1s" repeatCount="indefinite" begin="0s"></animate>
         <animate attributeName="cx" values="16;16;16;50;84" keyTimes="0;0.25;0.5;0.75;1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="2.1s" repeatCount="indefinite" begin="0s"></animate>
       </circle>
     </svg>
   </div>
</div>
<?php get_footer(); ?>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/slick-slider/js/slick.min.js'></script>
<script type="text/javascript">

   $('.read_more').click(function(){

    if($(this).hasClass('clicked')){
      $('.highlight_content .hide').hide();
      $(this).html('Read More &raquo;');
      $(this).removeClass('clicked');
    }else{
      $('.highlight_content .hide').show();
      $(this).html('Read Less &laquo;');
      $(this).addClass('clicked');
    }
   });

   $(document).ready(function(){
     $('.nav_toggle').on('click', function() {    $('#destination_mobile_wrapper').hide();
      $('#open_destination_mobile_wrapper .ulwrapper').hide();
      $('.mobile_dropdown').show();
      $('.mobile_dropdown .content').hide();
      $('.mobile_dropdown .content').removeClass('active');
      $('.main_nav.main_nav1').slideToggle();
    });
   })


</script>
