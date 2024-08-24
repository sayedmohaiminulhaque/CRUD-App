<?php 

    Class crudapp{
        private $conn;

        public function __construct()
        {
            #database host, database user, database pass. database name

            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = "";
            $dbname = 'crudapp';

            $this->conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

            if(!$this->conn){
                die("Database connection error!!");
            }
        }
        public function add_data($data)
        {
            $name = $data['name'];
            $roll = $data['roll'];
            $img = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];

            $query = "INSERT INTO crud( std_name , roll , img ) VALUE ('$name', $roll,'$img')";

            if(mysqli_query($this->conn , $query))
            {
                move_uploaded_file($tmp,'upload/'.$img);
                return "Submit successfully";
            }

        }

        public function get_data(){
            $query = "SELECT * FROM crud ";
            if(mysqli_query($this->conn, $query)){
                $returndata = mysqli_query($this ->conn, $query);
                return $returndata;
            }
        }
    }


?>