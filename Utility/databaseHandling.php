<?php

class DatabaseHandling
{
    protected $databaseConnection;
    protected $databaseName;
    protected $tableName;

    function __construct($databaseName, $tableName)
    {
        $this->databaseName = $databaseName;
        $this->tableName = $tableName;
        $this->databaseConnection = new mysqli("localhost", "root", "", $databaseName);
    }

    function __destruct()
    {
        $this->databaseConnection->close();
    }

    //Retrieve size of data array from database.
    public function RetrieveDataIndexes()
    {
        //Arrays start from zero in most cases, this just gives me piece of mind.
        return count($this->RetrieveDatabaseData()) - 1;
    }

    //Retrieve all data from the constructed class database and store it in an array of arrays.
    public function RetrieveDatabaseData()
    {
        $constructedArray = array();
        $columnNames = array();

        $statement = $this->databaseConnection->query("SELECT column_name
        FROM information_schema.columns WHERE table_schema = DATABASE()
        AND table_name = '$this->tableName' ORDER BY ordinal_position");

        while ($fetchedColumns = $statement->fetch_assoc())
            array_push($columnNames, $fetchedColumns["column_name"]);

        $dataRetreival = $this->databaseConnection->query("SELECT * FROM $this->tableName");

        if ($this->databaseConnection->error)
            printf("SQL Query Encountered Error: %s\n", $this->databaseConnection->error);

        if ($dataRetreival->num_rows > 0)
        {
            $newArray = array();
            while ($row = $dataRetreival->fetch_assoc())
            {
                foreach ($columnNames as $column)
                {
                    $newArray[$column] = $row[$column];
                }
                $constructedArray[] = $newArray;
            }
        } else return "No data was found.";

        return $constructedArray;
    }
}

?>