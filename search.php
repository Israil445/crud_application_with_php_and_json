<?php

$json = file_get_contents('books.json');
$books = json_decode($json, true);

$key1 = '';
$data = '';
$entries = array();

if (isset($_POST['search'])) {
    $search_key = $_POST['search'];
    $option = 'title'; //$_POST['search_by'];

    foreach ($books as $key => $obj) :
        $cnt = 0;
        foreach ($obj as $key1 => $obj1) :
            $cnt++;
            // if (strpos(strtoupper($obj1), strtoupper($search_key)) !== false) {
            //     array_push($entries, $books[$key]);
            //     break; // add one entry for one list
            // }
            if ($obj1 === $search_key && $cnt === 1) {
                array_push($entries, $books[$key]);
                break; 
            }
        endforeach;
    endforeach;
}

?>



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    
</head>

<body>

<nav class="sticky-top navbar navbar-light navbar-style bg-light">
    <div class="container-fluid">
        <a href="index.php" class="text-dark" style="font-size: 30px;"><b>Book Libary</b></a>
        <a class="add-entry" href="<?php echo 'create.php' ?>">
            <button class="btn btn-success">Add Book</button>
        </a>
        <form class="d-flex" action="search.php" method="POST">
            <input class="form-control me-2" type="search" name="search" placeholder="Search a Book" aria-label="Search">
            <button class="btn btn-primary btn-sm" type="submit">Search</button>
        </form>
    </div>
</nav>
    
    <h5 class="title-search text-success mt-2 mb-0">Search results for : <?php echo $search_key;?></h5>
    
    <div class="">
        <table class="table-main table table-striped table-sm">
            <thead class="table-head">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Title</th>
                    <th scope="col" class="text-center">Author</th>
                    <th scope="col" class="text-center">Available</th>
                    <th scope="col" class="text-center">ISBN</th>
                    <th scope="col" class="text-center">Pages</th>
                </tr>
            </thead>
            <tbody class="">
                <?php foreach ($entries as $key => $obj) : ?>

                    <tr class="">

                        <th scope="row" class="text-center"><?php echo $key; ?></th>
                        <td class="text-center"> <?php echo $obj['title']; ?> </td>
                        <td class="text-center"><?php echo $obj['author']; ?></td>
                        <td class="text-center"><?php echo $obj['available'] ? 'YES' : 'NO'; ?></td>
                        <td class="text-center"><?php echo $obj['isbn']; ?></td>
                        <td class="text-center"><?php echo $obj['pages']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>
