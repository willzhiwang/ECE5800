Download XAMPP https://www.apachefriends.org/index.html \
This should get you php and apache \
run mysql and apache in "Services" on your decvice\
go to your http://localhost/ to load your php 

Database: I saved my database in localhost,root,(no password),loginsystem \
then I created a table called users\
In your own server you may want these values the same

Evertime a user created will be a increment userid starts from 1, can be used in future developing\
Password saved in database is already hashed using php method


\
TODO List: \
General:\
more Frontend features;\
login:\
create login error cases in login.inc.php;\
signup:\
Add password regrex in signup.inc.php (similar to username regrex); \
Frontend work to string text to user how he failed to create a account ( ex: "username cannot be empty");\
Created two checked boxes (driver, passenger) frontend when signup, needs to implement it to database;\
