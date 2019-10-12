<nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img src="{{asset('assets')}}/images/logo/png2.png" alt="">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active">                
                            <router-link :to="{ name:'index' }" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Home</span>
                            </router-link>
                        </li>
                        @auth
                        <li>
                            <router-link :to="{ name:'page1' }" class="nav-link">
                                <i class="glyphicon glyphicon-log-in"></i>
                                <span class="title">Page 1</span>
                            </router-link>
                        </li>
                        @endauth
                        @guest
                        <li><a href="#">Page 2</a></li>
                        @endguest
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @guest
                        <li>
                        <router-link :to="{ name:'signup' }" class="nav-link">
                            <i class="glyphicon glyphicon-user"></i>
                            <span class="title">Sign up</span>
                        </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name:'signin' }" class="nav-link">
                                <i class="glyphicon glyphicon-log-in"></i>
                                <span class="title">Login</span>
                            </router-link>
                        </li>
                        @endguest
                        @auth
                        <li><a v-on:click="logout" href="#"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>        
    </section>
    <!-- Header Section Close -->