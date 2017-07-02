	
# execute 'apt-get update'
	exec { 'apt-update':                    
	  command => '/usr/bin/apt-get update'  
	}

# install apache2 package
	package { 'apache2':
	  require => Exec['apt-update'],        
	  ensure => installed,
	}

# ensure apache2 service is running
	service { 'apache2':
	  ensure => running,
	}


# install php5 package
	package { 'php5':
	  require => Exec['apt-update'],        
	  ensure => installed,
	}

# link apache web directory with  shared directory 
	file { '/var/www/msisdn':
	  ensure => link,
	  target => '/vagrant/www',
	  force => true,
	  require => Package['apache2']
	}





