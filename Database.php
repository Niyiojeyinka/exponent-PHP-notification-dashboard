<?php
class Database{
	public $file;
	public $all_records;

	function __construct($file){
    $this->file = $file;
    
      $db = fopen($this->file, "r") or die("Unable to open file!");
    	$data = fread($db,filesize($this->file));
        fclose($db);
        //got the initial content of the file in text/json format and covert to array  
    	 
  $this->all_records =json_decode($data,true);
    }
    
   
    public function save_all($all_records){
        $db = fopen($this->file, "w") or die("Unable to open file!");
       
        fwrite($db, json_encode($all_records));
        fclose($db);
    }
    public function insert($newRecordArray){
        

      array_push($this->all_records, $newRecordArray);
        
       $this->save_all($this->all_records);

    }

    public function get_all_records(){
    return $this->all_records;

    }
    public function deleteRecord($cond){
    $all_records = $this->get_all_records();

    foreach($cond as $key=>$value){
    $index = 0;
    foreach ($all_records as $record) {
        if ($record[$key] == $value) {

        unset($all_records[$index]);
        }
    $index++;
    }

    }
    $this->save_all($all_records);

    }

    public function deleteByIndex($index)
    {
        $all_records = $this->get_all_records();
        unset($all_records[$index]);
        $this->save_all($all_records);

    }
}