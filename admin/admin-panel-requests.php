<?php
include '../includes/session.inc.php';
include '../includes/connection.inc.php';
if (!isset($_SESSION['email'])) {
    header("Location: ./admin-login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome <?php echo $_SESSION['fullname']?></title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

</head>


<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

    <!--Nav-->
   <!--Nav-->
    <nav class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">
        <div class="flex items-center justify-between">
                    <div>
                        <a class="text-2xl font-bold text-white-800 text-white lg:text-3xl hover:text-white-700 dark:hover:text-gray-300" href="../index.php">TEACH.ME</a>
                    </div>
        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                <a href="#">
                    <span class="text-xl pl-2"><i class="em em-grinning"></i></span>
                </a>
            </div>

            <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li class="flex-1 md:flex-none md:mr-3">
                        <a class="inline-block py-2 px-4 text-white no-underline" href="./admin-signup.php">Add Admin</a>
                    </li>
                    <li class="flex-1 md:flex-none md:mr-3">
                         <?php
                        if (isset($_SESSION['email'])) {
                            echo "<form method='POST' action='../includes/logout.inc.php'>
                        <button type='submit' name='logout' class='bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded'>
                          Log Out
                        </button>
                        </form>";
                        }
                       
                        ?>
                    </li>
                    <li class="flex-1 md:flex-none md:mr-3">
                        <div class="relative inline-block">
                            <button onclick="toggleDD('myDropdown')" class="drop-button text-white focus:outline-none"> <span class="pr-2"><i class="em em-robot_face"></i></span> Hi, <?php echo "Admin"; ?> <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg></button>
                            <div id="myDropdown" class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
                                <input type="text" class="drop-search p-2 text-gray-600" placeholder="Search.." id="myInput" onkeyup="filterDD('myDropdown','myInput')">
                                <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-user fa-fw"></i> Profile</a>
                                <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-cog fa-fw"></i> Settings</a>
                                <div class="border border-gray-800"></div>
                                  <?php 
                        if (isset($_SESSION['email'])) {
                            echo "<form method='POST' action='../includes/logout.inc.php'>
                        <button type='submit' name='logout' class='bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded'>
                          Log Out
                        </button>
                        </form>";
                        }
                       
                        ?></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </nav>


    <div class="flex flex-col md:flex-row">

        <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">

            <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                    <li class="mr-3 flex-1">
                        <a href="./admin-panel-teachers.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                            <i class="fa fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Teachers</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="./admin-panel-users.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                            <i class="fa fa-envelope pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Users</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="./admin-panel.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-blue-600">
                            <i class="fas fa-chart-area pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600  md:text-gray-400 block md:inline-block">Analytics</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="./admin-panel-requests.php" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 border-red-500">
                            <i class="fa fa-wallet pr-0 md:pr-3 text-red-600"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Requests</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
 <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-gray-800 pt-3">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                    <h3 class="font-bold pl-2">Requests</h3>
                </div>
            </div>

<!--Requests-->
<div class="searchresult">
<!-- component -->
<div class="container mx-auto pt-4 px-4 py-16 ">
    <div class="container">
    <h1 class="mb-8">
    <?php 
    $conn=dbcon();
    $sql = "SELECT * FROM `requests_info`";
    $sqlr = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($sqlr);
    echo "Found ".$rows;
    ?>
    </h1>
    <div id='app' style='overflow-x:auto;'>
        <table class='w-full shadow-lg rounded'>
            <thead>
                <tr class='text-left bg-gray-300 border-b border-grey uppercase'>
                    <th class='text-sm text-gray-700'>User Deatils</th>
                    <th class='hidden md:table-cell  text-sm text-gray-700'>Maths</th>
                    <th class='hidden md:table-cell  text-sm text-gray-700'>Physics</th>
                    <th class='hidden md:table-cell text-sm text-gray-700'>Chemistry</th>
                    <th class='hidden md:table-cell text-sm text-gray-700'>Biology</th>
                    </th>
                </tr>
            </thead>
    <?php 
    $conn=dbcon();
    $sql = "SELECT * FROM `requests_info`";
    $sqlr = mysqli_query($conn, $sql);
    while ($array = mysqli_fetch_assoc($sqlr)) {
    echo "  <tbody class='bg-white'>
    <td class='flex inline-flex items-center'>
                        <span>
                             <img
                            class='hidden mr-1 md:mr-2 md:inline-block h-8 w-8 rounded-full object-cover'
                            src='https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=144&h=144&q=80'
                            alt=''
                            />
                        </span>
                        <span class='py-3 w-40'>
                             <p class='text-gray-800 text-sm'><a href=../profile.php?email=$array[email]>$array[email]</a></p>
                             <p class='md:hidden text-xs text-gray-600 font-medium'></p>
                             
                        </span>
                    </td>
                    <td class='hidden md:table-cell'>
                      <p class='text-sm text-gray-800 font-medium'>$array[maths]</p>
                      <p class='text-xs text-gray-500 font-medium'></p>
                    </td>
                    <td class='hidden md:table-cell'>
                      <p class='text-sm text-gray-700 font-medium'>$array[physics]</p>
                    </td>
                    <td class='hidden md:table-cell'>
                       <p class='text-sm text-gray-700 font-medium'>$array[chemistry]</p>
                    </td>
                    <td class='hidden md:table-cell'>
                       <p class='text-sm text-gray-700 font-medium'>$array[biology]</p>
                    </td>
                </tr>   
    ";
}
?>
</tbody>
</table>
<script>
        /*Toggle dropdown list*/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /*Filter dropdown options*/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>




</body>
</html>           
