<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="bg-gray-300 h-screen w-full">
        <div class="grid grid-cols-3 gap-4 w-11/12 mx-auto pt-10">

            <?php
                include "conn.php";

                $query="SELECT * FROM notes";

                $result=mysqli_query($conn,$query);

                if(mysqli_num_rows($result) > 0){
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<div class='bg-white rounded p-4 min-h-[150px] shadow-lg'>
                            <p class='font-midium text-lg'>
                                $row[Title]
                            </p>
                            <p class='f=text-sm font-normal'>
                                $row[Description]
                            </p>
                            <a class='bg-green-500 py-1 px-4 text-white rounded-md'   href='/crud/edit.php?id=$row[Id]'>Edit</a>
                            <a class='bg-red-500 py-1 px-4 text-white rounded-md ' href='/crud/delete.php?id=$row[Id]'>Delete</a>
                        </div>";
                   }
                }

            ?>
        
        </div>

    </div>
</body>
</html>