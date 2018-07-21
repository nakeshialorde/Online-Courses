CREATE TABLE Progress (
id INT NOT NULL AUTO_INCREMENT,
courses VARCHAR(30) NOT NULL,
progress INT,
PRIMARY KEY (id)
);

INSERT INTO Progress (topping, slices) VALUES
(‘Mushrooms’,3),(‘Onions’,1),(‘Olives’,1),(‘Zucchini’,1),(‘Pepperoni’,2);


$con = mysqli_connect(‘localhost’,’root’,”,’master’);
if (!$con) {
  die(‘Could not connect: ‘ . mysqli_error($con));
}

$qry = "SELECT Progress, slices FROM `pizza`"

$result = mysqli_query($con,$qry);
mysqli_close($con);