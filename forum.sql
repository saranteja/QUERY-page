CREATE TABLE users (  
user_id     INT(8) NOT NULL AUTO_INCREMENT,  
user_name   VARCHAR(30) NOT NULL,  
user_pass   VARCHAR(255) NOT NULL,  
user_email  VARCHAR(255) NOT NULL,  
user_date   date NOT NULL,  
user_level  INT(8) NOT NULL,  
UNIQUE INDEX user_name_unique (user_name),  
PRIMARY KEY (user_id)  
) ;


CREATE TABLE IF NOT EXISTS topics (
  topic_id int(8) NOT NULL AUTO_INCREMENT,
  topic_subject tinytext NOT NULL,
  topic_content text NOT NULL,
  user_id int(8) NOT NULL,
  user_name varchar(30) NOT NULL,
  topic_date date NOT NULL,
  topic_howlong timestamp NOT NULL,
  PRIMARY KEY (topic_id)
) ;

CREATE TABLE IF NOT EXISTS posts (
  post_id int(8) NOT NULL AUTO_INCREMENT,
  topic_id int(8) NOT NULL,
  post_content text NOT NULL,
  user_id int(8) NOT NULL,
  user_name varchar(30) NOT NULL,
  post_date date NOT NULL,
  post_howlong timestamp NOT NULL,
  PRIMARY KEY(post_id)
);