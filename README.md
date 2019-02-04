# Helloprint
PHP Challenge By Helloprint
# Requirements
	- Docker
	- Git

# Running the App

1. Clone the repo
2. On the frontend folder execute:
* 2.1. docker build ./
* 2.2. docker run -d -p 41061:22 -p 41062:80 DOCKERIMAGE

3. On the backend folder execute:
* 3.1. docker build ./
* 3.2. docker run -d -p 4040:80 DOCKERIMAGE

4. Open: http://localhost:4040/

5. For testing
* 5.1. go to  https://www.mailinator.com
* 5.2. write helloprint@mailinator.com  
