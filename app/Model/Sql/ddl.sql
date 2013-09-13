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

Create TABLE category
(
  id INT NOT NULL AUTO_INCREMENT,
  category VARCHAR(50) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX category_idx (category)
);

Create TABLE sub_category
(
  id INT NOT NULL AUTO_INCREMENT,
  category_id INT NOT NULL,
  sub_category VARCHAR(50) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (category_id) REFERENCES category(id),
  UNIQUE INDEX sub_category_idx (category_id, sub_category)
);
