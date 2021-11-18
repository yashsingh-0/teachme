<?php
include './includes/session.inc.php';
include './includes/connection.inc.php';
if (isset($_GET['query']) && isset($_GET['results'])) {
	$searchstring = $_GET['query'];
	$numresults = $_GET['results'];
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
	<title><?php echo "Search Results for ".'"'.$_GET['query'].'"';?></title>
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
                        <input type="text" name="searchstring" value="<?php echo $_GET['query'] ?>" class="w-full py-1 pl-10 pr-4 text-gray-700 placeholder-gray-600 bg-white border-b border-gray-600 dark:placeholder-gray-300 dark:focus:border-gray-300 lg:w-56 lg:border-transparent dark:bg-gray-800 dark:text-gray-300 focus:outline-none focus:border-gray-600" placeholder="Search">
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
<!--searchresults-->
<div class="searchresult">
<!-- component -->
<div class="container mx-auto pt-4 px-4 py-16 ">
	<div class="container">
	<h1 class="mb-8">
	<?php echo "Found ".$_GET['results']." Results for "."'".$_GET['query']."'";?>
	</h1>
	<div id='app' style='overflow-x:auto;'>
		<table class='w-full shadow-lg rounded'>
			<thead>
				<tr class='text-left bg-gray-300 border-b border-grey uppercase'>
			        <th class='px-2 py-6'></th>
			        <th class='text-sm text-gray-700'>Mobile</th>
			        <th class='hidden md:table-cell  text-sm text-gray-700'>Mail</th>
			        <th class='hidden md:table-cell text-sm text-gray-700'>View Profile</th>
			        </th>
		      	</tr>
			</thead>
    <?php 
	$conn=dbcon();
	$sql = "SELECT * FROM `user_info` WHERE `name` LIKE '%$_GET[query]%'";
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
			        		 <p class='text-gray-800 text-sm'><a href=profile.php?email=$array[email]&name=$array[name]>$array[name]</a></p>
			        		 <p class='md:hidden text-xs text-gray-600 font-medium'>244224317</p>
			          		 <p class='hidden md:table-cell text-xs text-gray-500 font-medium'>$array[occupation]</p>
			        	</span>
			        </td>
			        <td class='hidden md:table-cell'>
			          <p class='text-sm text-gray-800 font-medium'>244224317</p>
			          <p class='text-xs text-gray-500 font-medium'>$array[email]</p>
			        </td>
			        <td class='hidden md:table-cell'>
			          <p class='text-sm text-gray-700 font-medium'>$array[email]</p>
			        </td>
			        <td>
			          <button class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full'>
                      <a href=profile.php?email=$array[email]&name=$array[name]>
  						View Profile
                        </a>
					</button>
			        </td>
		      	</tr>	
	";
  	    
}
?>
</tbody>
</table>
</body>
</html>