class apache {
	package { "httpd":
		ensure => present,
		require => Class[remi]
	}
	
	service { "httpd":
		ensure => running,
		require => Package[httpd],
		hasrestart => true,
		hasstatus => true,
	}
}