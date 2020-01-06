<?php 
include 'database.php';
?>
<?php 
    $query = "SELECT * FROM `questions`";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $result->num_rows;
    
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
                <h1>PHP Quizzer</h1>
            </div>
        </header>
        <main>
            <div class="container">
                <h2>Test Your PHP Knowledge</h2>
                <p>This is a multiple choice quizz to test your knowledge of php</p>
                <ul>
                    <li><strong>Number of questions:</strong> <?php echo $total; ?></li>
                    <li><strong>Type:</strong> Multiple Choice</li>
                    <li><strong>Estimated Time:</strong> <?php echo $total / 2 . " Minutes" ?></li>
                </ul>
                <a href="question.php?n=1" class="start">Start Quiz</a>
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2014, PHP Quizzer
            </div>
        </footer>
    </body>
</html>