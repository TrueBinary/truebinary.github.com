<?php

// Topics variables
$topic_id = 0;
$isEditingTopic = false;
$topic_name = "";
$erros = [];

/* * * * * * * * * * * * * * * * * * * * *
* - Escapes form submitted value, hence, preventing SQL injection
* * * * * * * * * * * * * * * * * * * * * */
function esc(String $value)
{
    // bring the global db connect object into function
    global $conn;
    // remove empty space sorrounding string
    $val = trim($value);
    $val = mysqli_real_escape_string($conn, $value);
    return $val;
}

function makeSlug(String $string)
{
    $string = strtolower($string);
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    return $slug;
}

/***
 * Topic actions
*/
//if user clicks the create topic button
if(isset($_POST['create_topic'])) { createTopic($_POST); }
// if user clicks the Edit topic button
if(isset($_GET['edit-topic'])){
    $isEditingTopic = true;
    $topic_id = $_GET['edit-topic'];
    editTopic($topic_id);
}
//if user clicks the update topic button
if(isset($_POST['update_topic'])){
    updateTopic($_POST);
}
// if user clicks the Delete Topic button
if(isset($_GET['delete-topic'])){
    $topic_id = $_GET['delete-topic'];
    deleteTopic($topic_id);
}

/**
 * Topics Functions
 */
//get all topic from DB
function getAllTopics(){
    global $conn;
    $sql = "SELECT * FROM topics";
    $result = mysqli_query($conn, $sql);
    $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $topics;
}
function createTopic($request_values){
    global $conn, $errors, $topic_name;
    $topic_name = esc($request_values['topic_name']);
    //create slug = if topic is "Life Advice", return "life-advice" as slug
    $topic_slug = makeSlug($topic_name);
    //validate form
    if(empty($topic_name)){
        array_push($erros, "Topic name required");
    }
    //Ensure that no topic is save twice
    $topic_check_query = "SELECT * FROM topics WHERE slug='$topic_slug' LIMIT 1";
    $result = mysqli_query($conn, $topic_check_query);
    if(mysqli_num_rows($result) > 0){ //if topic exists
        array_push($errors, "Topic already exists");
    }
    // register topic if there are no erros in the form
    if(count($errors) == 0){
        $query = "INSERT INTO topics (name, slug)
                VALUES('$topic_name','$topic_slug')";
        mysqli_query($conn, $query);
        
        $_SESSION['message'] [] = "Topic create succefully";
        header("Location: topics.php");
        exit(0);
    }
}
/********************************************
 * - Takes topic id as parameter
 * - Fetches the topic from database
 * - sets topic fields on form for editing
 ********************************************/

 function editTopic($topic_id){
    global $conn, $topic_name, $isEditingTopic, $topic_id;
    $sql = "SELECT * FROM topics WHERE id=$topic_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $topic = mysqli_fetch_assoc($result);
    // set form values ($topic_name) on the form to be updated
    $topic_name = $topic['name'];
 }
 function updateTopic($request_values){
    global $conn, $errors, $topic_name, $topic_id;
    $topic_name = esc($request_values['topic_name']);
    $topic_id = esc($request_values['topic_id']);
    // create slug: if topic is "Life Advice", return "life-advice" as slug
    $topic_slug = makeSlug($topic_name);
    //validate form
    if(empty($topic_name)){
        array_push($erros, "Topic name required");
    }
    // register topic if there no errors in the form
    if(count($errors) == 0){
        $query = "UPDATE topics SET name='$topic_name', slug='$topic_slug' WHERE id=$topic_id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = "Topic update successfully";
        header("Location: topics.php");
        exit(0);
    }
}

//delete topic
function deleteTopic($topic_id){
    global $conn;
    $sql = "DELETE FROM topics WHERE id=$topic_id";
    if(mysqli_query($conn, $sql)){
        $_SESSION['message'] [] = "Topic Sucessfully deleted";
        header("Location: topics.php");
        exit(0);
    }
}