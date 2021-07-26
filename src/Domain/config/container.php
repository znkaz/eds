<?php

return [
	'singletons' => [
		'ZnKaz\\Eds\\Domain\\Interfaces\\Services\\CrlServiceInterface' => 'ZnKaz\\Eds\\Domain\\Services\\CrlService',
		'ZnKaz\\Eds\\Domain\\Interfaces\\Repositories\\CrlRepositoryInterface' => 'ZnKaz\\Eds\\Domain\\Repositories\\Eloquent\\CrlRepository',
		'ZnKaz\\Eds\\Domain\\Interfaces\\Services\\HostServiceInterface' => 'ZnKaz\\Eds\\Domain\\Services\\HostService',
		'ZnKaz\\Eds\\Domain\\Interfaces\\Repositories\\HostRepositoryInterface' => 'ZnKaz\\Eds\\Domain\\Repositories\\Eloquent\\HostRepository',
		'ZnKaz\\Eds\\Domain\\Interfaces\\Services\\LogServiceInterface' => 'ZnKaz\\Eds\\Domain\\Services\\LogService',
		'ZnKaz\\Eds\\Domain\\Interfaces\\Repositories\\LogRepositoryInterface' => 'ZnKaz\\Eds\\Domain\\Repositories\\Eloquent\\LogRepository',
	],
	'entities' => [
		'ZnKaz\\Eds\\Domain\\Entities\\CrlEntity' => 'ZnKaz\\Eds\\Domain\\Interfaces\\Repositories\\CrlRepositoryInterface',
		'ZnKaz\\Eds\\Domain\\Entities\\HostEntity' => 'ZnKaz\\Eds\\Domain\\Interfaces\\Repositories\\HostRepositoryInterface',
		'ZnKaz\\Eds\\Domain\\Entities\\LogEntity' => 'ZnKaz\\Eds\\Domain\\Interfaces\\Repositories\\LogRepositoryInterface',
	],
];