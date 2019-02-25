# Helloprint
PHP Challenge By Helloprint
# Requirements
	- Docker
	- Git
    - Composer

# Running the App

1. Clone the repo

2. Start Rabbit Server
* docker run -d --hostname my-rabbit --name some-rabbit -p 5672:5672 -p 15672:15672 rabbitmq:3-management

3. On the broker folder execute:
* 3.1. on folder src run "composer install"
* 3.2. docker build ./ 
* 3.3. docker run -d -p 2020:80 DOCKERIMAGE -> replace DOCKERIMAGE for the string next Successfully built

4. On the frontend folder execute:
* 4.1. docker build ./
* 4.2. docker run -d -p 4040:80 DOCKERIMAGE -> replace DOCKERIMAGE for the string next Successfully built

4. On the backend folder execute:
* 4.1. on folder src run "composer install"
* 4.2. docker build ./
* 4.3. docker run -d -p 6060:80 DOCKERIMAGE -> replace DOCKERIMAGE for the string next Successfully built
* 4.4. on commmand line execute: curl localhost:6060

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


