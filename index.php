<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- import bootstrap to style the social media buttons-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="styles/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- import TailwindCss  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.8.10/tailwind.min.css">
    <title>Home</title>
</head>

<body class="bg-white font-sans leading-normal tracking-normal">

    <header class="lg:px-16 px-6 bg-white flex flex-wrap items-center lg:py-0 py-2">
        <div class="flex-1 flex justify-between items-center" >
            <a href="index.php">
                <img id="logo" src="Resources/Logo.png" alt="" style=" height:70px;" >

            </a>
        </div>

        <label for="menu-toggle" class="pointer-cursor lg:hidden block"><svg class="fill-current text-gray-900"
                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg></label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
            <nav>
                <ul class="lg:flex items-center justify-between text-base text-gray-700 pt-4 lg:pt-0">
                    <li class="nav-link"><a class=" lg:p-4 py-3 px-0 block border-b-2 border-transparent
                        hover:border-indigo-400" href="#services">Our Services</a></li>
                    <li class="nav-link"><a
                            class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400"
                            href="#contact">Contact Us</a></li>
                    <li class="nav-link"><a
                            class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400"
                            href="#about">About Us</a></li>
                    <li class="nav-link"><a
                            class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 lg:mb-0 mb-2"
                            href="signin.php" target="blank">Login</a></li>
                </ul>
            </nav>

        </div>

    </header>

    <div class="carousel relative shadow-2xl bg-white" id="carousel-area">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                checked="checked">
            <div class="carousel-item absolute opacity-0" style="height:60vh;">
                <!-- <div class="block h-full w-full  text-white text-5xl text-center">Slide 1</div> -->
                <img id="first-img"
                    src="https://images.unsplash.com/photo-1593526367339-673b8872f19a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1907&q=80"
                    alt="">
            </div>
            <label for="carousel-3"
                class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-2"
                class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0" style="height:60vh;">
                <!-- <div class="block h-full w-full bg-orange-500 text-white text-5xl text-center">Slide 2</div> -->
                <img id="first-img"
                    src="https://images.unsplash.com/photo-1504275107627-0c2ba7a43dba?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80"
                    alt="" style="width:100%;">

            </div>
            <label for="carousel-1"
                class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-3"
                class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 3-->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0" style="height:60vh;">
                <!-- <div class="block h-full w-full bg-green-500 text-white text-5xl text-center">Slide 3</div>
                 -->
                <img id="first-img"
                    src="https://images.unsplash.com/photo-1585840887185-dc28a1b86ea0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    alt="" style="width:100%;">
            </div>
            <label for="carousel-2"
                class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-1"
                class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                    <label id="carousel-nav" for="carousel-1"
                        class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label id="carousel-nav" for="carousel-2"
                        class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label id="carousel-nav" for="carousel-3"
                        class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                </li>
            </ol>

        </div>
    </div>


    <div class="pt-4" id="container">


        <div class="pt-8" id="services" style="margin: auto 0;">
            <h1 class="text-center font-bold  text-4xl pb-10">Our Services</h1>
            <div class="row">
                <div class="column">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg" id="card">
                        <img class="w-20" style="display: block; margin-left: auto; margin-right: auto;"
                            src="https://www.flaticon.com/svg/static/icons/svg/2827/2827435.svg"
                            alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl text-center text-red-700 mb-2">Creche</div>
                            <p class="text-gray-700 text-base">
                                A nursery where babies and young children are cared for during the working day. Crèche
                                also helps to shape your child's mind with various activities.
                            </p>
                        </div>

                    </div>
                </div>

                <div class="column">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg" id="card">
                        <img class="w-20" style="display: block; margin-left: auto; margin-right: auto;"
                            src="https://www.flaticon.com/svg/static/icons/svg/5/5177.svg"
                            alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl text-center text-red-700 mb-2">Grade R</div>
                            <p class="text-gray-700 text-base">
                                We want to take every opportunity for our children to develop into whole individuals.
                                This process is attained as the children interact with their environment through
                                developmentally appropriate curriculum.
                            </p>
                        </div>

                    </div>
                </div>

                <div class="column">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg" id="card">
                        <img class="w-20" style="display: block; margin-left: auto; margin-right: auto;"
                            src="https://www.flaticon.com/svg/static/icons/svg/2017/2017244.svg"
                            alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl text-center text-red-700 mb-2">Babysitting</div>
                            <p class="text-gray-700 text-base">
                                Babysitting is temporarily caring for a child. Babysitting can be a paid job for all
                                ages; however, it is best known as a temporary activity for young teenagers who are too
                                young to be eligible for employment in the general economy.
                            </p>
                        </div>

                    </div>
                </div>
                <div class="column">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg" id="card">
                        <img class="w-20" style="display: block; margin-left: auto; margin-right: auto;"
                            src="https://www.flaticon.com/svg/static/icons/svg/3152/3152831.svg"
                            alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl text-center text-red-700 mb-2">Learning</div>
                            <p class="text-gray-700 text-base">
                                We believe that our lives are a journey of life-long learning. We enlighten and guide
                                the minds of children by creating an environment of receptivity, learning and discovery.
                            </p>
                        </div>

                    </div>
                </div>
                <div class="column">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg" id="card">
                        <img class="w-20" style="display: block; margin-left: auto; margin-right: auto;"
                            src="https://www.flaticon.com/svg/static/icons/svg/2913/2913557.svg"
                            alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl text-center text-red-700 mb-2">Caring</div>
                            <p class="text-gray-700 text-base">
                                We believe that a child can excel only when they feel safe and loved. We foster an
                                environment that embraces love and respect that cherishes the children we are entrusted.
                            </p>
                        </div>

                    </div>
                </div>
                <div class="column">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg" id="card">
                        <img class="w-20" style="display: block; margin-left: auto; margin-right: auto;"
                            src="https://www.flaticon.com/svg/static/icons/svg/1491/1491468.svg"
                            alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl text-center text-red-700 mb-2">Character Development</div>
                            <p class="text-gray-700 text-base">
                                We believe that the moral foundation of our society is based on honest and principled
                                behavior to each other. A system of moral values must be taught at an early age to
                                children so that they know the difference between right and wrong.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <!-- Contact  -->
        <div id="contact" class="bg-gray-100 pt-8 p-10">
            <h1 class="text-4xl font-bold text-center">Contact Us</h1>
            <form class="w-1/3 bg-blue-100 shadow-md rounded px-8 pt-6 pb-8 mb-4" style="border-radius: 15px;">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Full Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" type="text" placeholder="Your full name">
                </div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Email
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="username" type="email" placeholder="yourname@gmail.com">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Phone
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" type="tel" placeholder="+27678523695">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Message
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="" id="" cols="30" rows="5"></textarea>
                </div>


                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">
                        Send <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    </button>

                </div>
            </form>

        </div>
        <br>
        <!-- about us -->

        <div id="about" class="mt-20">
            <section class="container mx-auto px-6 p-10 bg-tranparent">
                <h2 class="text-4xl font-bold text-center mb-8">
                    About Us
                </h2><br><br>
                <div class="flex items-center flex-wrap mb-20">
                    <div class="w-full md:w-1/2">
                        <!-- <h6 class="text-3xl text-gray-800 font-bold mb-3">Exercise Metric</h6> -->
                        <p class="text-black-600 mb-8" id="p1">Tiny Tubby Educare has been here for many years. We not
                            only make
                            sure that our customers recieve the best service,but we also ensure that they can they can
                            rest peacefully, knowing that their children are in the best hands possible. Here at Tiny
                            Tubbies, we stongly believe in a balance between play and work in the development of all
                            children and that they should always feel free to be themselves in a safe enviroment. We
                            provide a different range of services for children age 9 months - 5 years old.</p>
                    </div>
                    <div class="w-full md:w-1/2">
                        <img id="about-image" src="https://www.flaticon.com/svg/static/icons/svg/3300/3300502.svg"
                            alt="Monitoring" />
                    </div>
                </div>

                <div class="flex items-center flex-wrap mb-20">
                    <div class="w-full md:w-1/2">
                        <img id="about-image" src="https://www.flaticon.com/svg/static/icons/svg/906/906175.svg"
                            alt="Reporting" />
                    </div>
                    <div class="w-full md:w-1/2 pl-10">
                        <!-- <h4 class="text-3xl text-gray-800 font-bold mb-3">Reporting</h4> -->
                        <p class="text-white-600 mb-8" id="p2">With our beliefs and ideologies about each child being
                            special
                            and
                            different, we aim to enforce what makes them special, as well as strengthen the strong and
                            amazing morals you've placed into them as a parent.</p>
                    </div>
                </div>

                <div class="flex items-center flex-wrap mb-20">
                    <div class="w-full md:w-1/2">
                        <!-- <h4 class="text-3xl text-gray-800 font-bold mb-3">Syncing</h4> -->
                        <p class="text-black-600 mb-8" id="p3">Tiny Tubbies Educare is the greatest way to kickstart
                            the
                            success
                            of your children by not only preparing them for primary school,but for life as well.</p>
                    </div>
                    <div class="w-full md:w-1/2">
                        <img id="about-image" src="https://www.flaticon.com/svg/static/icons/svg/3534/3534095.svg"
                            alt="Syncing" />
                    </div>
                </div>
            </section>

            <div id="social-platforms">
                <a class="btn btn-icon btn-facebook" href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                <a class="btn btn-icon btn-twitter" href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                <a class="btn btn-icon btn-googleplus" href="#"><i
                        class="fa fa-google-plus"></i><span>Google+</span></a>
                <a class="btn btn-icon btn-pinterest" href="#"><i class="fa fa-pinterest"></i><span>Pinterest</span></a>
                <a class="btn btn-icon btn-linkedin" href="#"><i class="fa fa-linkedin"></i><span>LinkedIn</span></a>
            </div>
            <!-- Footer -->
            <div class="footer-copyright text-center py-3">
                <strong>Copyright © 2020 Tiny Tubbies Educare</strong>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>