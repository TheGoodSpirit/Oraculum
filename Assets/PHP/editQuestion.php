
<?php require 'startConnection.php'; error_reporting(E_ERROR | E_PARSE); ?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    
    <label for="id">Id :</label>
    <input type="hidden" name="qid" id="id"  required value='<?php echo $_GET['question_id']; ?>'>

    <label for="title">Title :</label>
    <input type="text" name="title" id="title" required value='<?php echo $_GET['title']; ?>'>

    <label for="body">Body :</label>
    <input type="text" name="body" id="body" required value='<?php echo $_GET['body']; ?>'>
    
    <button type="submit" name="submit">Submit</button>
</form>


<?php
    if(isset($_POST['submit'])) {
        $id = $_POST['qid']; 
        $title = $_POST['title'];
        $body = $_POST['body'];
        $query = "UPDATE questions SET title = '$title', body = '$body'  WHERE question_id = '$id'";
        if ($conn->query($query)) {
            header('Location: ../Pages/dashboard.php');
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } 
    require 'closeConnection.php';
?>