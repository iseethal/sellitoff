<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from template.gentechtreedesign.com/html/streamlab/red-html/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Jul 2023 12:55:03 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sellitoff</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- CSS bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!--  Style -->
    <link rel="stylesheet" href="css/style.css" />
    <!--  Responsive -->
    <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>

    <!--=========== Loader =============-->
    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="images/logo-1.png" alt="loading">
        </div>
    </div>
    <!--=========== Loader =============-->

    <!--========== Header ==============-->

    @include('frontend.templates.header')

    <!--========== Header ==============-->

    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('images/background/contact.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                                contact us
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">contact us</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- Icon-Box Start -->
    <section class="gen-section-padding-3">
        <div class="container container-2">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="gen-icon-box-style-1">
                        <div class="gen-icon-box-icon">
                            <span class="gen-icon-animation">
                                <i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <div class="gen-icon-box-content">
                            <h3 class="pt-icon-box-title mb-2">
                                <span>Our Location</span>
                            </h3>
                            <p class="gen-icon-box-description">The Queen's Walk, Bishop's, London SE1 7PB, United
                                Kingdom</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mt-4 mt-md-0">
                    <div class="gen-icon-box-style-1">
                        <div class="gen-icon-box-icon">
                            <span class="gen-icon-animation">
                                <i class="fas fa-phone-alt"></i></span>
                        </div>
                        <div class="gen-icon-box-content">
                            <h3 class="pt-icon-box-title mb-2">
                                <span>call us at</span>
                            </h3>
                            <p class="gen-icon-box-description">+ (567) 1234-567-8900<br>+ (567) 1234-567-8901</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12 mt-4 mt-xl-0">
                    <div class="gen-icon-box-style-1">
                        <div class="gen-icon-box-icon">
                            <span class="gen-icon-animation">
                                <i class="far fa-envelope"></i></span>
                        </div>
                        <div class="gen-icon-box-content">
                            <h3 class="pt-icon-box-title mb-2">
                                <span>Mail us</span>
                            </h3>
                            <p class="gen-icon-box-description">info@gentechtree.com<br>info2@gentechtree.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Icon-Box End -->

    <!-- Map Start -->
    <Section class="gen-section-padding-3 gen-top-border">
        <div class="container container-2">
            <div class="row">
                <div class="col-xl-6">
                    <h2 class="mb-5">get in touch</h2>
                    <form>
                        <div class="row gt-form">
                            <div class="col-md-6 mb-4"><input type="text" name="first_name" placeholder="Your Name">
                            </div>
                            <div class="col-md-6 mb-4"><input type="email" name="your-email" placeholder="Email"></div>
                            <div class="col-md-6 mb-4"><input type="text" name="your-Cell-phone"
                                    placeholder="Cell Phone">
                            </div>
                            <div class="col-md-6 mb-4"><input type="text" name="your-Venue" placeholder="Venue"></div>
                            <div class="col-md-12 mb-4"><textarea name="your-message" rows="6"
                                    placeholder="Your Message"></textarea><br>
                                <input type="submit" value="Send" class="mt-4">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-6">
                    <div style="width: 100%"><iframe width="100%" height="550" frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?width=100%25&amp;height=550&amp;hl=en&amp;q=+(My%20BusiLondon%20Eye,%20London,%20United%20Kingdomness%20Name)&amp;t=&amp;z=9&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </Section>
    <!-- Map End -->

    <!-- footer start -->
    @include('frontend.templates.footer')
    <!-- footer End -->

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->

</body>

</html>