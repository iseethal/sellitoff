<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');

body{
    font-family: 'Lato', sans-serif;
    color: #747474;
    overflow-x: hidden;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color:#161616;
}

a{
    text-decoration: none;
}

h1, h2, h3, h4, h5, h6{
    font-family: 'Open Sans', sans-serif;
    color: #cca123;
    font-weight: bold;
}

h1 { 
    font-size: clamp(48px, calc(48px + (48 - 16) * ((100vw - 320px) / (1920 - 320))), 48px);
    margin: 0;
}
  
h2 {
    font-size: clamp(36px, calc(36px + (36 - 16) * ((100vw - 320px) / (1920 - 320))), 36px);
    margin: 0;
}
  
h3 {
    font-size: clamp(24px, calc(24px + (24 - 16) * ((100vw - 320px) / (1920 - 320))), 24px);
    margin: 0;
}
  
h4 {
    font-size: clamp(20px, calc(20px + (20 - 16) * ((100vw - 320px) / (1920 - 320))), 20px);
    margin: 0;
}
  
h5 {
    font-size: clamp(18px, calc(18px + (18 - 16) * ((100vw - 320px) / (1920 - 320))), 18px);
    margin: 0;
}
  
h6 {
    font-size: clamp(16px, calc(16px + (16 - 16) * ((100vw - 320px) / (1920 - 320))), 16px);
    margin: 0;
}
  

p{
    font-size: 15px;
    line-height: 28px;
}
ul li, ol li{
    line-height: 28px;
}

.container{
    max-width: 1300px;
    margin: 0 auto;
}

.text-center{
    text-align: center;
}

.text-white {
    color: #ffffff;
}

.col-kdf{
    display: flex; 
    justify-content: center;
}

.h3-text{
    margin: 60px 0;
}

.mt-60{ margin-top: 60px; } .mt-55{ margin-top: 55px; } .mt-50{ margin-top: 50px; } 
.mt-40{ margin-top: 40px; } .mt-35{ margin-top: 35px; } .mt-30{ margin-top: 30px; } 
.mt-25{ margin-top: 25px; } .mt-20{ margin-top: 20px; } .mt-15{ margin-top: 15px; } 
.mt-10{ margin-top: 10px; } .mt-5{ margin-top: 5px; } .mt-0{ margin-top: 0px;}

.mb-60{ margin-bottom: 60px; } .mb-55{ margin-bottom: 55px; } .mb-50{ margin-bottom: 50px; } 
.mb-40{ margin-bottom: 40px; } .mb-35{ margin-bottom: 35px; } .mb-30{ margin-bottom: 30px; } 
.mb-25{ margin-bottom: 25px; } .mb-20{ margin-bottom: 20px; } .mb-15{ margin-bottom: 15px; } 
.mb-10{ margin-bottom: 10px; } .mb-5{ margin-bottom: 5px; } .mb-0{ margin-bottom: 0px;}

.ml-60{ margin-left: 60px; } .ml-55{ margin-left: 55px; } .ml-50{ margin-left: 50px; } 
.ml-40{ margin-left: 40px; } .ml-35{ margin-left: 35px; } .ml-30{ margin-left: 30px; } 
.ml-25{ margin-left: 25px; } .ml-20{ margin-left: 20px; } .ml-15{ margin-left: 15px; } 
.ml-10{ margin-left: 10px; } .ml-5{ margin-left: 5px; } .ml-0{ margin-left: 0px;}

.mr-60{ margin-right: 60px; } .mr-55{ margin-right: 55px; } .mr-50{ margin-right: 50px; } 
.mr-40{ margin-right: 40px; } .mr-35{ margin-right: 35px; } .mr-30{ margin-right: 30px; } 
.mr-25{ margin-right: 25px; } .mr-20{ margin-right: 20px; } .mr-15{ margin-right: 15px; } 
.mr-10{ margin-right: 10px; } .mr-5{ margin-right: 5px; } .mr-0{ margin-right: 0px;}

