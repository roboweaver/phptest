class php {
	package { "php":
		ensure => present,
		require => Class[remi]
	}
	package { "php-cli":
		ensure => present,
		require => Package[php]
	}
	package { "php-gd":
		ensure => present,
		require => Package[php]
	}
	package { "php-mcrypt":
		ensure => present,
		require => Package[php]
	}
	package { "php-mysql":
		ensure => present,
		require => Package[php]
	}
	package { "php-mssql":
		ensure => present,
		require => Package[php]
	}
	package { "php-pdo":
		ensure => present,
		require => Package[php]
	}
	package { "php-process":
		ensure => present,
		require => Package[php]
	}
	package { "php-xml":
		ensure => present,
		require => Package[php]
	}
}