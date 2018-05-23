<?php
class DB
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "quiz";

    private $tip = " ";
    private $quiz = " ";
    // Connect to DB
    public function connect()
    {
        $this->conn = new mysqli(
            $this->servername, $this->username, 
            $this->password, $this->dbname);
        return;
    }
    // Insert to DB
    // Att: make sure table students is already created
    
    // Read from DB
    public function GetQuestions(&$tip,&$quiz)
    {
        $tip = "<script> var factList =  [";
        $quiz = "<script> var quizzes =  [";
        $sqlo = "SELECT * FROM quiz";
        $resulto = $this->conn->query($sqlo);
        $num = $resulto->num_rows;
        $array = range(1,$num);
        shuffle($array);
        for ($x=0; $x<5; $x++) {
            $id = $array[$x];
            $sql = "SELECT * FROM quiz WHERE id = $id";
            $result = $this->conn->query($sql);
            while($row = $result->fetch_assoc()) {
                $tip .= "new FactData(\"".$row['tip']."\"),";
                $quiz .= "new QuizData(\"".$row['question']."\", \"".$row['answer1']."\",\"".$row['answer2']."\",\"".$row['answer3']."\",\"".$row['answer4']."\",\"".$row['correct']."\"),";
            }
        }
        $tip .= "];</script>";
        $quiz .= "];</script>";
        setcookie('tip',$tip);
        setcookie('quiz',$quiz);
    }
    public function Tip(&$tip)
    {
        echo $tip;
    }
}

?>
