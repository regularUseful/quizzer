<?php include "database.php"; ?>
<?php session_start(); ?>

<?php if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}
if(isset($_POST)){
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next = $number+1;

    $query = "SELECT * FROM `questions`";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

    $query = "SELECT * FROM `choices` WHERE question_number = $number AND is_correct = 1";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $row = $result->fetch_assoc();
    $correct_choice = $row['id'];

    


    if($correct_choice == $selected_choice){
        $_SESSION['score']+=1;
        echo "yes";
    }

    print_r($_POST)."<br />";
    print_r($row);
    print_r($_SESSION);

    if($number == $total){
        header("Location: final.php");
        exit();
    }
    else{
        header("Location: question.php?n=".$next."&b=".$correct_choice."&c=".$selected_choice);
    }
}