.pt-60{ padding-top: 60px; } .pt-55{ padding-top: 55px; } .pt-50{ padding-top: 50px; } 
.pt-40{ padding-top: 40px; } .pt-35{ padding-top: 35px; } .pt-30{ padding-top: 30px; } 
.pt-25{ padding-top: 25px; } .pt-20{ padding-top: 20px; } .pt-15{ padding-top: 15px; } 
.pt-10{ padding-top: 10px; } .pt-5{ padding-top: 5px; } .pt-0{ padding-top: 0px;}

.pb-60{ padding-bottom: 60px; } .pb-55{ padding-bottom: 55px; } .pb-50{ padding-bottom: 50px; } 
.pb-40{ padding-bottom: 40px; } .pb-35{ padding-bottom: 35px; } .pb-30{ padding-bottom: 30px; } 
.pb-25{ padding-bottom: 25px; } .pb-20{ padding-bottom: 20px; } .pb-15{ padding-bottom: 15px; } 
.pb-10{ padding-bottom: 10px; } .pb-5{ padding-bottom: 5px; } .pt-0{ padding-bottom: 0px;}

.pl-60{ padding-left: 60px; } .pl-55{ padding-left: 55px; } .pl-50{ padding-left: 50px; } 
.pl-40{ padding-left: 40px; } .pl-35{ padding-left: 35px; } .pl-30{ padding-left: 30px; } 
.pl-25{ padding-left: 25px; } .pl-20{ padding-left: 20px; } .pl-15{ padding-left: 15px; } 
.pl-10{ padding-left: 10px; } .pl-5{ padding-left: 5px; } .pl-0{ padding-left: 0px;}

.pr-60{ padding-right: 60px; } .pr-55{ padding-right: 55px; } .pr-50{ padding-right: 50px; } 
.pr-40{ padding-right: 40px; } .pr-35{ padding-right: 35px; } .pr-30{ padding-right: 30px; } 
.pr-25{ padding-right: 25px; } .pr-20{ padding-right: 20px; } .pr-15{ padding-right: 15px; } 
.pr-10{ padding-right: 10px; } .pr-5{ padding-right: 5px; } .pr-0{ padding-right: 0px;}

.w-100{ width: 100%; } .w-90{ width: 90%; } .w-80{ width: 80%; }
.w-70{ width: 70%; } .w-60{ width: 60%; } .w-50{ width: 50%; }
.w-40{ width: 40%; } .w-30{ width: 30%; } .w-20{ width: 20%; }
.w-10{ width: 10%; }

.content-chat{
    margin-right: 30px;
    margin-left: 30px;
    display: flex;
    justify-content: center;
    gap: 25px;
    padding: 20px;
}

.content-chat .content-chat-user{
    background-color: white;
    padding: 15px;
    border-radius: 25px;
    width: 350px;
}

.content-chat .content-chat-user .head-search-chat{
    background-color: #cca123;
    margin: -15px -15px 15px -15px;
    border-radius: 25px 25px 0 0;
    padding: 10px 15px;
}

.content-chat .content-chat-user .head-search-chat h4{
    color: #ffffff;
}

.content-chat .content-chat-user .search-user{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 25px;
}

.content-chat .content-chat-user .search-user input{
    padding: 10px 15px;
    border-radius: 25px;
    border: 2px solid #949494;
    outline: none;
    width: 100%;
}

.content-chat .content-chat-user .search-user span i{
    position: absolute;
    top: 10px;
    right: 15px;
}

.content-chat .content-chat-user .list-search-user-chat {
    display: flex;
    flex-direction: column;
    gap: 15px;
    height: 100%;
    max-height: 430px;
    overflow-y: auto;
}

.content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar{
    -webkit-appearance: none;
}

.content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar:vertical {
    width:10px;
}

.content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-button:increment,
.content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-button {
    display: none;
} 

.content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar:horizontal {
    height: 10px;
}

.content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-thumb {
    background-color: #cca123;
    border-radius: 20px;
    border: 2px solid #f1f2f3;
}

.content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-track {
    border-radius: 10px;  
}

