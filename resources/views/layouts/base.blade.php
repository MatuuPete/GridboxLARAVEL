<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8" />
    
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    	<title>Grid Box -Libres</title>
    	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />


    </head>
    <style>
    
        body{
            background-color: black;
        }
        p{
            font-size:20px;
        }
    </style>
    <body>
    <div class="wrapper">
        <div class="sidebar" data-background-color="white" data-active-color="danger">
        	<div class="sidebar-wrapper">
                <div class="logo">
                    <a href="/" class="simple-text" style="font-size:25px; color:black; font-family:Lucida Console;">
                        <img src="/storage/images/logo.png" alt=""><br><br>
                        Grid Box
                        
                    </a>
                </div>
                    <ul class="nav" style="text-align:center; font-size:45px; ">
                    @if (Auth::check())
                        
                        <li class="{{ '/' == request()->path() ? 'active' : ''}}">
                            <a href="/">
                               
                                <p style="font-family:monospace; font-size:15px;">Home</p>
                            </a>
                        </li>
                       
                        <li class="{{ 'animal' == request()->path() ? 'active' : ''}}">
                            <a href="/animal">
                            
                                <p style="font-family:monospace; font-size:15px;" >Animals</p>
                            </a>
                        </li>
                        <li class="{{ 'rescuer' == request()->path() ? 'active' : ''}}">
                            <a href="/rescuer">
                               
                                <p style="font-family:monospace; font-size:15px;" >Rescuer</p>
                            </a>
                        </li>
                        <li class="{{ 'shelter_personnel' == request()->path() ? 'active' : ''}}">
                            <a href="/shelter_personnel">
                               
                                <p style="font-family:monospace; font-size:15px;" >Personnel</p>
                            </a>
                        </li>
                        <li class="{{ 'disease_injury' == request()->path() ? 'active' : ''}}">
                            <a href="/disease_injury">
                             
                                <p style="font-family:monospace; font-size:15px;" >Animal Status</p>
                            </a>
                        </li>
                        <li class="{{ 'adopter' == request()->path() ? 'active' : ''}}">
                            <a href="/adopter">
                                
                                <p style="font-family:monospace; font-size:15px;" >Adopter</p>
                            </a>
                        </li>
                        <li class="{{ 'pet_lover' == request()->path() ? 'active' : ''}}">
                            <a href="/pet_lover">
                         
                                <p style="font-family:monospace; font-size:15px;" >Graduate Pets</p>
                            </a>
                        </li>
                        <li class="{{ 'dashboard' == request()->path() ? 'active' : ''}}">
                            <a href="/dashboard" >
                               
                                <p style="font-family:monospace; font-size:15px;" >Dashboard</p>
                            </a>
                        </li>
                    @else
                    <li class="{{ 'login' == request()->path() ? 'active' : ''}}">
                            <a href="/login">
                              
                                <p style="font-family:monospace; font-size:15px;" >Login</p>
                            </a>
                    </li>
                        <li class="{{ '/' == request()->path() ? 'active' : ''}}">
                            <a href="/">
                            
                                <p style="font-family:monospace; font-size:15px;" >Home</p>
                            </a>
                        </li>
                        <li class="{{ 'pet_lover' == request()->path() ? 'active' : ''}}">
                            <a href="/pet_lover">
                              
                                <p style="font-family:monospace; font-size:15px;" >Graduate Pets</p>
                            </a>
                        </li>
                        
                        <li class="{{ 'register' == request()->path() ? 'active' : ''}}">
                            <a href="/register">
                                <p style="font-family:monospace; font-size:15px;">Register</p>
                            </a>
                        </li>
                    @endif
                </ul>
        	</div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">@yield('brand')</a>
                    </div>
                    @if (Auth::check())
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="javascript://" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>
                                    <p>{{ Auth::user()->name }}</p>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/logout">LOGOUT</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">@yield('title')</h4>
                                    <p class="category">@yield('category')</p>
                                </div>
                                <div class="content">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
    @include('layouts.header')
    </body>
    @yield('script')
</html>
