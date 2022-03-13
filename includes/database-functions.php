<?php
// Constants.
const SERVER_NAME = 'rmit.australiaeast.cloudapp.azure.com';
const DB_NAME = 'need ID';
const USERNAME = DB_NAME;
const PASSWORD = 'abc123';

const DNS = 'mysql:host=' . SERVER_NAME . ';dbname=' . DB_NAME;

/**
 *  name - Murtaza Nasiri
 *  Student No - s3779718
 *  Class - this class is used for writing queries and making connection to phpmyadmin
 * 
 *  Reference - "Lab 09 activity 03" and Lab 10
 */

// --- Utils -----
function createConnection() {
    return new PDO(DNS, USERNAME, PASSWORD);
}
function prepareAndExecute($query, $params = null) {
    $pdo = createConnection();
    $statement = $pdo->prepare($query);
    $statement->execute($params);

    return $statement;
}

function prepareExecuteAndFetchAll($query, $params = null) {
    $statement = prepareAndExecute($query, $params);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function prepareExecuteAndFetch($query, $params = null) {
    $statement = prepareAndExecute($query, $params);

    return $statement->fetch(PDO::FETCH_ASSOC);
}
// --- User query --------------
function getUsers() {
    $pdo = createConnection();

    $statement = $pdo->prepare('select * from user');

    $statement->execute();

    return $statement->fetchAll();
}

function getUser($email) {
    $pdo = createConnection();

    $statement = $pdo->prepare('select * from user where email = :email');

    $statement->execute(['email' => $email]);

    return $statement->fetch();
}

function insertUser($user) {
    return prepareAndExecute(
        'insert into user
        (email, password, first_name, last_name, phone, age, is_student, is_employed) values
        (:email, :password, :firstname, :lastname, :phone, :age, :student_status, :employment_status)', $user);
}
// --- Services query----------
function getServices() {
    return prepareExecuteAndFetchAll('select * from service');
}

function getService($id) {
    return prepareExecuteAndFetch('select * from service where service_id = :id', ['id' => $id]);
}

function getServiceInstructions($id) {
    return prepareExecuteAndFetchAll('select * from service_instruction where service_id = :id', ['id' => $id]);
}

function getServiceInstruction($id, $type) {
    return prepareExecuteAndFetch(
        'select * from service_instruction where service_id = :id and service_type = :type',
        ['id' => $id, 'type' => $type]);
}

function insertActivity($activity) {
    return prepareAndExecute(
        'insert into user_service
        (email, service_id, service_type, date_performed, duration_minutes) values
        (:email, :service_id, :service_type, now(), :duration_minutes)', $activity);
}


// --- Meal query -----------
function getMealCategories() {
    return prepareExecuteAndFetchAll('select * from meal_categories');
}

function getMealByCategories($cat_name) {
    return prepareExecuteAndFetchAll("select meal_categories.cat_id, meal_categories.cat_name, meal.meal_id, meal.cat_type, meal.image_path,meal.kilojoules, 
    meal.name from meal_categories join meal on meal.cat_type = meal_categories.cat_id WHERE meal_categories.cat_name ='".$cat_name."'");
}
// gets specific meal required from meal table.
function getMeal() {

    return prepareExecuteAndFetchAll('select * from meal');
}
// inserting meal into the user_meal table afte getting meal from user
function insertMeal($meal) {
    return prepareAndExecute(
        'insert into user_meal
        (email, meal_id, servings) values
        (:email, :meal_id, :servings)', $meal);
}
