<?php
include './includes/session.inc.php';
include './includes/connection.inc.php';
$conn = dbcon();
if (isset($_SESSION['email'])) {
    $sql = "SELECT `email` FROM `user_info` WHERE `email` = '$_SESSION[email]'";
    $sqlr = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($sqlr);
    if ($rows <= 0) {
        header("Location: ./login.php");
        exit();
    }
}
else {
  header("Location: ./login.php");
  exit();
}    
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <title><?php echo $_SESSION['fullname'];?></title>
</head>
<body>

    <nav class="bg-white shadow dark:bg-gray-800">
        <div class="container px-6 py-4 mx-auto">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex items-center justify-between">
                    <div class="text-xl font-semibold text-gray-700">
                        <a class="text-2xl font-bold text-gray-800 dark:text-white lg:text-3xl hover:text-gray-700 dark:hover:text-gray-300" href="./index.php">TEACH.ME</a>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex md:hidden">
                        <button type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="flex-1 md:flex md:items-center md:justify-between">
                    <div class="flex flex-col -mx-4 md:flex-row md:items-center md:mx-8">
                        <a href="#" class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-red-500 py-2 px-6 flex">Connections</a>
                        <a href="#" class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-red-500 py-2 px-6 flex">Browse Topics</a>
                        <a href="#" class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-red-500 py-2 px-6 flex">Random Item</a>
                    </div>
                    <div class="relative mt-4 lg:mt-0 lg:mx-4">
                    <form action="./includes/search.inc.php" method="POST">
                        <button type="submit">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-4 h-4 text-gray-600 dark:text-gray-300" viewBox="0 0 24 24" fill="none">
                                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        </button>
                        <input type="text" name="searchstring" class="w-full py-1 pl-10 pr-4 text-gray-700 placeholder-gray-600 bg-white border-b border-gray-600 dark:placeholder-gray-300 dark:focus:border-gray-300 lg:w-56 lg:border-transparent dark:bg-gray-800 dark:text-gray-300 focus:outline-none focus:border-gray-600" placeholder="Search">
                       </form> 
                    </div>
                    <div class="flex items-center mt-4 md:mt-0">
                        <button class="hidden mx-4 text-gray-600 md:block dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-400 focus:text-gray-700 dark:focus:text-gray-400 focus:outline-none" aria-label="show notifications">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>

                        <button type="button" class="flex items-center focus:outline-none" aria-label="toggle profile dropdown">
                            <div class="flex items-center px-4 -mx-2">
                        <?php
                        if (isset($_SESSION['email'])) {
                        echo "<a href='./profile.php?email=$_SESSION[email]&name=$_SESSION[fullname]'>
                        <img class='object-cover mx-2 rounded-full h-9 w-9' src='https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80' alt='avatar'/></a>";
                        }
                        ?>
                            </div>
                        <?php
                        if (isset($_SESSION['email'])) {
                            echo "<a href='./profile.php?email=$_SESSION[email]&name=$_SESSION[fullname]'>
                            <h3 class='mx-2 text-sm font-medium text-gray-700 dark:text-gray-200 md:hidden'>John Doe</h3></a>
                        </button>";    
                            }    
                            
                        ?>
                        <?php
                        if (isset($_SESSION['email'])) {
                            echo "<form method='POST' action='./includes/logout.inc.php'>
                        <button type='submit' name='logout' class='bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded'>
                          Log Out
                        </button>
                        </form>";
                        }
                       
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

