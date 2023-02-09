


<!doctype php>
<php class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>ClickinPedia - Home Page</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<?php include "include/links.php" ?> 
<?php include "include/menu.php" ?>
<?php include "include/constant.php" ?>

<?php
include "include/config.php";
$id = $_GET['id'];
$sql = "SELECT * FROM `blog` WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<main>

<!-- breadcrumb area start -->
<section class="breadcrumb__area breadcrumb-height include-bg p-relative" data-background="assets/img/breadcrumb/breadcurmb.jpg">
<div class="container">
   <div class="row">
      <div class="col-xxl-12">
         <div class="breadcrumb__content">
            <h3 class="breadcrumb__title">Blog Details</h3>
            <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s">
               <span><a href="#">Home</a></span>
               <span class="dvdr"><i class="fa fa-angle-right"></i></span>
               <span>Blog Details</span>
             </div>
         </div>
      </div>
   </div>
</div>
</section>
<!-- breadcrumb area end -->


<!-- postbox area start -->
 <div class="postbox__area pt-120 pb-120">
   <div class="container">
      <div class="row">
         <div class="col-xxl-8 col-xl-8 col-lg-8 col-12">
            <div class="postbox__wrapper">
               <article class="postbox__item format-image transition-3">
                  <div class="postbox__content">
                     <p><img class="w-100" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']; ?>" alt=""></p>
                     <div class="postbox__meta">
                        <span><a href="#"><i class="fal fa-user-circle"></i><?php echo $row['a_name']; ?></a></span>
                        <span><a href="#"><i class="fal fa-clock"></i> <?php  echo $row['date'];?></a></span>
                        <span><a href="#"><i class="fal fa-comment-alt-lines"></i>(04) Coments</a></span>
                     </div>
                     <h3 class="postbox__title">
                     <?php  echo $row['title'];?>
                     </h3>
                     <div class="postbox__text">
                     <?php  echo $row['b_desc'];?>
                     </div>
