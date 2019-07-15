<?php
    $title = 'Welcome';
?>

@extends('layouts.app')

@section('content')

<div class="home">
    <div class="hero-banner">
        <div class="container">
            <div class="offset-md-3 col-md-9 offset-lg-5 col-lg-7">
                <img class="bubble" src="img/register.png"/>
                <div class="bubble-text">iTalk is a FREE messaging and calling app available for Android and iOS.                       
                    <img src="img/http___pluspng.png" class="appstore-thumbnail">
                </div>
            </div>
            <br/>
            <br/>
            <footer class="footer-sm">
                <a href=""">Help</a> 
                &emsp;| &emsp;
                <a href="">User Agreement</a>
                &emsp;| &emsp;
                <a href="">Privacy Policy</a>
            </footer>
        </div>
    </div>

    <br/>

    <div class="about-us">
        <div class="container row col-sm-12 col-md-6 col-lg-12">
            <div class="col-sm-12 col-md-6 col-lg-8 about">
                <h2>About Us</h2>
                <div class="description">
                    iTalk allows you to easily connect with family and friends across countries. It has a lot of functions to communicate with people by using text, voice, video calls, Moments, photo sharing, and games. The individual chats and group chats are separated in two columns and let you connect with people conveniently.
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <img src="img/image.png" id="phone"/>
            </div>
        </div> 
    </div>

    <br/>

    <div class="features">
       <div class="container row col-xs-4 col-md-12 col-lg-12">
            <div class="col-xs-4 col-md-4 col-lg-4">
                <center><img src="img/profile-01.png"/>
                <p>Access your wallet, favourites, "Moments" posts, settings, and stickers!</p></center>
            </div>
            <div class="col-xs-4 col-md-4 col-lg-4">
                <center><img src="img/moment.png"/>
                <p>Update your friends and family through "Moments".</p></center>
            </div>
            <div class="col-xs-4 col-md-4 col-lg-4">
                <center><img src="img/poll-01.png"/>
                <p>Create polls in group chats.</p></center>
            </div>
        </div>
    </div>

    <br/>

    <div class="contact-us">
        <div class="container row col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2>Contact Us</h3>
                <br/>
                <br/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 ">
                <p>
                    <img src="img/logo_sample.png" alt="logo here"/>
                </p>
                <p>
                    WE ADVERTISING SDN BHD<br>
                    07-5550135<br>
                    No 26, Jalan Persiaran Skudai 8,<br>
                    Pusat Perusahaan Skudai 8,<br>
                    81300 Johor Bahru, Johor.
                </p>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
                <div class="form-contact">
                    <div class="form-style">
                        <center>
                            <form action="">
                                <input type="text" name="name" placeholder="Name"/>
                                <input type="email" name="email" placeholder="Email"/>
                                <input type="text" name="message" placeholder="Message"/>
                                <button type="submit">Send Message</button>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>

<script type="text/javascript">
    $(window).scroll(function(){
        $(".footer-sm").css("opacity", 2 - $(window).scrollTop() / 350);
    });
</script>

@endsection