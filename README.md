# Helloprint
PHP Challenge By Helloprint
# Requirements
	- Docker
	- Git
    - Composer

# Running the App

1. Clone the repo
2. On the frontend folder execute:
* 2.1. docker build ./
* 2.2. docker run -d -p 41061:22 -p 41062:80 DOCKERIMAGE -> replace DOCKERIMAGE for the string next Successfully built

3. On the backend folder execute:
* 3.1. on folder src run "composer install"
* 3.2. docker build ./
* 3.3. docker run -d -p 4040:80 DOCKERIMAGE -> replace DOCKERIMAGE for the string next Successfully built

# Testing

### Recover password 
* Go to mailinator.com  
* Create email helloprint@mailinator.com 
* Go to http://localhost:4040
* Write helloprint in username box
* Click on Forgot Password? 
* Expected message: Email sent!
* Check if you receiver the email

* Expected message error: This user is not registered!

### Login
* Enter helloprint on username box
* Enter P@ssw0rd! on password box
* Click on Login
* Expected message: Login successful!
* Expected message error: Invalid credentials!