<!-- 
                     <div class="postbox__thumb2 mb-60">
                        <div class="row gx-50">
                           <div class="col-xl-6">
                              <p><img src="assets/img/blog/blog-sm-5.jpg" alt=""></p>
                           </div>
                           <div class="col-xl-6">
                              <p><img src="assets/img/blog/blog-sm-6.jpg" alt=""></p>
                           </div>
                        </div>
                        <h3 class="postbox__title">
                           How To Create A Vanilla JavaScript 
                        </h3>
                        <div class="postbox__text">
                           <p>
                              One in four people in the world will be affected by mental or neurological disorders at some point in their lives, says the World Health Organization. Still, we spend more time brushing our teeth than taking care of our mental health, said Guy Winch in his TED talk.
                           </p>
                           <p>We tend to neglect our mental well-being because of the stigma of mental health care. But as societies become wiser and more self-aware, there is a greater need to redefine the meaning of mental health care. Naomi Hirabayashi and Marah Lidey do exactly that by drawing attention to the aspect of preventing mental health issues. The application they built makes mental self-care easy and accessible. of this year of the best law and his a part of this years.
                           </p>
                        </div>
                     </div> -->
                     <div class="postbox__social-wrapper">
                        <div class="row">
                           <div class="col-xl-8 col-lg-12">
                              <div class="postbox__tag tagcloud">
                                 <span>Tag</span>
                                 <a href="blog-details.php">Business</a>
                                 <a href="blog-details.php">Design</a>
                                 <a href="blog-details.php">apps</a>
                                 <a href="blog-details.php">data</a>
                              </div>
                           </div>
                           <div class="col-xl-4 col-lg-12">
                              <div class="postbox__social text-xl-end text-start">
                                 <span>Share</span>
                                 <a href="blog-details.php"><i class="fab fa-linkedin tp-linkedin"></i></a>
                                 <a href="blog-details.php"><i class="fab fa-pinterest tp-pinterest"></i></a>
                                 <a href="blog-details.php"><i class="fab fa-facebook tp-facebook" ></i></a>
                                 <a href="blog-details.php"><i class="fab fa-twitter tp-twitter"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </article>
               <div class="postbox__comment mb-65">
                  <h3 class="postbox__comment-title">(04) Comment</h3>
                  <ul>
                     <li>
                        <div class="postbox__comment-box d-flex">
                           <div class="postbox__comment-info ">
                              <div class="postbox__comment-avater mr-20">
                                 <img src="assets/img/blog/blog-avata-1.jpg" alt="">
                              </div>  
                           </div>
                           <div class="postbox__comment-text">
                              <div class="postbox__comment-name">
                                 <h5>Kristin Watson</h5>
                                 <span class="post-meta"> July 14, 2022</span>
                              </div>
                              <p>Patient Comments are a collection of comments submitted by viewers in <br> response to a question posed by a MedicineNet doctor.</p>
                              <div class="postbox__comment-reply">
                                 <a href="#">Reply</a>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="children">
                        <div class="postbox__comment-box  d-flex">
                           <div class="postbox__comment-info">
                              <div class="postbox__comment-avater mr-20">
                                 <img src="assets/img/blog/blog-avata-2.jpg" alt="">
                              </div> 
                           </div>
                           <div class="postbox__comment-text">
                              <div class="postbox__comment-name">
                                 <h5>Farhan Firoz</h5>
                                 <span class="post-meta"> July 14, 2022</span>
                              </div>
                              <p>Include anecdotal examples of your experience, or things you took notice of that <br> you feel others would find useful.</p>
                              <div class="postbox__comment-reply">
                                 <a href="#">Reply</a>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="postbox__comment-form">
                  <h3 class="postbox__comment-form-title">Leave a Reply</h3>
                  <form action="#">
                     <div class="row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6">
                           <div class="postbox__comment-input">
                              <input type="text" placeholder="Your Name">
                           </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6">
                           <div class="postbox__comment-input">
                              <input type="email" placeholder="Your Email">
                           </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6">
                           <div class="postbox__comment-input">
                              <input type="text" placeholder="Number">
                           </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6">
                           <div class="postbox__comment-input">
                              <input type="text" placeholder="Website">
                           </div>
                        </div>
                        <div class="col-xxl-12">
                           <div class="postbox__comment-input">
                              <textarea placeholder="Enter your comment ..."></textarea>
                           </div>
                        </div>
                        <div class="col-xxl-12">
                           <div class="postbox__comment-agree d-flex align-items-start mb-20">
                              <input class="e-check-input" type="checkbox" id="e-agree">
                              <label class="e-check-label" for="e-agree">Save my name, email, and website in this browser for the next time I comment.</label>
                           </div>
                        </div>
                        <div class="col-xxl-12">
                           <div class="postbox__comment-btn">
                              <button type="submit" class="tp-btn-sm">Post comment</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-xxl-4 col-xl-4 col-lg-4">
            <div class="sidebar__wrapper">
               <div class="sidebar__widget mb-40">
                  <h3 class="sidebar__widget-title">Search Here</h3>
                  <div class="sidebar__widget-content">
                     <div class="sidebar__search">
                        <form action="#">
                           <div class="sidebar__search-input-2">
                              <input type="text" placeholder="Search your keyword...">
                              <button type="submit"><i class="far fa-search"></i></button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="sidebar__widget mb-40">
                  <h3 class="sidebar__widget-title">Categories</h3>
                  <div class="sidebar__widget-content">
                     <ul>
                        <li><a href="blog.php">Web Design<span>26</span></a></li>
                        <li><a href="blog.php">Devlopment <span>30</span></a></li>
                        <li><a href="blog.php">Branding <span>71</span></a></li>
                        <li><a href="blog.php">MOtion Design <span>56</span></a></li>
                        <li><a href="blog.php">UI/UX Deisgn <span>60</span></a></li>
                        <li><a href="blog.php">Graphic Design <span>99</span></a></li>
                     </ul>
                  </div>
               </div>
               <div class="sidebar__widget mb-40">
                  <h3 class="sidebar__widget-title">Pages</h3>
                  <div class="sidebar__widget-content">
                     <ul>
                        <li><a href="blog.php">Web Design <span><i class="fal fa-angle-right"></i></span></a></li>
                        <li><a href="blog.php">Devlopment <span><i class="fal fa-angle-right"></i></span></a></li>
                        <li><a href="blog.php">Branding <span><i class="fal fa-angle-right"></i></span></a></li>
                        <li><a href="blog.php">MOtion Design<span><i class="fal fa-angle-right"></i></span></a></li>
                        <li><a href="blog.php">UI/UX Deisgn  <span><i class="fal fa-angle-right"></i></span></a></li>
                        <li><a href="blog.php">Graphic Design  <span><i class="fal fa-angle-right"></i></span></a></li>
                     </ul>
                  </div>
               </div>
               <div class="sidebar__widget mb-40">
                  <h3 class="sidebar__widget-title">Recent Post</h3>
                  <div class="sidebar__widget-content">
                     <div class="sidebar__post rc__post">
                        <div class="rc__post mb-20 d-flex">
                           <div class="rc__post-thumb mr-20">
                              <a href="blog-details.php"><img src="assets/img/blog/blog-sm-1.jpg" alt=""></a>
                           </div>
                           <div class="rc__post-content">
                              <div class="rc__meta">
                                 <span>4 March. 2022</span>
                              </div>
                              <h3 class="rc__post-title">
                                 <a href="blog-details.php">Don’t Underestimate The Software</a>
                              </h3>
                           </div>
                        </div>
                        <div class="rc__post mb-20 d-flex">
                           <div class="rc__post-thumb mr-20">
                              <a href="blog-details.php"><img src="assets/img/blog/blog-sm-2.jpg" alt=""></a>
                           </div>
                           <div class="rc__post-content">
                              <div class="rc__meta">
                                 <span>4 March. 2022</span>
                              </div>
                              <h3 class="rc__post-title">
                                 <a href="blog-details.php">Designing Human-Machine Interfaces..</a>
                              </h3>
                           </div>
                        </div>
                        <div class="rc__post mb-20 d-flex">
                           <div class="rc__post-thumb mr-20">
                              <a href="blog-details.php"><img src="assets/img/blog/blog-sm-3.jpg" alt=""></a>
                           </div>
                           <div class="rc__post-content">
                              <div class="rc__meta">
                                 <span>4 March. 2022</span>
                              </div>
                              <h3 class="rc__post-title">
                                 <a href="blog-details.php">Web Design Done Well: Excellent</a>
                              </h3>
                           </div>
                        </div>
                        <div class="rc__post mb-20 d-flex">
                           <div class="rc__post-thumb mr-20">
                              <a href="blog-details.php"><img src="assets/img/blog/blog-sm-4.jpg" alt=""></a>
                           </div>
                           <div class="rc__post-content">
                              <div class="rc__meta">
                                 <span>4 March. 2022</span>
                              </div>
                              <h3 class="rc__post-title">
                                 <a href="blog-details.php">Don’t Underestimate The Software </a>
                              </h3>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar__widget mb-40">
                  <h3 class="sidebar__widget-title">Tags</h3>
                  <div class="sidebar__widget-content">
                     <div class="tagcloud">
                        <a href="blog.php">landing</a>
                        <a href="blog.php">Charity</a>
                        <a href="blog.php">apps</a>
                        <a href="blog.php">Education </a>
                        <a href="blog.php">data</a>
                        <a href="blog.php">book</a>
                        <a href="blog.php">Design</a>
                        <a href="blog.php">website</a>
                        <a href="blog.php">landing page</a>
                        <a href="blog.php">data</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- postbox area end -->

</main>





<?php include "include/footer.php" ?>


<?php include "include/scripts.php" ?>
