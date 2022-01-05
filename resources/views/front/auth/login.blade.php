@extends('front.layouts.master')
@section('main')
<main id="main">
	<!--main area-->
<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>login</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">						
                        <div class="login-form form-item form-stl">
                            <form name="frm-login">
                                @method('post')
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Log in to your account</h3>										
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-uname">Email Address:</label>
                                    <input type="text" id="email" name="email" placeholder="Type your email address">
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">Password:</label>
                                    <input type="password" id="password" name="password" placeholder="************">
                                </fieldset>
                                
                                <fieldset class="wrap-input">
                                    <label class="remember-field">
                                        <input class="frm-input " name="remember" id="remember" value="forever" type="checkbox"><span>Remember me</span>
                                    </label>
                                    <a class="link-function left-position" href="#" title="Forgotten password?">Forgotten password?</a>
                                </fieldset>
                                <input type="button" class="btn btn-submit" onclick="login()" value="Login" name="submit">
                            </form>
                        </div>												
                    </div>
                </div><!--end main products area-->		
            </div>
        </div><!--end row-->

    </div><!--end container-->

</main>
<!--main area-->
</main>

@endsection
@section('script')
<script>
    // function login()
    // {
    //     // Make a request for a user with a given ID
    //     axios.post('/auth/login/',{
    //     email: document.getElementById('email').value,
    //     password: document.getElementById('password').value,
    //     remember_me: document.getElementById('remember').checked,
    //     guard: '{{$guard}}'
    //     }).then(function (response) {
    //     console.log(response);
    //     // toastr.success(response.data.message);
    //     // window.location.href = '/dashboard'

    //     }).catch(function (error) {
    //         // withCredentials: true
    //         console.log(error);
    //         toastr.error(error.response.data.message);
    //     })

    // }

    function login()
    {
        // Make a request for a user with a given ID
        axios('/' + window.location.pathname.split('/')[1] + '/auth/login/',{
            method: "post",
            data: {
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                remember_me: document.getElementById('remember').checked,
                guard: '{{$guard}}'
            },
            withCredentials: true
        }).then(function (response) {
            // console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/'
        }).catch(function (error) {
            // console.log(error);
            if (error.response.status == 422) {
                var object = error.response.data.data.errors;
                for (const key in object) {
                    var message = object[key][0]
                    break;
                }
                toastr.error(message);
            }else{
                toastr.error(error.response.data.message);
            }
     
        })

    }
</script>
@endsection