.content-chat .content-chat-user .list-search-user-chat .user-chat{
    display: flex;
    gap: 15px;
    padding: 10px 15px;
    border-radius: 25px;
    cursor: pointer;
}

.content-chat .content-chat-user .list-search-user-chat .user-chat:hover{
    background-color: #c5e2e8;
}

.content-chat .content-chat-user .list-search-user-chat .user-chat.active{
    background-color: #c5e2e8;
}

.content-chat .content-chat-user .list-search-user-chat .user-chat .user-chat-img{
    position: relative;
    width: 60px;
    height: 60px;
    border-radius: 50%;
}

.content-chat .content-chat-user .list-search-user-chat .user-chat .user-chat-img img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
}

.content-chat .content-chat-user .list-search-user-chat .user-chat .user-chat-img .online{
    position: absolute;
    bottom: 5px;
    right: 5px;
    width: 10px;
    height: 10px;
    font-size: 20px;
    background-color: #009975;
    border-radius: 50%;
    border: 3px solid #ffffff;  
    box-shadow: 1px 1px 15px -4px #000;
}

.content-chat .content-chat-user .list-search-user-chat .user-chat .user-chat-img .offline{
    position: absolute;
    bottom: 5px;
    right: 5px;
    width: 10px;
    height: 10px;
    font-size: 20px;
    background-color: #bb4315;
    border-radius: 50%;    
    border: 3px solid #ffffff;
    box-shadow: 1px 1px 15px -4px #000;
}

.content-chat .content-chat-message-user{
    display: none;
    background-color: #ffffff;
    padding: 15px;
    border-radius: 25px;
    max-width: 700px;
    width: 100%;
}

.content-chat .content-chat-message-user.active{
    display: block;
}

/* .content-chat .content-chat-message-user.d-none{
    display: none;
} */

.content-chat .content-chat-message-user .head-chat-message-user{
    display: flex;
    gap: 15px;
    padding: 10px 15px;
    border-radius: 25px 25px 0 0;
    background-color: #cca123;
    margin-top: -15px;
    margin-left: -15px;
    margin-right: -15px;
}

.content-chat .content-chat-message-user .head-chat-message-user img{
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
}

.content-chat .content-chat-message-user .head-chat-message-user .message-user-profile small {
    display: flex;
    gap: 5px;
}

.content-chat .content-chat-message-user .head-chat-message-user .message-user-profile small .online{
    width: 10px;
    height: 10px;
    font-size: 20px;
    background-color: #009975;
    border-radius: 50%;
    border: 3px solid #ffffff;  
    box-shadow: 1px 1px 15px -4px #000;
}

.content-chat .content-chat-message-user .head-chat-message-user .message-user-profile small .offline{
    width: 10px;
    height: 10px;
    font-size: 20px;
    background-color: #bb4315;
    border-radius: 50%;
    border: 3px solid #ffffff;  
    box-shadow: 1px 1px 15px -4px #000;
}
.content-chat .content-chat-message-user .body-chat-message-user {
    display: flex;
    flex-direction: column;
    gap: 15px;
    box-sizing: border-box;
    padding: 15px;
    height: 400px;
    margin: 15px 0;
    overflow: auto;
    background-color: #ececec;
    border-radius: 10px;
}

.content-chat .content-chat-message-user .body-chat-message-user::-webkit-scrollbar{
    -webkit-appearance: none;
}

.content-chat .content-chat-message-user .body-chat-message-user::-webkit-scrollbar:vertical {
    width:10px;
    border-radius: 25px;
}

.content-chat .content-chat-message-user .body-chat-message-user::-webkit-scrollbar-button:increment,
.content-chat .content-chat-message-user .body-chat-message-user::-webkit-scrollbar-button {
    display: none;
} 

.content-chat .content-chat-message-user .body-chat-message-user::-webkit-scrollbar:horizontal {
    height: 10px;
}

.content-chat .content-chat-message-user .body-chat-message-user::-webkit-scrollbar-thumb {
    background-color: #cca123;
    border-radius: 20px;
    border: 2px solid #f1f2f3;
}

