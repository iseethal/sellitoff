<!DOCTYPE html>
<html lang="en">

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

<style>
  @media(max-width:767px) {

.gen-pms-login .content-area .site-main,
.gen-pms-register .content-area .site-main {
    height: inherit;
}

#pms_login,
#pms_register-form,
#pms_recover_password_form,
#pms_new_subscription-form {
    width: 151%;
    padding: 30px 15px;
}

}

</style>

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
    @include('frontend.templates.toastr-notifications')

    <!--========== Header ==============-->
    <br><br>


    @php
        $user = Auth::user();
    @endphp



    <section class="position-relative pb-0">
        <div class="gen-register-page-background" style="background-image: url('images/background/asset-3.jpg');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form id="pms_register-form" class="pms-form"
                        action="{{ route('frontend.profile.profileupdate') }}"
                        method="POST">
                        @csrf

                            <h4>EDIT PROFILE</h4>
                            <input type="hidden" id="pmstkn" name="pmstkn" value="59b502f483"><input type="hidden"
                                name="_wp_http_referer" value="/register/">

                            <input type="radio" style="display: inline-block;" name="user_type" id="user_type"
                                value="1" {{ $user->user_type == 1 ? 'checked' : '' }}
                                data-default-selected="true"><span class="pms-subscription-plan-name ">Seller</span>
                            &nbsp;&nbsp;&nbsp;


                            <input type="radio" style="display: inline-block;" name="user_type" id="user_types"
                                value="2" {{ $user->user_type == 2 ? 'checked' : '' }}>
                            <span class="pms-subscription-plan-name ">Buyer</span>
                            <span>
                                <ul class="pms-form-fields-wrapper pl-0">
                                    <li class="pms-field pms-first-name-field ">
                                        <label for="first_name">First Name</label>
                                        <input id="name" name="name" type="text" value="{{ $user->name }}"
                                            placeholder="first name">
                                    </li>
                                    <li class="pms-field pms-last-name-field ">
                                        <label for="last_name">Last Name</label>
                                        <input id="sur_name" name="sur_name" type="text"
                                            value="{{ $user->sur_name }}" placeholder="last name">
                                    </li>

                                    <li class="pms-field pms-user-login-field ">
                                        <label for="phone">Phone *</label>
                                        <input id="phone" name="phone" type="text" value="{{ $user->phone }}"
                                            placeholder="phone">
                                    </li>

                                    <li class="pms-field pms-user-email-field ">
                                        <label for="email">E-mail *</label>
                                        <input id="email" name="email" type="text" value="{{ $user->email }}"
                                            placeholder="email" readonly>
                                    </li>

                                </ul>


                                <div class="form-button">
                                    <span style="float:left;">
                                        <input type="checkbox" name="show_mobile" id="show_mobile"  value="1" {{ $user->show_mobile == 1 ? 'checked': '' }} class="mb-0" >
                                        <label class="d-inline-block"> Show contact on profile</label>
                                   </span>

                                   <span style="float:right;">
                                        <button type="submit"  class="mb-0" >Update</button>
                                   </span>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer start -->

    @include('frontend.templates.footer')



</body>


</html>
