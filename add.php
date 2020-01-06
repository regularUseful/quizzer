<?php 
    include "database.php";
    if(isset($_POST['submit'])){
        //question
        $question_number = $_POST['question_number'];
        $question_text = $_POST['question_text'];
        //answer
        $choices = array();
        $choices[1] = $_POST['choice1'];
        $choices[2] = $_POST['choice2'];
        $choices[3] = $_POST['choice3'];
        $choices[4] = $_POST['choice4'];
        $choices[5] = $_POST['choice5'];
        $correct_choice = $_POST['correct_choice'];

        //set query
        $query = "INSERT INTO `questions` (question_number, text) VALUES ('$question_number', '$question_text')";

        //run query
        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

        if($insert_row){
            foreach($choices as $choice => $value){
                if($value != ""){
                    if($correct_choice == $choice){
                        $is_correct = 1;
                    }
                    else{
                        $is_correct = 0;
                    }
                    $query = "INSERT INTO `choices` (question_number, is_correct, text) VALUE ('$question_number', '$is_correct', '$value')";
                    
                    //run query
                    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
                    //validate
                    if($insert_row){
                        continue;
                    }
                    else{
                        die('ERROR : ' . $mysqli->errno . $mysqli->error);
                    }
                }
            }
            $msg = "Question added";
        }
    }
    
        //get total questions
        $query = "SELECT * FROM `questions`";
        $questions = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $total = $questions->num_rows;
        $next = $total + 1;

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
               <h2>Add A Question</h2>
               <p class="added">
                   <?php if(isset($msg)){echo $msg; }?>
               </p>
                <form action="add.php" method="POST">
                <p>
                    <label for="question_number">Question Number: </label>
                    <input type="number" name="question_number" value="<?php echo $next; ?>">
               </p>
               <p>
                    <label for="question_text">Question Text: </label>
                    <input type="text" name="question_text">
               </p>
               <p>
                    <label for="choice1">Choice #1: </label>
                    <input type="text" name="choice1">
               </p>
               <p>
                    <label for="choice2">Choice #2: </label>
                    <input type="text" name="choice2">
               </p>
               <p>
                    <label for="choice3">Choice #3: </label>
                    <input type="text" name="choice3">
               </p>
               <p>
                    <label for="choice4">Choice #4: </label>
                    <input type="text" name="choice4">
               </p>
               <p>
                    <label for="choice5">Choice #5: </label>
                    <input type="text" name="choice5">
               </p>
               <p>
                    <label for="correct_choice">Correct Choice Number: </label>
                    <input type="number" name="correct_choice">
               </p>
               <p>
                    <input type="submit" name="submit" value="submit">
               </p>
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