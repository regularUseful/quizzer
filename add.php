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
                <form action="add.php" method="POST"></form>
                <p>
                    <label for="question_number">Question NUmber: </label>
                    <input type="number" name="question_number">
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
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2014, PHP Quizzer
            </div>
        </footer>
    </body>
</html>