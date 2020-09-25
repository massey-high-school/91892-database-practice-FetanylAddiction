<?php include("topbit.php"); 

$app_name = mysqli_real_escape_string($dbconnect, $_POST['app_name']);
$developer = mysqli_real_escape_string($dbconnect, $_POST['dev_name']);
$genre = mysqli_real_escape_string($dbconnect, $_POST['genre']);
$cost = mysqli_real_escape_string($dbconnect, $_POST['cost']);


if (isset($_POST['in_app'])) {
    $in_app = 0;
}

else {
    $in_app = 1;
}

$find_sql = "SELECT * FROM `L2_prac_game_details` 
    JOIN `L2_prac_genre` ON (`L2_prac_game_details`.`GenreID`=`L2_prac_genre`.`GenreID`) 
    JOIN `L2_prac_developer` ON (`L2_prac_game_details`.`DeveloperID` = `L2_prac_developer`.`ID`)
    WHERE 'Name' LIKE '%$app_name%'
    AND 'DevName' LIKE '%$developer%'
    AND 'Genre' LIKE '%$genre%'
    AND 'Price' <= '$cost'
    AND ('In App' = $in_app OR 'In App' = 0)
    
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>     
            
        <div class="box main">
            <h2>Advanced Search Results</h2>
            
            <?php 
            include ("results.php");
            ?>
            
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>  