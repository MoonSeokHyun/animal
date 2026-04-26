<?php

namespace App\Controllers;

use App\Models\AnimalHospitalModel;

class Home extends BaseController
{
    public function index(): string
    {
        $hospitalModel = new AnimalHospitalModel();
        
        // 메인에는 최신 등록된 동물병원 몇 개를 노출
        $latestHospitals = $hospitalModel->orderBy('id', 'DESC')->findAll(8);

        $data = [
            'latestHospitals' => $latestHospitals,
            'seoTitle' => '전국 동물 서비스 종합 안내 | AnimalCare',
            'seoDescription' => '전국 동물병원, 약국, 장례업, 판매업 등 18개 반려동물 및 축산 관련 서비스 정보를 한눈에 확인하세요.',
            'seoKeywords' => '동물병원, 동물약국, 애견미용, 동물 수송, 동물 장례, 축산업 정보, 반려동물 서비스',
            'canonicalUrl' => base_url(),
            'config' => [
                'search_placeholder' => '병원, 약국, 업체명 또는 지역 검색'
            ],
            'adSlots' => [
                'home_top' => '1204098626',
                'home_bottom' => '1204098626'
            ]
        ];

        return view('welcome_message', $data);
    }
}
