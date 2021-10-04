# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|

  config.vm.box = "dummy"

  config.vm.provider :aws do |aws, override|

    #aws.access_key_id = "KEYID"
    #aws.secret_access_key = "SECRETKEY"
    #aws.session_token = "SESSIONTOKEN"

    # Default AWS Reigon.
    aws.region = "us-east-1"

    # These options force synchronisation of files to the VM's
    # /vagrant directory using rsync, rather than using trying to use
    # SMB (which will not be available by default).
    override.nfs.functional = false
    override.vm.allowed_synced_folder_types = :rsync

    # The keypair_name parameter tells Amazon which public key to use.
    aws.keypair_name = "cosc349home"
    
    # The private_key_path is a file location in your macOS account.
    override.ssh.private_key_path = "~/.ssh/cosc349home.pem"

    # Amazon EC2 instance type.
    aws.instance_type = "t2.micro"

    # Security group I established in Lab 10.
    aws.security_groups = ["sg-0596b2c645fb54f5e"]

    # For Vagrant to deploy to EC2 for Amazon Educate accounts, it
    # seems that a specific availability_zone needs to be selected.
    aws.availability_zone = "us-east-1a"
    aws.subnet_id = "subnet-ab6b83e7"
 
    # AWS AMI Chosen is Xenial64 amd64 version 16.04LTS
    aws.ami = "ami-0133407e358cc1af0"

    # Because ubuntu is being used this must be kept so
    # vagrant can log in with the username ubuntu
    override.ssh.username = "ubuntu"
  end

   #config.vm.provision "shell", inline: <<-SHELL
     #apt-get update
     #apt-get install -y apache2
   #SHELL
end
