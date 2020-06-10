<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?php
            if(isset($page['name'])) echo $page['name'];
        ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--jQuery Validate-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <link rel="stylesheet" href="<?= asset('css/mc.css'); ?>" >
    <script src="<?= asset('js/mc.js'); ?>" ></script>

    <script>
        $(document).ready(function() {

            <?php

                /* BackEnd Errors*/
          /*      if(request()->exists('token') && empty($errors->keys())){
                    print('
                       $("textarea:not(:disabled)").closest("div").addClass("has-success");
                    ');
                }
                else{
                    foreach ($errors->keys() as $error_field){
                        print('
                        $("[name='.$error_field.']").closest("div").removeClass("has-success");
                        $("[name='.$error_field.']").closest("div").addClass("has-error");
                        ');
                    }
                }*/
                /* BackEndErrors*/

                session()->get('is_active_listener') == null ? $is_active_listener = 0 : $is_active_listener = 1;
                session()->exists('token') == null ? $is_exists_token = 0 : $is_exists_token = 1;
                session()->get('guest_waiting') == null ? $guest_waiting = 0 : $guest_waiting = 1;
                //session()->get('start_api_listener') == null ? $start_api_listener = 0 : $start_api_listener = 1;
                //session()->get('is_active_listener') ||

                if($is_active_listener || $is_exists_token || $guest_waiting){
                    print('
                        if('.$is_active_listener.') {
                           $(\'#submit\').hide();
                           $(\'#stop\').show();
                           $(\'#recording_status\').show();
                        }
                        else{
                          $ (\'#submit\').show();
                          $(\'#stop\').hide();

                          if(\'.$guest_waiting.\'){
                            $(\'#submit\').hide();
                            $(\'#recording_status\').show();
                            $(\'#guest_waiting\').show();
                          }
                        }
                        if('.$is_exists_token.') {
                           $(\'#token\').prop( "disabled", true );
                           $(\'#label_token_default\').hide();
                           $(\'#label_token_in_use\').show();
                        }
                        else{
                           $(\'#token\').val("");
                           $(\'#label_token_default\').show();
                           $(\'#label_token_in_use\').hide();
                        }

                    ');
                }

                if(!empty($data['refresh_rate']) && $data['refresh_rate'] >-1){
                    print('
                       setTimeout(function(){
                            location.reload()
                       }, '.$data['refresh_rate'].');
                    ');
                }

                ?>

                });
   </script>

</head>
<body class="mc-body-background-color">

<div class="container">
<nav class="navbar navbar-inverse ">
    <div class="container-fluid mc-dark-color-background">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= action('ApiController@home'); ?>">WAP Dev Client Api Listener</a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="<?= action('ApiController@home'); ?>">Home</a></li>
                <li><a href="<?= action('ApiController@products'); ?>">Products</a></li>
                <li><a href="<?= action('ApiController@orders'); ?>">Orders</a></li>
            </ul>
        </div>
    </div>
</nav>
</div>

<div class="container mc-min-height-middle">