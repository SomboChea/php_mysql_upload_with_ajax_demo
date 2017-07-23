CREATE TABLE users(
  user_id INT(10) PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(10) NOT NULL,
  password VARCHAR(10) NOT NULL,
  user_img VARCHAR(100)
);

-- TEST USER [username = sombochea | password = ms]

INSERT INTO users(username,password,user_img)
VALUES("sombochea","ms","sb.png");