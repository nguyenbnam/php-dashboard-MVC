<?php 
class Model extends Database{
    protected $connect; 
    public function __construct() {
        $this->connect = $this->connect(); 
    //  tro den protect connect  = tro den function cha
    }

    public function show($table, $select = ['*'], )
    {
        $colums = implode(', ', $select);
        $sql = "SELECT ${select} FROM  ${table}";
        $query = mysqli_query($this->connect(), $sql); 
        $data_show = []; 
        while($rows = mysqli_fetch_assoc($query)){
            array_push($data_show, $rows);
        }
        return $data_show; 
    }
    public function find($table, $select = ['*'], $name)
    {
        $colums = implode(', ', $select);
        $sql = "SELECT ${select} FROM  ${table} WHERE name = '${name}' ";
        $query = mysqli_query($this->connect(), $sql); 
        $result = mysqli_fetch_assoc($query); 
        return $result; 
    }
}