.content-chat .content-chat-message-user .body-chat-message-user::-webkit-scrollbar-track {
    border-radius: 10px;  
}

.content-chat .content-chat-message-user .body-chat-message-user .message-user-left{
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.content-chat .content-chat-message-user .body-chat-message-user .message-user-left .message-user-left-img{
    display: flex;
    gap: 10px;
    justify-content: start;
    align-items: center;
}

.content-chat .content-chat-message-user .body-chat-message-user .message-user-left .message-user-left-img img{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}

.content-chat .content-chat-message-user .body-chat-message-user .message-user-left .message-user-left-text{
    position: relative;
    padding: 15px 25px;
    background-color: #ffffff;
    border-radius: 15px;
    color: #949494;
    max-width: 250px;
}

.content-chat .content-chat-message-user .body-chat-message-user .message-user-left .message-user-left-text::before{
    content: '';
    position: absolute;
    top: -26px;
    left: 15px;
    border-right: 15px solid transparent;
    border-top: 15px solid transparent;
    border-left: 0px solid transparent;
    border-bottom: 15px solid #ffffff;
}

.content-chat .content-chat-message-user .body-chat-message-user .message-user-right{
    display: flex;
    flex-direction: column;
    align-items: end;
    gap: 15px;
}

.content-chat .content-chat-message-user .body-chat-message-user .message-user-right .message-user-right-img{
    display: flex;
    gap: 10px;
    justify-content: end;
    align-items: center;
}

.content-chat .content-chat-message-user .body-chat-message-user .message-user-right .message-user-right-img img{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}

.content-chat .content-chat-message-user .body-chat-message-user .message-user-right .message-user-right-text{
    position: relative;
    padding: 15px 25px;
    background-color: #c5e2e8;
    border-radius: 15px;
    color: #949494;
    width: 250px;
}

.content-chat .content-chat-message-user .body-chat-message-user .message-user-right .message-user-right-text::before{
    content: '';
    position: absolute;
    top: -26px;
    right: 15px;
    border-right: 0px solid transparent;
    border-top: 15px solid transparent;
    border-left: 15px solid transparent;
    border-bottom: 15px solid #c5e2e8;
}

.content-chat .content-chat-message-user .footer-chat-message-user {
    background-color: #c5e2e8;
    padding: 15px 25px;
    border-radius: 15px;
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.content-chat .content-chat-message-user .footer-chat-message-user .message-user-send{
    position: relative;
    width: 100%;
}

.content-chat .content-chat-message-user .footer-chat-message-user .message-user-send input {
    box-sizing: border-box;
    width: 100%;
    padding: 10px 15px;
    border-radius: 25px;
    outline: none;
    border: 2px solid #949494;
}

.content-chat .content-chat-message-user .footer-chat-message-user button{
    font-size: 18px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: none;
    background-color: #cca123;
    color: #ffffff;
    cursor: pointer;
}

.content-chat .content-chat-message-user .footer-chat-message-user button:hover{
    background-color: #daa520;
}

@media (max-width: 913px){
    .content-chat{
        padding: 0px;
    }

    .content-chat .content-chat-user {
        max-width: 300px;
        width: 100%;
    }

    .content-chat .content-chat-message-user {
        background-color: #ffffff;
        padding: 15px;
        border-radius: 25px;
        max-width: 600px;
        width: 100%;
    }
}

@media (max-width: 728px){
    .content-chat {
        display: flex;
        flex-direction: column;
    }

    .content-chat .content-chat-user {
        box-sizing: border-box;
        max-width: 1000px;
        width: 100%;
    }

    .content-chat .content-chat-message-user {
        box-sizing: border-box;
        max-width: 1000px;
        width: 100%;
    }

    .content-chat .content-chat-user .list-search-user-chat {
        box-sizing: border-box;
        max-width: -moz-fit-content;
        max-width: fit-content;
        display: flex;
        flex-direction: row;
        margin: 0 auto;
        overflow-x: auto;
        max-height: -moz-fit-content;
        max-height: fit-content;
        padding: 15px;
    }

    .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar{
        -webkit-appearance: none;
    }
    
    .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar:vertical {
        width:10px;
    }
    
    .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-button:increment,
    .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-button {
        display: none;
    } 
    
    .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar:horizontal {
        height: 10px;
    }
    
    .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-thumb {
        background-color: #cca123;
        border-radius: 20px;
        border: 2px solid #f1f2f3;
    }
    
    .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-track {
        border-radius: 10px;  
    }
    

    .content-chat .content-chat-user .list-search-user-chat .user-chat {
        width: 60px;
        height: 60px;
        padding: 10px;
        background-color: #cca123;
        max-height: -moz-fit-content;
        max-height: fit-content;
        border-radius: 50%;
    }

    .content-chat .content-chat-user .list-search-user-chat .user-chat .user-chat-text {
        display: none;
    }
}

</style>

<body>

    <div class="content-chat mt-20">
        <div class="content-chat-user">
            <div class="head-search-chat">
                <h4 class="text-center">All Chats</h4>
            </div>
            
            <div class="search-user mt-30">
                <input id="search-input" type="text" placeholder="Search..." name="search" class="search">
                <span>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
            </div>

            <div class="list-search-user-chat mt-20">


                @php
                $name        = "janet";
                $user_id     = Auth::id();
                $user_name   = Auth::user()->name;
                $product_id  = Request()->id;

                $product_owner       = App\Models\Product::where('id',$product_id)->pluck('user_id')->first();
                $product_owner_name  = App\Models\User::where('id',$product_owner)->pluck('name')->first();
                $all_chats           = App\Models\Chat::where('sender',$user_id)->select('reciever')->groupBy('reciever')->get();
                @endphp

                @foreach ($all_chats as $chat)

                    @php
                    $receiver       = $chat->reciever;
                    $receiver_name  = App\Models\User::where('id',$receiver)->pluck('name')->first();
                    @endphp 
                    
                    <a href="{{ route('frontend.product.chat', ['id' => $product_id]) }}">
                        <div class="user-chat" data-username="">
                            <div class="user-chat-img">
                                <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                                <div class="offline"></div>
                            </div>
                            <div class="user-chat-text">
                                <p class="mt-0 mb-0"><strong>{{ $receiver_name }}</strong></p>
                                <!-- <small>{{ $name }}</small> -->
                            </div>
                        </div>                      
                    </a>                    
                                       
                @endforeach

            </div>
        </div>
        
        
        <div class="content-chat-message-user" data-username="">
            <div class="head-chat-message-user">
                <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="message-user-profile">
                    <p class="mt-0 mb-0 text-white"><strong>{{ $product_owner_name }}</strong></p>
                    <!-- <small class="text-white"><p class="offline  mt-0 mb-0"></p>Offline</small> -->
                </div>
            </div>

            

            @php
            $chats = App\Models\Chat::orderBy('id','desc')->where('sender',$user_id)->where('product_id',$product_id)->get();

           
            @endphp
        
            
            <div class="body-chat-message-user">
           
                @php
                foreach ($chats as $chat){

                    $key      = App\Models\Chat::orderBy('id','desc')->pluck('chat_key')->first();
                    $messages = App\Models\Chat::where('chat_key',$key)->get();
                }
                @endphp

                
            @if (isset($messages))
                    
                @foreach ($messages as $message)
                    
                    @php
                    $reciever_name = App\Models\User::where('id',$message->reciever)->pluck('name')->first();
                    @endphp

                    @if ($message->reciever == $user_id)

                        <div class="message-user-left">
                            <div class="message-user-left-img">
                                <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                                <p class="mt-0 mb-0"><strong> {{ $reciever_name }}</strong></p>
                                <!-- <small>{{ $message->time_send }}</small> -->
                            </div>
                            <div class="message-user-left-text">
                                <strong>{{ $message->message }}</strong>
                            </div>
                        </div>
                    
                    @else 

                        <div class="message-user-right">
                            <div class="message-user-right-img">
                                <p class="mt-0 mb-0"><strong>{{ $user_name }}</strong></p>
                                <!-- <small>{{ $message->time_send }}</small> -->
                                <img src="https://images.pexels.com/photos/2117283/pexels-photo-2117283.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                            </div>
                            <div class="message-user-right-text">
                                <strong>{{ $message->message }}</strong>
                            </div>
                        </div>

                    @endif

                @endforeach
            @else

                <div class="content-chat mt-20">
                    <div class="content-chat-user" style="display: none;">
                        <!-- <div class="head-search-chat" style="display: none;">
                            <h4 class="text-center">Chat Finder</h4>
                        </div>
                        <div class="search-user mt-30" >
                            <input id="search-input" type="text" placeholder="Search..." name="search" class="search">
                            <span>
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div> -->
            
                        <div class="list-search-user-chat mt-20">
                            <div class="user-chat" data-username="Maria Dennis" >
                                <div class="user-chat-img">
                                    <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                                    <div class="offline"></div>
                                </div>
                                
                                <div class="user-chat-text">
                                    <p class="mt-0 mb-0"><strong>Maria Dennis</strong></p>
                                    <small>Hi, how are you?</small>
                                </div>
                            </div>
            
                            <div class="user-chat" data-username="Jorge Harrinson" >
                                <div class="user-chat-img">
                                    <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                                    <div class="online"></div>
                                </div>
                                
                                <div class="user-chat-text">
                                    <p class="mt-0 mb-0"><strong>Jorge Harrinson</strong></p>
                                    <small>Hi, how are you?</small>
                                </div>
                            </div>
            
                            <div class="user-chat" data-username="Carla Terry" >
                                <div class="user-chat-img">
                                    <img src="https://images.pexels.com/photos/1239291/pexels-photo-1239291.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                                    <div class="offline"></div>
                                </div>
                                
                                <div class="user-chat-text">
                                    <p class="mt-0 mb-0"><strong>Carla Terry</strong></p>
                                    <small>Hi, how are you?</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

            @endif

         </div>

            <form action="{{ route('frontend.product.storechat') }}" method="POST" class="msger-inputarea">
                @csrf
                <div class="footer-chat-message-user">
                    <div class="message-user-send">
                        <input type="text" class="msger-input" id="message" name="message" placeholder="Enter your message...">
                        <input type="hidden" class="msger-input" id="product_id" name="product_id" value="{{ Request()->id }}" placeholder="">
                    </div>
                    <button type="submit" onclick="submit_chat();">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
            </form>

        </div>

      
    </div>

<script>

document.addEventListener('DOMContentLoaded', () => {
            const userChats = document.querySelectorAll('.user-chat');
            const chatMessages = document.querySelectorAll('.content-chat-message-user');

            userChats.forEach((userChat) => {
                userChat.addEventListener('click', () => {
                    const selectedUsername = userChat.getAttribute('data-username');

                    chatMessages.forEach((chatMessage) => {
                        const messageUsername = chatMessage.getAttribute('data-username');

                        if (messageUsername === selectedUsername) {
                            chatMessage.classList.add('active');
                        } else {
                            chatMessage.classList.remove('active');
                        }
                    });

                    userChats.forEach((chat) => {
                        chat.classList.remove('active');
                    });
                    userChat.classList.add('active');
                });
            });

            // Activar el primer elemento user-chat inicialmente
            userChats[0].classList.add('active');
            chatMessages[0].classList.add('active');
        });

</script>

    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

   

    <script>

        function submit_chat() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            event.preventDefault();
            // var message = $('#message').val();
            var message    = document.getElementById("message").value;
            var product_id = document.getElementById("product_id").value;

            $(document).ready(function() {

                $.ajax({
                    type: 'POST',
                    url: "{{ route('frontend.product.storechat') }}",
                    data: {

                        message    : message,
                        product_id :product_id,
                    },
                    success: function(data) {

                        document.getElementById("message").value = "";
                        window.location.reload();
                    }
                });
            });

        }
    </script>
</script>
    
</body>
</html>