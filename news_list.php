<?php
session_start();
include('config.php');

if($_SESSION['status']!="login")
{
  header("location:index.php?info=not_yet");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Providence Gazette</title>

    <!-- Favicon  -->
    <link rel="shortcut icon" type="image/x-icon" href="components/logo.ico" />

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="components/css/core-style.css">
    <link rel="stylesheet" href="components/style.css">
    <script src="components/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="components/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="components/dist/sweetalert2.min.css">

    <!-- Responsive CSS -->
    <link href="components/css/responsive.css" rel="stylesheet">

    <style>
      .red {
        color: #E01D0B;
      }
    </style>

</head>

<body>

    <!-- Header Area Start -->
    <header class="header-area">
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Breaking News Area -->
                    <div class="col-12 col-md-6">
                        <div class="breaking-news-area">
                            <h5 class="breaking-news-title">Breaking news</h5>
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    <li><a href="#">Ark Society on progress in mind upload</a></li>
                                    <li><a href="#">Brexit breakthrough in Brussels</a></li>
                                    <li><a href="#">IAGO to infiltrate Russian Kremlin</a></li>
                                    <li><a href="#">Ether projects on hold after assets stolen</a></li>
                                    <li><a href="#">Assassin of Lin Xi, The Maelstrom, is dead</a></li>
                                    <li><a href="#">Moses Lee takes control of Kowoon Heavy Industries</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Stock News Area -->
                    <div class="col-12 col-md-6">
                        <div class="stock-news-area">
                            <div id="stockNewsTicker" class="ticker">
                                <ul>
                                    <li>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>eur/usd</span>
                                                <span>1.1862</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>0.18</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>BTC/usd</span>
                                                <span>15.674.99</span>
                                            </div>
                                            <div class="stock-index plus-index">
                                                <h4>8.60</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>ETH/usd</span>
                                                <span>674.99</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>13.60</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>eur/usd</span>
                                                <span>1.1862</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>0.18</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>BTC/usd</span>
                                                <span>15.674.99</span>
                                            </div>
                                            <div class="stock-index plus-index">
                                                <h4>8.60</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>ETH/usd</span>
                                                <span>674.99</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>13.60</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>eur/usd</span>
                                                <span>1.1862</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>3.95</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>BTC/usd</span>
                                                <span>15.674.99</span>
                                            </div>
                                            <div class="stock-index plus-index">
                                                <h4>4.78</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>ETH/usd</span>
                                                <span>674.99</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>11.37</h4>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Middle Header Area -->
        <div class="middle-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Logo Area -->
                    <div class="col-12 col-md-4">
                        <div class="logo-area">
                            <a href="#"><img src="components/logo.png" alt="logo" width="100" height="100"></a>
                            <a href="#"><img src="components/logo2.jpg" alt="logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Header Area -->
        <div class="bottom-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#gazetteMenu" aria-controls="gazetteMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>
                                <div class="collapse navbar-collapse" id="gazetteMenu">
                                    <ul class="navbar-nav mr-auto">
                                        <ul class="navbar-nav mr-auto">
                                          <li class="nav-item">
                                            <a class="nav-link" href="main-page.php">Home <span class="sr-only">(current)</span></a>
                                          </li>
                                          <li class="nav-item active">
                                            <a class="nav-link" href="news_list.php">News</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" href="map.php">Assets</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" href="operatives_list.php">Operatives</a>
                                          </li>
                                          <?php if ($_SESSION['role']!='Superadmin'){ echo '<li class="nav-item"> <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> </li>'; } else { echo '<li class="nav-item active">
        <a class="nav-link" href="#" onclick="oof()">Purge</a>
      </li>'; } ?>
                                        </ul>
                                    </ul>
                                    <ul class="nav justify-content-end">
                                      <li class="nav-item dropdown">
                                          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?></a>
                                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
                                           <a class="dropdown-item" href="#"><?php echo $_SESSION['role']; ?></a>
                                            <a class="dropdown-item" href="edit_form.php?ID=<?php echo $_SESSION['id']; ?>">Edit account</a>
                                            <a class="dropdown-item red" href="logout.php">Logout</a>
                                         </div>
                                       </li>
                                     </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Welcome Blog Slide Area Start -->
    <section class="welcome-blog-post-slide owl-carousel">
        <!-- Single Blog Post -->
        <div class="single-blog-post-slide bg-img background-overlay-5" style="background-image: url(components/img/bg-img/1.jpg);">
            <!-- Single Blog Post Content -->
            <div class="single-blog-post-content">
                <div class="tags">
                    <a href="#">coup</a>
                </div>
                <h3><a href="#" class="font-pt">Failed coup in Morocco may be an attack against Providence</a></h3>
                <div class="date">
                    <a href="#">February 18, 2020</a>
                </div>
            </div>
        </div>
        <!-- Single Blog Post -->
        <div class="single-blog-post-slide bg-img background-overlay-5" style="background-image: url(components/jinpo.png);">
            <!-- Single Blog Post Content -->
            <div class="single-blog-post-content">
                <div class="tags">
                    <a href="#">live</a>
                </div>
                <h3><a href="#" class="font-pt">Jin Po, Dictator of Khandanyang's missile employment against protesters in Tungan Valley </a></h3>
                <div class="date">
                    <a href="#">March 29, 2020</a>
                </div>
            </div>
        </div>
        <div class="single-blog-post-slide bg-img background-overlay-5" style="background-image: url(components/img/bg-img/2.jpg);">
            <!-- Single Blog Post Content -->
            <div class="single-blog-post-content">
                <div class="tags">
                    <a href="#">politics</a>
                </div>
                <h3><a href="#" class="font-pt">Providence doing best to prevent impeachment of puppet Donald Trump</a></h3>
                <div class="date">
                    <a href="#">January 6, 2020</a>
                </div>
            </div>
        </div>
        <!-- Single Blog Post -->
        <div class="single-blog-post-slide bg-img background-overlay-5" style="background-image: url(components/original5.png);">
            <!-- Single Blog Post Content -->
            <div class="single-blog-post-content">
                <div class="tags">
                    <a href="#">energy</a>
                </div>
                <h3><a href="#" class="font-pt">Original 5 of Ark Society agree on moving to clean energy to further Providence reach</a></h3>
                <div class="date">
                    <a href="#">October 2, 2020</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Blog Slide Area End -->

    <!-- Latest News Marquee Area Start -->
    <div class="latest-news-marquee-area">
        <div class="simple-marquee-container">
            <div class="marquee">
                <ul class="marquee-content-items">
                    <li>
                        <a href="#"><span class="latest-news-time">10:40</span> Kronstadt CEO and daughter killed in mysterious accident</a>
                    </li>
                    <li>
                        <a href="#"><span class="latest-news-time">11:02</span> Cronkite report implicating Providence buried </a>
                    </li>
                    <li>
                        <a href="#"><span class="latest-news-time">12:37</span> Putin to install Providence's Leap technology </a>
                    </li>
                    <li>
                        <a href="#"><span class="latest-news-time">13:59</span> Trump signs tax bill before leaving for Mar-a-Lago</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Latest News Marquee Area End -->

    <!-- Main Content Area Start -->
    <section class="main-content-wrapper section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <!-- Gazette Welcome Post -->
                    <div class="gazette-welcome-post">
                        <!-- Post Tag -->
                        <div class="gazette-post-tag">
                            <a href="#">Politics</a>
                        </div>
                        <h2 class="font-pt">Closer to full American conquest</h2>
                        <p class="gazette-post-date">December 29, 2019</p>
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail my-5">
                            <img src="components/img/blog-img/1.jpg" alt="post-thumb">
                        </div>
                        <!-- Post Excerpt -->
                        <p>With widespread division between the Democrats and Republicans and the Providence puppet Donald Trump in office spreading as much widespread divisive proclamations and actions as possible to help divide the American populace, we are able to much easily install more puppets inside the American system, from the Judiciary to the House and Senate. With the populace and legislators divided and fighting against each other, not much would be focusing on our behind-the-scenes actions. Project 'Trump' has definitely been a success.</p>
                        <!-- Reading More -->
                        <div class="post-continue-reading-share d-sm-flex align-items-center justify-content-between mt-30">
                            <div class="post-continue-btn">
                                <a href="#" class="font-pt">Continue Reading <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="gazette-todays-post section_padding_100_50">
                        <div class="gazette-heading">
                            <h4>pinned news</h4>
                        </div>
                        <!-- Single Today Post -->
                        <div class="gazette-single-todays-post d-md-flex align-items-start mb-50">
                            <div class="todays-post-thumb">
                                <img src="components/janus.jpg" alt="">
                            </div>
                            <div class="todays-post-content">
                                <!-- Post Tag -->
                                <div class="gazette-post-tag">
                                    <a href="#">News</a>
                                </div>
                                <h3><a href="#" class="font-pt mb-2">Former Constant Janus passed away</a></h3>
                                <span class="gazette-post-date mb-2">November 11, 2019</span>
                                <p>Janus, KGB's legendary war spymaster and the former Constant of Providence, was found dead in his house last night sporting a heart attack. The former Constant of Providence was truly a legendary figure. With smarts and merit, he helped build Providence's connections and assets to what it is today. One of his most astounding legacy would be the creation of the Ark Society, an organization designed to help herd the sheep of the rich to help Providence solidify its foundation.</p>
                            </div>
                        </div>
                        <!-- Single Today Post -->
                        <div class="gazette-single-todays-post d-md-flex align-items-start mb-50">
                            <div class="todays-post-thumb">
                                <img src="components/politburo.jpg" alt="">
                            </div>
                            <div class="todays-post-content">
                                <!-- Post Tag -->
                                <div class="gazette-post-tag">
                                    <a href="#">Politics</a>
                                </div>
                                <h3><a href="#" class="font-pt mb-2">China's top leadership in the PSC agree in bill that would help Providence</a></h3>
                                <p class="gazette-post-date mb-2">February 11, 2020</p>
                                <p>In an astounding unanimous vote in the Politburo Standing Committee, consisting of seven of the most powerful men in China, agrees on the bill that would help tens of millions of workers in China. However, with the help of Providence operatives, an underlying clause in the bill would allow Providence to smuggle and launder an enormous amount money and people through China. This decision is truly a hallmark in Providence history.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6">
                    <div class="sidebar-area">
                        <!-- Breaking News Widget -->
                        <div class="breaking-news-widget">
                            <div class="widget-title">
                                <h5>breaking news</h5>
                            </div>
                            <!-- Single Breaking News Widget -->
                            <div class="single-breaking-news-widget">
                                <img src="components/pushed.png" alt="">
                                <div class="breakingnews-title">
                                    <p>breaking news</p>
                                </div>
                                <div class="breaking-news-heading gradient-background-overlay">
                                    <h5 class="font-pt">CEO of Blue Seed killed by VP after VP was threatened by terrorists to have family killed</h5>
                                </div>
                            </div>
                            <!-- Single Breaking News Widget -->
                            <div class="single-breaking-news-widget">
                                <img src="components/miltonfitzpatrick.png" alt="">
                                <div class="breakingnews-title">
                                    <p>breaking news</p>
                                </div>
                                <div class="breaking-news-heading gradient-background-overlay">
                                    <h5 class="font-pt">Milton-Fitzpatrick Bank's recent drastic stock fall</h5>
                                </div>
                            </div>
                        </div>

                        <!-- Don't Miss Widget -->
                        <div class="donnot-miss-widget">
                            <div class="widget-title">
                                <h5>Don't miss</h5>
                            </div>
                            <!-- Single Don't Miss Post -->
                            <div class="single-dont-miss-post d-flex mb-30">
                                <div class="dont-miss-post-thumb">
                                    <img src="components/council.jpg" alt="">
                                </div>
                                <div class="dont-miss-post-content">
                                    <a href="#" class="font-pt">EU council reunites</a>
                                    <span>March 22, 2020</span>
                                </div>
                            </div>
                            <!-- Single Don't Miss Post -->
                            <div class="single-dont-miss-post d-flex mb-30">
                                <div class="dont-miss-post-thumb">
                                    <img src="components/img/blog-img/dm-2.jpg" alt="">
                                </div>
                                <div class="dont-miss-post-content">
                                    <a href="#" class="font-pt">Use COVID as an opportunity</a>
                                    <span>June 29, 2020</span>
                                </div>
                            </div>
                            <!-- Single Don't Miss Post -->
                            <div class="single-dont-miss-post d-flex mb-30">
                                <div class="dont-miss-post-thumb">
                                    <img src="components/img/blog-img/bn-2.jpg" alt="">
                                </div>
                                <div class="dont-miss-post-content">
                                    <a href="#" class="font-pt">Theresa May stripped of power, just as planned</a>
                                    <span>July 4, 2020</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Area End -->


    <!-- Footer Area Start -->
    <footer class="footer-area bg-img background-overlay" style="background-image: url(img/bg-img/4.jpg);">
        <!-- Top Footer Area -->

        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12">
                        <div class="copywrite-text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved to Providence
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="components/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="components/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="components/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="components/js/plugins.js"></script>
    <!-- Active js -->
    <script src="components/js/active.js"></script>

    <script type="text/javascript">
function oof(){
  Swal.fire({
  title: 'Are you sure?',
  text: "You will be purging ALL accounts in this limited repository.",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#d33',
  cancelButtonColor: '#3085d6',
  confirmButtonText: 'Yes, I am sure'
}).then((result) => {
  if (result.value) {
    Swal.fire({
  title: 'This is irreversible',
  text: "This act is irreversible. Only do this in extreme situations!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#d33',
  cancelButtonColor: '#3085d6',
  confirmButtonText: 'Purge all'
}).then((result) => {
  if (result.value) {
    window.location = "deleteall.php";
  }
})
  }
})
}
</script>

</body>

</html>
