<h3>Form Data</h3>

<form action="">
    <p>
        <label for="csv_data_file">Upload CSV File</label>
        <input type="file" name="csv_data_file" id="csv_data_file">
    </p>
    <p>
        <button type="submit">Upload CSV</button>
    </p>
</form>


<!-- 

CREATE TABLE `wp_students_data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `photo` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3
 
-->