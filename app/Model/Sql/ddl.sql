CREATE TABLE expense
(
  id INT NOT NULL AUTO_INCREMENT,
  date TIMESTAMP NOT NULL,
  category VARCHAR(50) NOT NULL,
  sub_category VARCHAR(50) NOT NULL,
  vendor VARCHAR(100),
  description VARCHAR(100),
  amount DECIMAL(5,2) NOT NULL,
  PRIMARY KEY (id)
);