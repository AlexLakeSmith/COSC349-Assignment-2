# -*- mode: ruby -*-
# vi: set ft=ruby :

class Hash
  def slice(*keep_keys)
    h = {}
    keep_keys.each { |key| h[key] = fetch(key) if has_key?(key) }
    h
  end unless Hash.method_defined?(:slice)
  def except(*less_keys)
    slice(*keys - less_keys)
  end unless Hash.method_defined?(:except)
end


# VagrantFile which sets up 2 VMS. 1 front end website, 1 back end website. 
Vagrant.configure("2") do |config|
  
  # All machines run Ubuntu.
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
    #End of 
  end


# My servers will run Ubuntu software as I have been using it in the labs so far.
  #config.vm.box = "ubuntu/xenial64"
# This sets up a VM for hosting my front end web server.
  config.vm.define "fwebserver" do |fwebserver|
# The name of my web server. 
  fwebserver.vm.hostname = "fwebserver"
      fwebserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql
      cp /vagrant/front-website.conf /etc/apache2/sites-available/
      a2ensite front-website
      a2dissite 000-default
      service apache2 reload
    SHELL
    #End of fwebserver configuration.
end
 

# This sets up a VM for hosting my back end web server.
  config.vm.define "bwebserver" do |bwebserver|  
# The name of my web server. 
  bwebserver.vm.hostname = "bwebserver" 
      bwebserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql
      cp /vagrant/back-website.conf /etc/apache2/sites-available/
      a2ensite back-website
      a2dissite 000-default
      service apache2 reload
    SHELL
    #End of bwebserver configuration.
end


   config.vm.provision "shell", inline: <<-SHELL
     apt-get update
     apt-get install -y apache2
   SHELL

 #EOF.  
end
