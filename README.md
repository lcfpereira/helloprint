# Helloprint
PHP Challenge By Helloprint
#### Steps to install this app:
1. Install Docker CE -> URL: https://docs.docker.com/install/

2. Install Git to get repository

3. After clone repository in your command line go to backend folder

4. Run composer install

5. Execute: 
    * docker build ./
    * docker run -d -p 41061:22 -p 41062:80 DOCKERIMAGE

6. Go to frontend folder in your command line

7. After execute:
    * docker build./
    * docker run -d -p 4040:80 DOCKERIMAGE

8. In your browser open http://localhost:4040/

9. To kill the dockers execute
    * docker ps
    * docker kill CONTAINERID