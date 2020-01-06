<?php 
include 'database.php'; ?>
<?php session_start(); 
print_r($_SESSION);?>
<?php
    //set question number
    $number = (int) $_GET['n'];
    //create query
    $query = "SELECT * FROM `questions` WHERE question_number = $number";
    //get result
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $question = $result->fetch_assoc();

    $query = "SELECT * FROM `choices` WHERE question_number = $number";
    $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

    $query = "SELECT * FROM `questions`";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
    

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8' />
        <title>Quizzer</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" ?/>
    </head>
    <body>
        <header>
            <div class="container">
                <h1>PHP Quizzer!</h1>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?> </div>
                <p class="question"><?php echo $question["text"]; ?></p>
                <form action="process.php" method="POST">
                    <ul class="choices">
                        <?php while($row = $choices->fetch_assoc()) :?>
                            <li><input name="choice" type="radio" value=<?php echo $row['id']; ?>><?php echo $row["text"]; ?></li>
                        <?php endwhile; ?>    
                    </ul>
                    <input type="hidden" name="number" value="<?php echo $number; ?>" />
                    <input type="submit" value="submit">
                </form>
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2014, PHP Quizzer
            </div>
        </footer>
    </body>
</html>