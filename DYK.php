<!-- ================================================= -->
<?php include 'DB.php';
    $obj = new DB();
    $obj->connect();
    $obj->GetQuestions($tip,$quiz);
?>
<!-- ================================================= -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Did You Know</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0 maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="style/styles_dyk.css" />
</head>

<body>
    <img id="dyk" src="style/images/DidYouKnow.png" alt="DidYouKnow" draggable="false">
    <div id="facts" draggable="false">
        <ul>
            <div id="factList"></div>
        </ul>
    </div> 
    <img id="loading" src="style/images/loading.gif" alt="loading" draggable="false">   
    <script src="script/jquery-3.2.1.min.js"></script>
    <script src="script/factData.js"></script>
    <script src="script/didYouKnow.js"></script>
<!-- ================================================= -->
    <?php $obj->Tip($tip); ?>
    <script>
        $(document).ready(function () {
    // Handler for .ready() called.
    window.setTimeout(function () {
        location.href = "game.html";
    }, 5000);
});
</script>
    <script>
        localStorage.removeItem("q0");
        localStorage.removeItem("q1");
        localStorage.removeItem("q2");
        localStorage.removeItem("q3");
        localStorage.removeItem("q4");
    </script>
<!-- ================================================= -->
    <script src="script/fact.js"></script>
</body>

</html>