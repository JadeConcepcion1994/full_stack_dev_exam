<?php 

    class Database{

    	static private $conn;


    	function __construct()
        {
            Database::$conn = new mysqli('localhost','root','','full_stack_dev_exam');

        }


        /**
         * This Function uses mysqli_real_escape_string to prevent
         * sqli attacks on every user provided inputs.
         *
         * Please Use this function before passing
         * any user provided inputs into a query
         *
         * @param string $input
         *
         * @return string
         */
        protected function preventSqli(string $input) {
            return mysqli_real_escape_string(Database::$conn, $input);
        }


        public function saveData()
        {

        	$title = $this->preventSqli($this->title);
        	$isbn = $this->preventSqli($this->isbn);
        	$author = $this->preventSqli($this->author);
        	$publisher = $this->preventSqli($this->publisher);
        	$year_published = $this->preventSqli($this->year_published);
        	$category = $this->preventSqli($this->category);


        	$sql = "INSERT INTO textbooks (title, isbn, author, publisher, year_published, category, date_added) VALUES ('$title', '$isbn', '$author', '$publisher', '$year_published', '$category', '".$this->date_added."')";
        	$result = mysqli_query(Database::$conn, $sql);
            return $result;

        }

        public function getAllData()
        {
        	$sql = "SELECT * FROM textbooks";
            $result = mysqli_query(Database::$conn, $sql);
            $row = array();
            while ($rows = $result->fetch_object()) {
                $row[] = $rows;
            }
            return $row;
        }

        public function deleteData($id)
        {
        	$id = $this->preventSqli($id);

        	$sql = "DELETE FROM textbooks WHERE id = '$id'";
        	$result = mysqli_query(Database::$conn, $sql);
            return $result;
        }

        public function updateData($id)
        {	
        	$id = $this->preventSqli($id);
        	$title = $this->preventSqli($this->title);
        	$isbn = $this->preventSqli($this->isbn);
        	$author = $this->preventSqli($this->author);
        	$publisher = $this->preventSqli($this->publisher);
        	$year_published = $this->preventSqli($this->year_published);
        	$category = $this->preventSqli($this->category);


        	$sql = "UPDATE textbooks SET title = '$title', isbn = '$isbn', author = '$author', publisher = '$publisher', year_published = '$year_published', category = '$category' WHERE id = '$id'";
        	$result = mysqli_query(Database::$conn, $sql);
            return $result;

        }
    }



?>   
