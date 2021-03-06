# COSC349 Assignment 2
For this assignment the task was to deploy an application to the cloud. To do this I have used:
- 2 Amazon EC2 Instances to run VM's which act as websites.
- 1 Amazon RDS to create and store a database which holds information displayed on the website.
- 1 Amazon Simple Notification Service Alert used to measure entries to the database through Read/Write IO data. 
- 1 Amazon S3 service which is used to store image files uploaded through a web interface form.

To access the front facing website which displays the database information click this link: http://ec2-100-26-40-90.compute-1.amazonaws.com/
To access the back facing website which allows you to insert into the database click this link: http://ec2-34-229-75-201.compute-1.amazonaws.com/
Please note that these links will only be valid until November at the latest. 
 
If you wish to build an application like this you will need to install the latest vesion of vagrant on your own machine and also create your own AWS account. If you are unfamiliar with creating EC2 instances I would refer you to use this document which steps you through the process on how to create them for yourself: https://hackmd.io/lDOusFXhRBG0_8t9VZdVGQ

You will also have to create an Amazon RDS database which tutorials can be found online. 


I also made use of Amazon's Simple Notiication Service and their S3 service to try and get images to upload through an HTML form to a bucket (although I couldn't get this optimised. I still decided to keep it in for future reference and alteractations.)


If you have completed these steps and are ready to build the machine you simply must navigate to a chosen directory and enter the command: vagrant up --provider=aws

Further instructions/analysis provided on the report
