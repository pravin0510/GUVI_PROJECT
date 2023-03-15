<?php
    // connect to MongoDB
    $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    // fetch data from MongoDB
    if($_SERVER['REQUEST_METHOD']==='GET'){

        $param = $_GET['email'];
        $filter = ['email' => $param];
        $options = [
        'projection' => ['_id' => 0,],
        ];
        $query = new MongoDB\Driver\Query($filter, $options);
        $cursor = $mongo->executeQuery('database.collection', $query);

        foreach ($cursor as $document) {
            echo json_encode($document) . "\n";
        }
    }

    // update data in MongoDB
    else if($_SERVER['REQUEST_METHOD']==='PUT'){
        $name = $_PUT['name'];
        $email = $_PUT['email'];
        $dob= $_PUT['dob'];
        $bulk = new MongoDB\Driver\BulkWrite();
        $filter = ['email' => $email];
        $update = ['$set' => ['name'=>$name, 'dob'=>$dob]];
        $bulk->update($filter, $update);
        $mongo->executeBulkWrite('database.collection', $bulk);

        echo "success";
    }
?>