<!--main content-->
<form method="POST" action="./includes/request.inc.php">
<section class="bg-gray-100 dark:bg-gray-900 lg:py-12 lg:flex lg:justify-center">
        <div class="bg-white dark:bg-gray-800 lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg lg:rounded-lg">
            <div class="lg:w-1/2">
            <div class="h-64 bg-cover lg:rounded-lg lg:h-full" style="background-image:url('https://images.unsplash.com/photo-1593642532400-2682810df593?ixlib=rb-1.2.1&ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=750&q=80')"></div>
            </div>

            <div class="max-w-xl px-6 py-12 lg:max-w-5xl lg:w-1/2">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white md:text-3xl">Sharpen Your <span class="text-red-600 dark:text-red-400">Maths</span></h2>
                <p class="mt-4 text-gray-600 dark:text-gray-400">Mohit tyagi is one of the best because he is giving the full content of jee mains and advance in a proper way. dolores ullam temporibus enim expedita aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.</p>
                
                <div class="mt-8">
                    <button type="submit" name="maths" class="px-5 py-2 font-semibold text-gray-100 transition-colors duration-200 transform bg-gray-900 rounded-md hover:bg-gray-700">Raise a Request</button>
                    <?php
                    if (isset($_GET['reqSuc'])) {
                        if ($_GET['reqSuc'] == "mathsup" || $_GET['reqSuc'] == "maths") {
                            echo "
    <div class='flex w-full max-w-sm mt-2 overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800'>
        <div class='flex items-center justify-center w-12 bg-green-500'>
            <svg class='w-6 h-6 text-white fill-current' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'>
                <path d='M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z'/>
            </svg>
        </div>
        
        <div class='px-4 py-2 -mx-3'>
            <div class='mx-3'>
                <span class='font-semibold text-green-500 dark:text-green-400'>Success</span>
                <p class='text-sm text-gray-600 dark:text-gray-200'>Your Request Has been sent!</p>
            </div>
        </div>
    </div>
        ";
                        }
                    }


                    ?>
                </div>
            </div>
        </div>
 </section>

    <section class="bg-gray-100 dark:bg-gray-900 lg:py-12 lg:flex lg:justify-center">
        <div class="bg-white dark:bg-gray-800 lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg lg:rounded-lg">
            <div class="lg:w-1/2">
                <div class="h-64 bg-cover lg:rounded-lg lg:h-full" style="background-image:url('https://images.unsplash.com/photo-1593642532400-2682810df593?ixlib=rb-1.2.1&ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=formatfit=crop&w=750&q=80')"></div>
            </div>

            <div class="max-w-xl px-6 py-12 lg:max-w-5xl lg:w-1/2">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white md:text-3xl">Imagine the world: <span class="text-red-600 dark:text-red-400">Physics</span></h2>
                <p class="mt-4 text-gray-600 dark:text-gray-400">Physics is the natural science that studies matter,[a] its fundamental constituents, its motion and behavior through space and time, and the related entities of energy and force.[2] Physics is one of the most fundamental scientific disciplines, and its main goal is to understand how the universe behaves.</p>
                
                <div class="mt-8">
                    <button type="submit" name="physics" class="px-5 py-2 font-semibold text-gray-100 transition-colors duration-200 transform bg-gray-900 rounded-md hover:bg-gray-700">Raise a Request</button>
                    <?php
                    if (isset($_GET['reqSuc'])) {
                        if ($_GET['reqSuc'] == "physicsup" || $_GET['reqSuc'] == "physics") {
                            echo "
    <div class='flex w-full max-w-sm mt-2 overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800'>
        <div class='flex items-center justify-center w-12 bg-green-500'>
            <svg class='w-6 h-6 text-white fill-current' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'>
                <path d='M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z'/>
            </svg>
        </div>
        
        <div class='px-4 py-2 -mx-3'>
            <div class='mx-3'>
                <span class='font-semibold text-green-500 dark:text-green-400'>Success</span>
                <p class='text-sm text-gray-600 dark:text-gray-200'>Your Request Has been sent!</p>
            </div>
        </div>
    </div>
        ";
                        }
                    }


                    ?>
                </div>
            </div>
        </div>
    </section> 

    <section class="bg-gray-100 dark:bg-gray-900 lg:py-12 lg:flex lg:justify-center">
        <div class="bg-white dark:bg-gray-800 lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg lg:rounded-lg">
            <div class="lg:w-1/2">
                <div class="h-64 bg-cover lg:rounded-lg lg:h-full" style="background-image:url('https://images.unsplash.com/photo-1593642532400-2682810df593?ixlib=rb-1.2.1&ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=formatfit=crop&w=750&q=80')"></div>
            </div>

            <div class="max-w-xl px-6 py-12 lg:max-w-5xl lg:w-1/2">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white md:text-3xl">Wanna Know Why Matter 'Matters'? <span class="text-red-600 dark:text-red-400">Chemistry</span></h2>
                <p class="mt-4 text-gray-600 dark:text-gray-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem modi reprehenderit vitae exercitationem aliquid dolores ullam temporibus enim expedita aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.</p>
                
                <div class="mt-8">
                    <button type="submit" name="chemistry" class="px-5 py-2 font-semibold text-gray-100 transition-colors duration-200 transform bg-gray-900 rounded-md hover:bg-gray-700">Raise a Request</button>
                    <?php
                    if (isset($_GET['reqSuc'])) {
                        if ($_GET['reqSuc'] == "chemistryup" || $_GET['reqSuc'] == "chemistry") {
                            echo "
    <div class='flex w-full max-w-sm mt-2 overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800'>
        <div class='flex items-center justify-center w-12 bg-green-500'>
            <svg class='w-6 h-6 text-white fill-current' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'>
                <path d='M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z'/>
            </svg>
        </div>
        
        <div class='px-4 py-2 -mx-3'>
            <div class='mx-3'>
                <span class='font-semibold text-green-500 dark:text-green-400'>Success</span>
                <p class='text-sm text-gray-600 dark:text-gray-200'>Your Request Has been sent!</p>
            </div>
        </div>
    </div>
        ";
                        }
                    }


                    ?>
                </div>
            </div>
        </div>
    </section> 

    <section class="bg-gray-100 dark:bg-gray-900 lg:py-12 lg:flex lg:justify-center">
        <div class="bg-white dark:bg-gray-800 lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg lg:rounded-lg">
            <div class="lg:w-1/2">
                <div class="h-64 bg-cover lg:rounded-lg lg:h-full" style="background-image:url('https://images.unsplash.com/photo-1593642532400-2682810df593?ixlib=rb-1.2.1&ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=formatfit=crop&w=750&q=80')"></div>
            </div>

            <div class="max-w-xl px-6 py-12 lg:max-w-5xl lg:w-1/2">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white md:text-3xl">The Most Complex God's Creation <span class="text-red-600 dark:text-red-400">Biology</span></h2>
                <p class="mt-4 text-gray-600 dark:text-gray-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem modi reprehenderit vitae exercitationem aliquid dolores ullam temporibus enim expedita aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.</p>
                
                <div class="mt-8">
                    <button type="submit" name="biology" class="px-5 py-2 font-semibold text-gray-100 transition-colors duration-200 transform bg-gray-900 rounded-md hover:bg-gray-700">Raise a Request</button>
                    <?php
                    if (isset($_GET['reqSuc'])) {
                        if ($_GET['reqSuc'] == "biologyup" || $_GET['reqSuc'] == "biology") {
                            echo "
    <div class='flex w-full max-w-sm mt-2 overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800'>
        <div class='flex items-center justify-center w-12 bg-green-500'>
            <svg class='w-6 h-6 text-white fill-current' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'>
                <path d='M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z'/>
            </svg>
        </div>
        
        <div class='px-4 py-2 -mx-3'>
            <div class='mx-3'>
                <span class='font-semibold text-green-500 dark:text-green-400'>Success</span>
                <p class='text-sm text-gray-600 dark:text-gray-200'>Your Request Has been sent!</p>
            </div>
        </div>
    </div>
        ";
                        }
                    }


                    ?>
                </div>
            </div>
        </div>
    </section>  
    
</body>
</html>