Create user_db on PhpMyAdmin
Insert two table 

CREATE TABLE users(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHER(255) NOT NULL,
    email VARCHER(255) UNIQUE 
    password VARCHER(255) NOT NULL
);


CREATE TABLE tasks(
    id NOT NULL AUTO_INCREMENT PRIMARY KAY,
    user_id INT NOT NULL UNSIGNED
    title VARCHER(255) NOT NULL,
    description TEXT NOT NULL,
    due_date DATE NOT NULL,
    category VARCHER,
    priority ENUM('Low','Medium','High') DEFAULT 'Medium',
    status ENUM('Pending','On-going',Completed') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FORGIN KEY (user_id) REFRENCES users(id) ON DELETE CASCADE
);