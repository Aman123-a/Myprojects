<?php


include "conn.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["Title"];
    $description = $_POST["Description"];

    $query = "INSERT INTO notes (`Id`,`Title`,`Description`) VALUES ('','$title','$description')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Something went wrong";
    }
}
?>

<?php 

$id = $_GET["id"];

$query = "SELECT * FROM notes where Id=$id";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0){
   $data = mysqli_fetch_assoc($result);
   
   $title = $data["Title"];
   $description = $data["Description"];

}else{
    echo "Data not found";
    header("Location: index.php");
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add notes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class=" px-5 py-24  flex  justify-center items-center h-screen w-full">
        <form action="add.php" method="post" class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 mt-10 md:mt-0 relative z-10 shadow-md">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Add notes</h2>
            <p class="leading-relaxed mb-5 text-gray-600">You can add your notes here</p>
            <div class="relative mb-4">
                <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                <input type="title" id="title" name="title" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value=<?php echo $title ?>>
            </div>
            <div class="relative mb-4">
                <label for="description" class="leading-7 text-sm text-gray-600">Description</label>
                <input id="description" name="description" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" value=<?php echo $description ?>></textarea>
            </div>
            <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit">Submit</button>
    </div>
    </form>
</body>

</html>