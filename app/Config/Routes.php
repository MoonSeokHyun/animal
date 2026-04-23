<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// 정적 경로 우선 순위
$routes->get('sitemap.xml', 'SitemapController::index');
$routes->get('sitemap/generate/(:segment)', 'SitemapController::generate/$1');
$routes->get('sitemap/generate/(:segment)/(:num)', 'SitemapController::generate/$1/$2');

// 메인 페이지
$routes->get('/', 'Home::index');

// 동적 서비스 라우트 (최하단 배치)
$routes->get('(:segment)', 'AnimalService::index/$1');
$routes->get('(:segment)/(:num)', 'AnimalService::detail/$1/$2');
